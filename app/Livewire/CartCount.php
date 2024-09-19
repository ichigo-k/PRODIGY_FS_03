<?php

namespace App\Livewire;

use Livewire\Component;

class CartCount extends Component
{

    public $cartCount;

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        if (auth()->check() && auth()->user()->cart) {
            $this->cartCount = auth()->user()->cart->items->count();
        } else {
            $this->cartCount = 0;
        }
    }

    public function render()
    {
        return view('livewire.cart-count');
    }
}
