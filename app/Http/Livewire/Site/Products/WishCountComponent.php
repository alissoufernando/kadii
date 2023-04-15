<?php

namespace App\Http\Livewire\Site\Products;

use Livewire\Component;

class WishCountComponent extends Component
{
    public $devise_price = "€";

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.site.products.wish-count-component');
    }
}
