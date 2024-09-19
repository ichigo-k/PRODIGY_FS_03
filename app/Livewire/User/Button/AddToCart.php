<?php

namespace App\Livewire\User\Button;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    public $style, $id, $quantity, $amount = 1, $hasItem = false, $cartItemQuantity = 0;

    public function mount()
    {
        // Check if the item is already in the user's cart and set the flag
        $this->checkIfInCart();
    }

    public function checkIfInCart()
    {
        if (auth()->check()) {
            $cartItem = auth()->user()->cart->items->where('product_id', $this->id)->first();
            if ($cartItem) {
                $this->hasItem = true;
                $this->cartItemQuantity = $cartItem->quantity;
            } else {
                $this->hasItem = false;
                $this->cartItemQuantity = 0;
            }
        }
    }

    public function add()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $cart = $user->cart()->firstOrCreate(['user_id' => $user->id]);
        $product = Product::findOrFail($this->id);

        $cartItem = $cart->items()->where('product_id', $this->id)->first();

        if ($cartItem) {
            // If the item exists in the cart, increment the quantity
            $cartItem->quantity += $this->amount;
            $cartItem->save();
        } else {
            // If the item doesn't exist, create a new cart item
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $this->amount, // Default to 1 or whatever is passed in
                'price' => $product->price,
            ]);

            $this->dispatch(
                'alert',
                type:'success',
                title:'Item added successfully'
            );
        }

        $this->checkIfInCart(); // Refresh the state to show the increment/decrement buttons
    }

    public function increment()
    {
        $cartItem = auth()->user()->cart->items->where('product_id', $this->id)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
            $this->cartItemQuantity = $cartItem->quantity;
        }
    }

    public function decrement()
    {
        $cartItem = auth()->user()->cart->items->where('product_id', $this->id)->first();
        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
            $this->cartItemQuantity = $cartItem->quantity;
        } elseif ($cartItem && $cartItem->quantity == 1) {
            $cartItem->delete();
            $this->cartItemQuantity = 0;
            $this->hasItem = false; // Show Add to Cart button again
        }
    }

    public function render()
    {
        return view('livewire.user.button.add-to-cart');
    }
}
