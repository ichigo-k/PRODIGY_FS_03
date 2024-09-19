<?php

namespace App\Livewire\User\Modal;

use App\Models\address;
use Livewire\Component;

class EditAddress extends Component
{

    public $country, $city, $street, $landmark;

    public function add()
    {
        // Validate the inputs
        $this->validate([
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
        ]);

        // Create the new address
        Address::update([
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'landmark' => $this->landmark,
        ]);


        $this->dispatch('editDone');


        $this->reset(['country', 'city', 'street', 'landmark']);

        $this->dispatch(
            'alert',
            type:'success',
            title:'Address updated successfully'
        );
    }


    public function cancelEditAddress(){
        $this->dispatch('editDone');
    }

    public function render()
    {
        return view('livewire.user.modal.edit-address');
    }
}
