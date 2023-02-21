<?php

namespace App\Http\Livewire\Dashboard\Sale;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithFileUploads;

class SaleComponent extends Component
{
    public $deleteIdBeingRemoved = null, $sale_date, $sale_id, $status;
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    protected $listeners = ['deleteConfirmation' => 'deleteSales'];




    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['sale_date', 'status', 'sale_id', 'title',  'subtitle', 'image' ,  'link' ]);
    }


    public function updated($fields)
    {
        if ($this->sale_id) {
            $this->validateOnly($fields, [
                'sale_date' =>  ['required'],
                'status' =>  ['required'],
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'image' =>  ['required'],
                'link' =>  ['required'],
            ]);
        } else {
            $this->validateOnly($fields, [
                'sale_date' =>  ['required'],
                'status' =>  ['required'],
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'image' =>  ['required'],
                'link' =>  ['required'],
        ]);
    }

    }
    public function saveSale()
    {
        if ($this->sale_id) {
            $this->validate([
                'sale_date' =>  ['required'],
                'status' =>  ['required'],
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'image' =>  ['required'],
                'link' =>  ['required'],
            ]);
        } else {
            $this->validate([
                'sale_date' =>  ['required'],
                'status' =>  ['required'],
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'image' =>  ['required'],
                'link' =>  ['required'],
            ]);
        }
        $mySale = new Sale();
        if ($this->sale_id) {
            $mySale = Sale::findOrFail($this->sale_id);
        }
        $filenameImage = time() . '.' . $this->image->extension();
        $pathImage = $this->image->storeAs(
            'sale',
            $filenameImage,
            'public'
        );
        $mySale->sale_date = $this->sale_date;
        $mySale->status = $this->status;
        $mySale->title = $this->title;
        $mySale->subtitle = $this->subtitle;
        $mySale->image = $pathImage;
        $mySale->link = $this->link;


        $mySale->save();

        if ($this->sale_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {
            session()->flash('message', 'Enregistrement effectué avec succès.');
        }
        $this->resetInputFields();
        $this->emit('saveSale');
    }

    public function getElementById($id)
    {
        $this->sale_id = $id;
        $mySale = Sale::findOrFail($this->sale_id);
        $this->sale_date = $mySale->sale_date;
        $this->status = $mySale->status;
        $this->title = $mySale->title;
        $this->subtitle = $mySale->subtitle;
        $this->image = $mySale->image;
        $this->link = $mySale->link;
    }


    public function deleteSale($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSales()
    {
        $mySale = Sale::findOrFail($this->deleteIdBeingRemoved);
        $mySale->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Cette sale à été supprimer']);

    }
    public function render()
    {
        $sale = Sale::latest()->limit(5)->get();
        return view('livewire.dashboard.sale.sale-component',[
            'sale' => $sale,
        ]);
    }
}
