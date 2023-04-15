<?php

namespace App\Http\Livewire\Site\Account;

use Livewire\Component;

class ProfileComponent extends Component
{
    public $devise_price = "€";

    public function render()
    {
        return view('livewire.site.account.profile-component');
    }
}
