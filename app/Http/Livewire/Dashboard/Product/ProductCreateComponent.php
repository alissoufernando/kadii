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

class ProductCreateComponent extends Component
{

    public $name;
    public $slug;
    public $description;
    public $normal_price;
    public $sale_price;
    public $sku;
    public $price_r;
    public $price_c;
    public $quantity;
    public $quantity_alert;
    public $categorie_id;
    public $status_stock;
    public $status;
    public $featured;
    public $scategorie_id;
    public $sscategorie_id;

    public $attr, $pvalues;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;
    public $attribute_prices = [];


    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'slug', 'normal_price', 'sale_price','quantity', 'quantity_alert', 'sku', 'categorie_id','description','attr','scategorie_id', 'sscategorie_id']);

    }
    public function mount() {
        $this->status_stock = 'instock';
        $this->status = 1;
        $this->featured = 0;
    }

    public function add() {
        if(!in_array($this->attr, $this->attribute_arr))
        {
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }
    public function remove($attr) {
       unset($this->inputs[$attr]);
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
                'sku' =>  'required',
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
        $product->sku = $this->sku;
        $product->categorie_id = $this->categorie_id;
        $product->description = $this->description;
        $product->status_stock = $this->status_stock;
        $product->priceRetour = $this->price_r;
        $product->priceCaisson = $this->price_c;
        if($this->scategorie_id)
        {
            $product->subcategory_id = $this->scategorie_id;
        }

        if($this->sscategorie_id)
        {
            $product->subsubcategory_id = $this->sscategorie_id;
        }

        $product->save();
        $products = Product::where('slug',$product->slug)->first();
        foreach($this->attribute_prices as $key => $attribute_price)
        {
            $this->pvalues = explode(',',$attribute_price);
        }


        foreach($this->attribute_values as $key => $attribute_value)
        {
            $avalues = explode(',',$attribute_value);
            $i = 0;

            foreach($avalues as $avalue)
            {
                $attr_value = new AttributeValue();
                $attr_value->attribute_id  = $key;
                $attr_value->value = $avalue;
                $attr_value->price = $this->pvalues[$i];
                $attr_value->product_id = $products->id;
                $attr_value->save();
                $i ++;
            }
        }




       session()->flash('message', 'Enregistrement effectué avec succès.');
       $this->resetInputFields();

    }
    public function changeSubcategory()
    {
        $this->scategorie_id = 0;
    }

    public function changeSubsubcategory()
    {
        $this->sscategorie_id = 0;
    }
    public function render()
    {
        $pattribute = Attribute::all();
        // dd($pattribute->where('id', 1)->first()->name);
        $categorie = Category::all();
        $scategorie = Subcategory::where('category_id', $this->categorie_id)->get();
        $sscategorie = Subsubcategory::where('subcategory_id', $this->scategorie_id)->get();
        $N_categorie = "";
        if ($this->categorie_id)
        {
            $N_categorie = Category::where('id', $this->categorie_id)->first();

        }
        return view('livewire.dashboard.product.product-create-component',[
            'categorie' => $categorie,
            'scategorie' => $scategorie,
            'sscategorie' => $sscategorie,
            'pattribute' => $pattribute,
            'N_categorie' => $N_categorie,
        ]);
    }
}
