<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class CategoryPage extends Component
{

    public $products , $category;

    public function mount($category)
    {
        $this->category = $category;
        $this->products = Product::where('category', $this->category)->get();
    }


    public function render()
    {
        return view('livewire.user.category-page',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
