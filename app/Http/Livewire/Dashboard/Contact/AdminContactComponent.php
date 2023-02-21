<?php

namespace App\Http\Livewire\Dashboard\Contact;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteContacts'];
    public function deleteContact($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteContacts()
    {
        $myContact = Contact::findOrFail($this->deleteIdBeingRemoved);
        $myContact->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'ce message à été supprimer']);

    }
    public function render()
    {
        $contact = Contact::latest()->paginate(6);
        return view('livewire.dashboard.contact.admin-contact-component',[
            'contact' => $contact,
        ]);
    }
}
