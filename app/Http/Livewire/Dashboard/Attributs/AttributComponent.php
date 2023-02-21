<?php

namespace App\Http\Livewire\Dashboard\Attributs;

use Livewire\Component;
use App\Models\Attribute;

class AttributComponent extends Component
{
    public $code;
    public $name;
    public $attribut_id;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteAttributs'];

    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['code','name','attribut_id',]);
    }


    public function updated($fields)
    {
        if ($this->attribut_id) {
            $this->validateOnly($fields, [
                'code' =>  ['required'],
                'name' =>  ['required'],

            ]);
        } else {
            $this->validateOnly($fields, [
                'code' =>  ['required'],
                'name' =>  ['required'],

            ]);
        }
    }
    public function saveAttribut()
    {
        if ($this->attribut_id) {
            $this->validate([
                'code' =>  ['required'],
                'name' =>  ['required'],

            ]);
        } else {
            $this->validate([
                'code' =>  ['required'],
                'name' =>  ['required'],

            ]);
        }

        $myAttribut = new Attribute();
        if ($this->attribut_id) {
            $myAttribut = Attribute::findOrFail($this->attribut_id);
        }



        $myAttribut->code = $this->code;
        $myAttribut->name = $this->name;
        $myAttribut->save();

        if ($this->attribut_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {

            session()->flash('message', 'Enregistrement effectué avec succès.');
        }

        $this->resetInputFields();
        $this->emit('saveAttribut');

    }


    public function getElementById($id)
    {
        $this->attribut_id = $id;
        $myAttribut = Attribute::findOrFail($this->attribut_id);
        $this->code = $myAttribut->code;
        $this->name = $myAttribut->name;
    }


    public function deleteAttribute($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAttributs()
    {
        $myAttribut = Attribute::findOrFail($this->deleteIdBeingRemoved);
        $myAttribut->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Cet attribut à été supprimer']);
    }
    public function render()
    {
        $pattribute = Attribute::all();
        return view('livewire.dashboard.attributs.attribut-component',[
            'pattribute' => $pattribute,
        ]);
    }
}
