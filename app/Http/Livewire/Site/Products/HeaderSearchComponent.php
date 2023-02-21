<?php

namespace App\Http\Livewire\Site\Products;

use Livewire\Component;
use App\Models\Category;

class HeaderSearchComponent extends Component
{
    public $search;
    // public $product_cat;
    // public $product_cat_id;
    public function mount(){
        // $this->product_cat = 'All Categorie';
        $this->fill(request()->only('search'));
    }
    public function render()
    {
        $category = Category::all();
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.products.header-search-component',[
            'category' => $category,
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
