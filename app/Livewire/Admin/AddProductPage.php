<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('layouts.admin')]
class AddProductPage extends Component
{
    use WithFileUploads;

    public $name, $image, $price, $quantity, $description, $discount, $category;
    public $categories = [];

    public function mount()
    {
       $this->categories = config('categories');
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:1',
        'description' => 'required|string',
        'discount' => 'nullable|integer|min:0|max:100',
        'category' => 'required|string'

    ];

    public function saveProduct()
    {
        $this->validate();

        // If image is uploaded, store it in the 'public/images' directory
        $imagePath = $this->image ? $this->image->store('images', 'public') : null;

        Product::create([
            'name' => $this->name,
            'image' => $imagePath, // Save the path of the image
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'discount' => $this->discount ?? 0,
            'category' => $this->category,
            'rating'=>0
        ]);

        $this->dispatch('alert',
            type:'success',
            title:'Product added successfully');
        $this->reset(); // Reset the form after successful submission
    }

    public function render()
    {
        return view('livewire.admin.add-product-page');
    }
}
