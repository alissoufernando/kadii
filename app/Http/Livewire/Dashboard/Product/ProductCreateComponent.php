<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductCreateComponent extends Component
{

    public $name;
    public $slug;
    public $description;
    public $normal_price;
    public $sale_price;
    public $quantity;
    public $quantity_alert;
    public $categorie_id;
    public $status_stock;
    public $status;
    public $featured;
    public $devise_price = "€";



    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'slug', 'normal_price', 'sale_price','quantity', 'quantity_alert', 'categorie_id','description']);

    }
    public function mount() {
        $this->status_stock = 'instock';
        $this->status = 1;
        $this->featured = 0;
    }


    public function generateSlug() {

        $this->slug = Str::slug($this->name,'-');
    }

    public function saveProduct()
    {
            $this->validate([
                'name' =>  'required',
                'slug' =>  'required',
                'normal_price' =>  'required',
                'sale_price' =>  'required',
                'quantity' =>  'required',
                'quantity_alert' =>  'required',
                'categorie_id' =>  'required',
                'description' => 'required',
            ]);

        $product = new Product();

        $product->status = $this->status;
        $product->featured = $this->featured;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->normal_price = $this->normal_price;
        $product->sale_price = $this->sale_price;
        $product->quantity = $this->quantity;
        $product->quantity_alert = $this->quantity_alert;
        $product->categorie_id = $this->categorie_id;
        $product->description = $this->description;
        $product->status_stock = $this->status_stock;

        $product->save();

       session()->flash('message', 'Enregistrement effectué avec succès.');
       $this->resetInputFields();

    }
    public function render()
    {

        $categorie = Category::all();
        return view('livewire.dashboard.product.product-create-component',[
            'categorie' => $categorie,
        ]);
    }
}
