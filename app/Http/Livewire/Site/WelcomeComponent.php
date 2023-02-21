<?php

namespace App\Http\Livewire\Site;

use Cart;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Parametre;
use Illuminate\Support\Facades\Auth;


class WelcomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate(Product::class);
        session()->flash('message', 'Un produit à été ajouter au panier.');
        return redirect()->route('welcome');


    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate(Product::class);
        $this->emitTo('site.products.wish-cart-count-component','refreshComponent');
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
    public function render()
    {
        $products = Product::inRandomOrder()->with('images')->limit(4)->get();
        $products_latest = Product::latest()->with('images')->limit(4)->get();
        $category = Category::latest()->get();
        $carousel = Carousel::latest()->get();
        $sale = Sale::find(1);
        $parametre = Parametre::find(1);
        $categorieMenu = Category::where('menu',1)->get();
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.site.welcome-component',[
            'carousel' => $carousel,
            'products' => $products,
            'category' => $category,
            'sale' => $sale,
            'products_latest' => $products_latest,
            'parametre' => $parametre,
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
