<?php

namespace App\Livewire\User\Button;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;

class Logout extends Component
{

    public $style ;
    public AttributeCollection $attributes;
    public function logout(){

        Auth::logout();
        return redirect('/');
    }


    public function render()
    {
        return view('livewire.user.button.logout');
    }
}
