<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductPage extends Component
{
    public  $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }





    public function render()
    {
        return view('livewire.user.product-page',[
            'product' => $this->product,
            'recommended' => Product::where('category', $this->product->category)->take(4)->get()
        ]);
    }
}
