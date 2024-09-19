<?php

namespace App\Livewire\User\Button;

use Livewire\Component;

class View extends Component
{

    public $id , $style;
    public function render()
    {
        return view('livewire.user.button.view');
    }
}
