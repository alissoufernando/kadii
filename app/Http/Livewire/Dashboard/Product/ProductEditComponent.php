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
    public $price_r;
    public $price_c;
    public $quantity;
    public $quantity_alert;
    public $categorie_id;
    public $status_stock;
    public $status;
    public $featured;
    public $product_id;
    public $scategorie_id;
    public $sscategorie_id;
    public $boolean_price_r_c;

    public $attr, $pvalues;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];
    public $attribute_prices = [];

    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'slug', 'normal_price', 'sale_price','quantity', 'quantity_alert', 'sku', 'categorie_id','description','attr','scategorie_id', 'sscategorie_id']);
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
        $this->price_c = $myProduct->priceCaisson;
        $this->price_r = $myProduct->priceRetour;
        $this->categorie_id = $myProduct->categorie_id;
        $this->scategorie_id = $myProduct->subcategory_id;
        $this->sscategorie_id = $myProduct->subsubcategory_id;
        $this->description = $myProduct->description;
        $this->inputs = $myProduct->attributeValues->where('product_id', $myProduct->id)->unique('attribute_id')->pluck('attribute_id');
        $this->attribute_arr = $myProduct->attributeValues->where('product_id', $myProduct->id)->unique('attribute_id')->pluck('attribute_id');

        foreach($this->attribute_arr as $a_arr)
        {
            $allAttributeValue = AttributeValue::where('product_id',$myProduct->id)->where('attribute_id', $a_arr)->get()->pluck('value');
            $valueString = "";
            foreach($allAttributeValue as $value)
            {
                $valueString = $valueString. $value. ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString,",");

            $allAttributePrice = AttributeValue::where('product_id',$myProduct->id)->where('attribute_id', $a_arr)->get()->pluck('price');
            $priceString = "";
            foreach($allAttributePrice as $value)
            {
                $priceString = $priceString. $value. ',';
            }
            $this->attribute_prices[$a_arr] = rtrim($priceString,",");
        }
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
        // $myProduct->status_stock = $this->status_stock;
        if($this->scategorie_id)
        {
            $myProduct->subcategory_id = $this->scategorie_id;
        }
        if($this->sscategorie_id)
        {
            $myProduct->subsubcategory_id = $this->sscategorie_id;
        }

        $myProduct->save();

        AttributeValue::where('product_id',$myProduct->id)->delete();
        $products = Product::where('slug',$myProduct->slug)->first();
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

       session()->flash('message', 'Modification effectuée avec succès.');
       $this->resetInputFields();

    }
    public function add() {
        if(!$this->attribute_arr->contains($this->attr))
        {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
        }
    }
    public function remove($attr) {
       unset($this->inputs[$attr]);
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
        $categorie = Category::all();
        $scategorie = Subcategory::where('category_id', $this->categorie_id)->get();
        $sscategorie = Subsubcategory::where('subcategory_id', $this->scategorie_id)->get();
        $N_categorie = "";
        if ($this->categorie_id)
        {
            $N_categorie = Category::where('id', $this->categorie_id)->first();

        }

        return view('livewire.dashboard.product.product-edit-component',[
            'categorie' => $categorie,
            'scategorie' => $scategorie,
            'sscategorie' => $sscategorie,
            'pattribute' => $pattribute,
            'N_categorie' => $N_categorie,
        ]);
    }
}
