<?php

namespace App\Http\Livewire\Site\Cart;

use Cart;
use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');

    }

    public function decreaseQuantity($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');

    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');
        session()->flash('message', 'Un produit à été supprimer du panier.');
    }

    public function switchToSaveForLater($rowId) {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');
        session()->flash('message', 'Un produit à été sauvegader pour plutard.');
    }
    public function moveToCart($rowId) {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');
        session()->flash('message', 'Un produit à été ajouter au panier.');
    }
    public function deleteFromSaveForLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        // $this->emitTo('site.products.shopping-cart-count-component','refreshComponent');
        session()->flash('message', 'Un produit à été supprimer du sauvegade.');
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code',$this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('message', 'Le code est invalide');
            return;
        }
        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
    }

    public function calculateDiscount(){
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount,
            ]);
        }else
        {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->set('coupon');
            }else{
                $this->calculateDiscount();
            }
        }
        $this->setAmountForCheckout();
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.cart.cart-component',[
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
