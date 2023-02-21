<?php

namespace App\Http\Livewire\Site\Contact;

use App\Models\Contact;
use Livewire\Component;
use App\Models\Category;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactComponent extends Component
{
    public $name, $email, $phone, $comment,$subject;

    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'email', 'phone', 'comment', 'subject',]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
            'subject' => 'required'
        ]);
    }
    public function sendMessage(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
            'subject' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;

        if($this->subject == "demande de proforma")
        {
            Mail::to('vente@centraledumobilier.com')->send( new ContactForm($this->name, $this->email,$this->phone,$this->comment,$this->subject));
        }elseif($this->subject == "échange administratif et autre informations")
        {
            Mail::to('infos@centraledumobilier.com')->send( new ContactForm($this->name, $this->email,$this->phone,$this->comment,$this->subject));
        }
        else
        {
            Mail::to('sav@centraledumobilier.com')->send( new ContactForm($this->name, $this->email,$this->phone,$this->comment,$this->subject));
        }

        $contact->save();
        session()->flash('message', 'Merci, Votre message à été envoyé.');
        $this->resetInputFields();
        $this->emit('sendMessage');
    }
    public function render()
    {
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.contact.contact-component',[
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
