<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class CartPage extends Component
{
    public $totalPrice = 0;
    public $cartItems = [];

    public function mount()
    {
        $this->cartItems = $this->getData();
    }

    public function getData()
    {
        $cart = auth()->user()->cart;
        $cartItems = $cart->items;

        $data = [];
        $this->totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $this->totalPrice += $cartItem->price * $cartItem->quantity;
            $data[] = [
                'product' => $cartItem->product,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'id' => $cartItem->id,
            ];
        }

        return $data;
    }

    public function incrementQuantity($itemId)
    {
        $item = auth()->user()->cart->items->find($itemId);

        if ($item) {
            $item->quantity += 1;
            $item->save();
        }

        $this->cartItems = $this->getData();
    }

    public function decrementQuantity($itemId)
    {
        $item = auth()->user()->cart->items->find($itemId);

        if ($item && $item->quantity > 0) {
            $item->quantity -= 1;

            // If quantity is 0, remove the item
            if ($item->quantity == 0) {
                $this->deleteItem($itemId);
            } else {
                $item->save();
            }
        }

        $this->cartItems = $this->getData();
    }

    public function deleteItem($itemId)
    {
        $item = auth()->user()->cart->items->find($itemId);

        if ($item) {
            $item->delete();

            $this->dispatch('alert',
                type:'success',
                title:'Item deleted successfully');
        }
    }


    public function clearCart()
    {
        $user = auth()->user();
        $cart = $user->cart;

        if ($cart) {
            $cart->items()->delete();
        }


        $this->dispatch(
            'alert',
            type:'success',
            title:'Cart cleared successfully'
        );

        $this->cartItems = $this->getData();
    }


    public function render()
    {
        return view('livewire.user.cart-page',[
            'cartItems' => $this->getData(),
        ]);
    }
}
