<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class UserComponent extends Component
{
    use PasswordValidationRules;
    public $name;
    public $firstname;
    public $email;
    public $password;
    public $user_id;

    protected $listeners = ['deleteConfirmation' => 'deleteUsers'];


    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        if($this->user_id){
            $this->reset(['name', 'firstname', 'email','user_id']);
        }
        $this->reset(['name', 'firstname', 'email', 'password']);
    }


    public function updated($fields)
    {
        if ($this->user_id) {
            $this->validateOnly($fields, [
                'name' =>  ['required'],
                'firstname' =>  ['required'],
                'email' =>  ['required'],
            ]);
        } else {
            $this->validateOnly($fields, [
                'name' =>  ['required'],
                'firstname' =>  ['required'],
                'email' =>  ['required'],
                'password' => ['required'],
            ]);
        }

    }
    public function saveUser()
    {

        if ($this->user_id) {

            $this->validate([
                'name' => ['required',],
                'firstname' =>  ['required'],
                'email' => ['required',],
            ]);
            // dd('ok');
        } else {
            $this->validate([
                'name' =>  ['required'],
                'firstname' =>  ['required'],
                'email' =>  ['required'],
                'password' => ['required'],
            ]);
        }
        $myUser = new User();

        if ($this->user_id) {
            $myUser = User::findOrFail($this->user_id);
        }

        if($this->user_id) {

            $myUser->name = $this->name;
            $myUser->firstname = $this->firstname;
            $myUser->email = $this->email;
            $myUser->save();

        } else {
            $myUser->name = $this->name;
            $myUser->firstname = $this->firstname;
            $myUser->email = $this->email;
            $myUser->password = Hash::make($this->password);
            $myUser->save();
        }



        if ($this->user_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {
            session()->flash('message', 'Enregistrement effectué avec succès.');
        }
        $this->resetInputFields();
        $this->emit('saveUser');
    }

    public function getElementById($id)
    {
        $this->user_id = $id;
        $myUser = User::findOrFail($this->user_id);
        $this->name = $myUser->name;
        $this->firstname = $myUser->firstname;
        $this->email = $myUser->email;
    }


    public function deleteUser($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteUsers()
    {
        $myUser = User::findOrFail($this->deleteIdBeingRemoved);
        $myUser->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Cet utilisateur à été supprimer']);

    }
    public function render()
    {
        $user = User::latest()->get();
        return view('livewire.dashboard.user.user-component',[
            'user' => $user
        ]);
    }
}
