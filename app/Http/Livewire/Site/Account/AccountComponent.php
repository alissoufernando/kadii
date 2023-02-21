<?php

namespace App\Http\Livewire\Site\Account;

use App\Models\User;
use App\Models\Order;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AccountComponent extends Component
{
    use WithFileUploads;

    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $departement;
    public $country;
    public $zipcode;
    public $image;
    public $profile_id;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteProfiles'];

    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset([
        'image',
        'profile_id',
        'mobile',
        'line1',
        'line2',
        'city',
        'departement',
        'country',
        'zipcode',]);
    }


    public function updated($fields)
    {
        if ($this->profile_id) {
            $this->validateOnly($fields, [
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'departement' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'image' =>'required',
            ]);
        } else {
            $this->validateOnly($fields, [
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'departement' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'image' =>'required',
            ]);
        }
    }
    public function saveProfile()
    {
        if ($this->profile_id) {
            $this->validate([
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'departement' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'image' =>'required',
            ]);
        } else {
            $this->validate([
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'departement' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'image' =>'required',
            ]);
        }

        $myProfile = new Profile();
        if ($this->profile_id) {
            $myProfile = Profile::findOrFail($this->profile_id);
        }

        $filenameImage = time() . '.' . $this->image->extension();
        $pathImage = $this->image->storeAs(
            'profile',
            $filenameImage,
            'public'
        );

        $myProfile->mobile = $this->mobile;
        $myProfile->line1 = $this->line1;
        $myProfile->line2 = $this->line2;
        $myProfile->city = $this->city;
        $myProfile->departement = $this->departement;
        $myProfile->country = $this->country;
        $myProfile->zipcode = $this->zipcode;
        $myProfile->image = $pathImage;

        $myProfile->save();

        if ($this->profile_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {

            session()->flash('message', 'Enregistrement effectué avec succès.');
        }

        $this->resetInputFields();
        $this->emit('saveProfile');

    }


    public function getElementById($id)
    {
        $this->profile_id = $id;
        $myProfile = Profile::findOrFail($this->profile_id);
        $this->mobile = $myProfile->mobile;
        $this->line1 = $myProfile->line1;
        $this->line2 = $myProfile->line2;
        $this->city = $myProfile->city;
        $this->departement = $myProfile->departement;
        $this->country = $myProfile->country;
        $this->zipcode = $myProfile->zipcode;
        $this->image = $myProfile->image;

    }


    public function deleteProfile($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProfiles()
    {
        $myCarousel = Profile::findOrFail($this->deleteIdBeingRemoved);
        $myCarousel->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Ce profile à été supprimer']);
    }
    public function render()
    {
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
        if(!$userProfile)
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        $order = Order::where('user_id', Auth::user()->id)->get();
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.account.account-component',[
            'order' => $order,
            'user' => $user,
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
