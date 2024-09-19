<?php


namespace App\Livewire\User;


use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ExplorePage extends Component
{

//    use WithPagination;
    public function render()
    {
        // Return the view with the products
        return view('livewire.user.explore-page', [
            'products' => Product::all()
        ]);
    }
}
