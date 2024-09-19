<?php

namespace App\Livewire\User;

use Livewire\Component;

class Hero extends Component
{




    public function render()
    {
        return view('livewire.user.hero',[
            "categories" => config("categories")
        ]);
    }
}
