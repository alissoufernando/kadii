<?php

namespace App\Http\Livewire\Site\Products;

use Livewire\Component;
use App\Models\Product;

class ShoppingCartCountComponent extends Component
{
    public $devise_price = "€";

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.site.products.shopping-cart-count-component');
    }
}
