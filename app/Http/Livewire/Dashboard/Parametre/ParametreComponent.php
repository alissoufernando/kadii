<?php

namespace App\Http\Livewire\Dashboard\Parametre;

use Livewire\Component;
use App\Models\Parametre;

class ParametreComponent extends Component
{
    public $logo;
    public $phone;
    public $email1;
    public $email2;
    public $map;
    public $facebook;
    public $youtube;
    public $twitter;
    public $google;
    public $instagram;
    public $address;
    public $parametre_id;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteParametres'];




    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['logo', 'phone', 'email1', 'email2', 'map', 'facebook', 'youtube', 'twitter', 'google', 'instagram', 'address', 'parametre_id']);
    }


    public function updated($fields)
    {
        if ($this->parametre_id) {
            $this->validateOnly($fields, [
                'logo' =>  ['required'],
                'phone' =>  ['required'],
                'email1' =>  ['required'],
                'email2' =>  ['required'],
                'map' =>  ['required'],
                'facebook' =>  ['required'],
                'youtube' =>  ['required'],
                'twitter' =>  ['required'],
                'google' =>  ['required'],
                'instagram' =>  ['required'],
                'address' =>  ['required'],


            ]);
        } else {
            $this->validateOnly($fields, [
                'logo' =>  ['required'],
                'phone' =>  ['required'],
                'email1' =>  ['required'],
                'email2' =>  ['required'],
                'map' =>  ['required'],
                'facebook' =>  ['required'],
                'youtube' =>  ['required'],
                'twitter' =>  ['required'],
                'google' =>  ['required'],
                'instagram' =>  ['required'],
                'address' =>  ['required'],

        ]);
    }

    }
    public function saveParametre()
    {
        if ($this->parametre_id) {
            $this->validate([
                'logo' =>  ['required'],
                'phone' =>  ['required'],
                'email1' =>  ['required'],
                'email2' =>  ['required'],
                'map' =>  ['required'],
                'facebook' =>  ['required'],
                'youtube' =>  ['required'],
                'twitter' =>  ['required'],
                'google' =>  ['required'],
                'instagram' =>  ['required'],
                'address' =>  ['required'],

            ]);
        } else {
            $this->validate([
                'logo' =>  ['required'],
                'phone' =>  ['required'],
                'email1' =>  ['required'],
                'email2' =>  ['required'],
                'map' =>  ['required'],
                'facebook' =>  ['required'],
                'youtube' =>  ['required'],
                'twitter' =>  ['required'],
                'google' =>  ['required'],
                'instagram' =>  ['required'],
                'address' =>  ['required'],

            ]);
        }
        $myCoupon = new Parametre();
        if ($this->parametre_id) {
            $myCoupon = Parametre::findOrFail($this->parametre_id);
        }
        $filenameImage = time() . '.' . $this->logo->extension();
        $pathImage = $this->logo->storeAs(
            'logo',
            $filenameImage,
            'public'
        );
        $myCoupon->logo = $pathImage;
        $myCoupon->phone = $this->phone;
        $myCoupon->email1 = $this->email1;
        $myCoupon->email2 = $this->email2;
        $myCoupon->map = $this->map;
        $myCoupon->facebook = $this->facebook;
        $myCoupon->youtube = $this->youtube;
        $myCoupon->twitter = $this->twitter;
        $myCoupon->google = $this->google;
        $myCoupon->instagram = $this->instagram;
        $myCoupon->address = $this->address;

        $myCoupon->save();

        if ($this->parametre_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {
            session()->flash('message', 'Enregistrement effectué avec succès.');
        }
        $this->resetInputFields();
        $this->emit('saveParametre');
    }

    public function getElementById($id)
    {
        $this->parametre_id = $id;
        $myCoupon = Parametre::findOrFail($this->parametre_id);
        $this->logo =$myCoupon->logo;
        $this->phone = $myCoupon->phone ;
        $this->email1 = $myCoupon->email1;
        $this->email2 = $myCoupon->email2;
        $this->map = $myCoupon->map;
        $this->facebook = $myCoupon->facebook;
        $this->youtube =  $myCoupon->youtube;
        $this->twitter = $myCoupon->twitter;
        $this->google = $myCoupon->google;
        $this->instagram = $myCoupon->instagram;
        $this->address =  $myCoupon->address;

    }


    public function deleteParametre($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteParametres()
    {
        $myCoupon = Parametre::findOrFail($this->deleteIdBeingRemoved);
        $myCoupon->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Ce parametre à été supprimer']);

    }
    public function render()
    {
        $parametre = Parametre::find(1);
        return view('livewire.dashboard.parametre.parametre-component',[
            'parametre' => $parametre
        ]);
    }
}
