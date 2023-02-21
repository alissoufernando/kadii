<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Category;

class ResetPasswordComponent extends Component
{
    public function render()
    {
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.auth.reset-password-component',[
            'categorieMenu' => $categorieMenu,
        ])->layout('layouts.site');
    }
}
