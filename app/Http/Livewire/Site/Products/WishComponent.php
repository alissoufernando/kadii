<?php

namespace App\Http\Livewire\Site\Products;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class WishComponent extends Component
{
    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate(Product::class);
        session()->flash('message', 'Un produit à été ajouter au panier.');
        return redirect()->route('site.shopping-wishlist');
    }
    public function destroy($rowId){
        Cart::instance('wishlist')->remove($rowId);
        session()->flash('message', 'Un produit à été supprimer de la liste.');
    }
    public function moveProductFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name,1, $item->price)->associate(Product::class);
        $this->emitTo('site.products.wish-cart-count-component','refreshComponent');
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');


    }
    public function render()
    {
        if(Auth::check())
        {
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.products.wish-component',[
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
