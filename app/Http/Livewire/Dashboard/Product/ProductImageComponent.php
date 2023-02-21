<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Image;
class ProductImageComponent extends Component
{
    use WithFileUploads;
    public $fulls,$product_id,$productImage_id, $deleteIdBeingRemoved = null,$array_thumb=[], $array_full=[];
    protected $listeners = ['deleteConfirmation' => 'deleteProductImages'];

    public function mount($id)
    {
        $this->product_id = $id;
    }


    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset([ 'fulls']);
    }


    public function updated($fields)
    {
        if ($this->productImage_id) {
            $this->validateOnly($fields, [
                'fulls' =>  ['required'],

            ]);
        } else {
            $this->validateOnly($fields, [
                'fulls' =>  ['required'],

            ]);
        }
    }
    public function saveImage()
    {
        $this->validate([
            'fulls.*' => 'image', // 1MB Max
        ]);


        $myProductImage = new ProductImage();

        if ($this->productImage_id) {
            $myProductImage = ProductImage::findOrFail($this->productImage_id);
        }

        $this->uploadOne();
        $myProductImage->full = collect($this->array_full)->implode(',');

        $myProductImage->thumbnail = collect($this->array_thumb)->implode(',');
        $myProductImage->product_id = $this->product_id;


        $myProductImage->save();
        Storage::deleteDirectory('livewire-tmp');
        $this->resetInputFields();

        if ($this->productImage_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {

            session()->flash('message', 'Enregistrement effectué avec succès.');
        }


        back();

    }
    public function uploadOne()
    {
        if (!empty($this->fulls)) {
            $array_thumb = array();
            $array_full = array();
            foreach ($this->fulls as $full){
                $image = $full;
                $filename_thumb =  'thumb-' .uniqid() . '.' . $image->getClientOriginalExtension();
                $filename_full =  'full-' .uniqid() . '.' . $image->getClientOriginalExtension();
                $path_thumb =storage_path().'/app/public/galerie/'.$filename_thumb;
                $path_full =storage_path().'/app/public/galerie/'.$filename_full;
                Image::make($image->getRealPath())->save($path_thumb);
                Image::make($image->getRealPath())->save($path_full);
                array_push($array_full, $filename_full);
                array_push($array_thumb, $filename_thumb);

            }
            $this->array_thumb=$array_thumb;
            $this->array_full=$array_full;

        }
    }
    public function deleteOne()
    {
        Storage::disk('public')->delete("/images/$this->image");
    }

    public function getElementById($id)
    {
        $this->productImage_id = $id;
        $myProductImage = ProductImage::whereProductId($this->productImage_id)->first();
        $this->fulls = $myProductImage->full;
        $this->productImage_id = $myProductImage->id;

    }


    public function deleteProduct($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProducts()
    {
        $myProduct = ProductImage::findOrFail($this->deleteIdBeingRemoved);
        $myProduct->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Cette Image à été supprimer']);
    }
    public function render()
    {
        $product = Product::where('id', $this->product_id)->with('images')->first();
        return view('livewire.dashboard.product.product-image-component', [
            'product' => $product,
        ]);
    }
}
