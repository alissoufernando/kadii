<?php

namespace App\Http\Livewire\Site\Products;

use Cart;
use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\OrderItem;

class DetailComponent extends Component
{
    public $product_id;
    public $qty;
    public $order_item_id;
    public $rating;
    public $comment;
    public $attr_price_click, $caissons, $retour, $calculPrice = 0, $calculPrice_cart, $desc, $i = 0, $k = 0;

    public function mount($id)
    {
        $this->product_id = $id;
        $this->order_item_id = $id;
        $this->qty = 1;
    }

    public function atttPrice($price,$desc)
    {
        $this->desc = $desc;
        $this->attr_price_click = $price;
        $this->calculPrice = $this->attr_price_click;
        $this->attr_price_click = null;
    }
    public function caisson($caissons)
    {
        if($this->i == 0 )
        {
            $this->caissons = $caissons;
            $this->calculPrice += $this->caissons;
            $this->caissons = null;
            $this->i ++;
        }

    }
    public function retour($retour)
    {
        if($this->k == 0 )
        {
            $this->retour = $retour;
            $this->calculPrice += $this->retour;
            $this->retour = null;
            $this->k ++;
        }
    }




    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['rating', 'comment']);
    }
    public function store($product_id, $product_name, $product_price){

        $product = Product::where('id', $this->product_id)->first();

        if($product->categorie->name == "Bureau")
        {
            Cart::instance('cart')->add($product_id, $product_name,$this->qty, $this->calculPrice_cart)->associate(Product::class);

        }else
        {
            Cart::instance('cart')->add($product_id, $product_name,$this->qty, $product_price)->associate(Product::class);

        }

        session()->flash('message', 'Un produit à été ajouter au panier.');
        return back();
    }
    public function increaseQuantity(){
        $this->qty ++;

    }

    public function decreaseQuantity(){

       if($this->qty > 1)
       {
        $this->qty --;
       }

    }

    public function addToWishlist($product_id, $product_name, $product_price){

        Cart::instance('wishlist')->add($product_id, $product_name,$this->qty, $product_price)->associate(Product::class);
        $this->emitTo('site.products.wish-cart-count-component','refreshComponent');
        return back();
    }

    public function removeFromWishList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('site.products.wish-cart-count-component','refreshComponent');
                return ;
            }
        }
    }
    public function update($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function addReview()
    {

        $this->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_items_id = $this->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = 1;
        $review->save();
        session()->flash('message_r', 'votre note a été ajouter avec succès');
        $this->resetInputFields();
        $this->emit('addReview');
    }



    public function render()
    {

        $product = Product::where('id', $this->product_id)->with('images')->get();
        $products_related = Product::where('categorie_id', $product->first()->categorie_id)->inRandomOrder()->with('images')->limit(4)->get();
        $orderItem = OrderItem::find($this->order_item_id);
        $categorieMenu = Category::where('menu',1)->get();
        foreach($product as $products)
        {
            if($this->calculPrice == 0)
            {
                $t_calcul_attr = $products->sale_price;
                $descrip = 'C\'est la gamme FIDEL (REF: FID1200 = 1.20m FID1400= 1.40M FID1600=1.60M ) .';

                $this->calculPrice_cart = $t_calcul_attr;
            }else
            {
                $descrip = 'C\'est la gamme que vous avez choisir '. $this->desc .'. Elle est tres special';
                $t_calcul_attr = $this->calculPrice;
                $this->calculPrice_cart = $t_calcul_attr;

            }

        }
        return view('livewire.site.products.detail-component',[
            'product' => $product,
            'products_related' => $products_related,
            'orderItem' => $orderItem,
            'categorieMenu' => $categorieMenu,
            't_calcul_attr' => $t_calcul_attr,
            'descrip' => $descrip,
        ])->layout('layouts.site');
    }
}
