<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Attribute;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteProducts'];

    public function deleteProduct($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProducts()
    {
        $myProduct = Product::findOrFail($this->deleteIdBeingRemoved);
        $myProduct->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Ce produit à été supprimer']);

    }

    public function render()
    {
        $product = Product::latest()->get();
        $pattribute = Attribute::all();
        return view('livewire.dashboard.product.product-component',[
            'product' => $product,
            'pattribute' => $pattribute,
        ]);
    }
}
