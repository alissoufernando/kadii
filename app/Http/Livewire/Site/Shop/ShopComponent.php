<?php

namespace App\Http\Livewire\Site\Shop;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;
    public $open = false;
    public $open1 = false;

    public function moins()
    {
        $this->open = false;
    }
    public function plus()
    {
        $this->open = true;

    }
    public function moins1()
    {
        $this->open1 = false;
    }
    public function plus1()
    {
        $this->open1 = true;

    }

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 3;
        $this->min_price = 1;
        $this->max_price = 100000;

    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate(Product::class);
        session()->flash('message', 'Un produit à été ajouter au panier.');
        return redirect()->route('site.shop');

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
        if($this->sorting == "date")
        {
            $products = Product::whereBetween('normal_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == "price")
        {
            $products = Product::whereBetween('normal_price', [$this->min_price, $this->max_price])->orderBy('normal_price', 'ASC')->paginate($this->pagesize);

        }else if($this->sorting == "price-desc")
        {
            $products = Product::whereBetween('normal_price', [$this->min_price, $this->max_price])->orderBy('normal_price', 'DESC')->paginate($this->pagesize);

        }else{
            $products = Product::whereBetween('normal_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        $category = Category::all();
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        $categorieMenu = Category::where('menu',1)->get();
        return view('livewire.site.shop.shop-component',[
            'products' => $products,
            'category' => $category,
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
