<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\AttributeValue;
use App\Models\Subsubcategory;
use App\Models\ProductAttribute;

class ProductEditComponent extends Component
{
    public $name;
    public $slug;
    public $description;
    public $normal_price;
    public $sale_price;
    public $sku;
    public $quantity;
    public $quantity_alert;
    public $categorie_id;
    public $status_stock;
    public $status;
    public $featured;
    public $product_id;



    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'slug', 'normal_price', 'sale_price','quantity', 'quantity_alert', 'sku', 'categorie_id','description']);
    }
    public function mount($id) {

        $myProduct = Product::where('id', $id)->first();
        // $this->status_stock = 'instock';
        // $this->status = 1;
        // $this->featured = 0;
        $this->product_id = $id;
        $this->name = $myProduct->name;
        $this->slug =  $myProduct->slug;
        $this->normal_price = $myProduct->normal_price;
        $this->sale_price = $myProduct->sale_price;
        $this->quantity = $myProduct->quantity;
        $this->quantity_alert = $myProduct->quantity_alert;
        $this->sku = $myProduct->sku;
        $this->categorie_id = $myProduct->categorie_id;
        $this->description = $myProduct->description;
    }

    public function generateSlug() {

        $this->slug = Str::slug($this->name,'-');
    }


    public function updateProduct()
    {


        $myProduct = Product::find($this->product_id);


        $myProduct->name = $this->name;
        $myProduct->slug = $this->slug;
        $myProduct->normal_price = $this->normal_price;
        $myProduct->sale_price = $this->sale_price;
        $myProduct->quantity = $this->quantity;
        $myProduct->quantity_alert = $this->quantity_alert;
        $myProduct->sku = $this->sku;
        $myProduct->priceRetour = $this->price_r;
        $myProduct->priceCaisson = $this->price_c;
        $myProduct->categorie_id = $this->categorie_id;
        $myProduct->description = $this->description;

        $myProduct->save();

       session()->flash('message', 'Modification effectuée avec succès.');
       $this->resetInputFields();

    }

    public function render()
    {
        $categorie = Category::all();

        return view('livewire.dashboard.product.product-edit-component',[
            'categorie' => $categorie,
        ]);
    }
}
