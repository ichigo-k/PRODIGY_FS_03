<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CatPage extends Component
{
    public function getData()
    {
        $categories = config('categories');
        $data = [];

        foreach ($categories as $categoryName => $details) {
            $products = Product::where('category', $categoryName)->take(3)->get();
            $data[] = [
                'name' => $categoryName,
                'products' => $products,
            ];
        }

        return $data;
    }

    public function render()
    {
        return view('livewire.user.cat-page', [
            'categories' => $this->getData(),
        ]);
    }
}
