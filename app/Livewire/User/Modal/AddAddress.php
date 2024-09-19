<?php

namespace App\Livewire\User\Modal;

use App\Models\Address;
use Livewire\Component;

class AddAddress extends Component
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
        Address::create([
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'landmark' => $this->landmark,
            'user_id' => auth()->id(),
        ]);


        $this->dispatch('addressAdded');


        $this->reset(['country', 'city', 'street', 'landmark']);

        $this->dispatch(
            'alert',
            type:'success',
            title:'Address added successfully'
        );
    }


    public function cancelAddAddress(){
        $this->dispatch('addressAdded');
    }

    public function render()
    {
        return view('livewire.user.modal.add-address');
    }
}
