<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('layouts.admin')]
class EditProductPage extends Component
{
    use WithFileUploads;

    public $productId;
    public $name, $image, $price, $quantity, $description, $discount, $category;
    public $currentImage;
    public $categories = [];

    public function mount($productId)
    {
        $this->productId = $productId;
        $product = Product::find($this->productId);

        $this->name = $product->name;
        $this->currentImage = $product->image;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->description = $product->description;
        $this->discount = $product->discount;
        $this->category = $product->category;

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

    public function updateProduct()
    {
        $this->validate();

        $product = Product::find($this->productId);

        $imagePath = $this->image ? $this->image->store('images', 'public') : $product->image;

        $product->update([
            'name' => $this->name,
            'image' => $imagePath,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'discount' => $this->discount ?? 0,
            'category' => $this->category,
        ]);

        $this->dispatch('alert',
            type:'success',
            title:'Product updated successfully');

    }


    public function delete()
    {
        $product = Product::find($this->productId);

        $product->delete();


        $this->dispatch('alert',
            type:'success',
            title:'Product deleted successfully');


        $this->redirect('/admin/dashboard');


    }

    public function render()
    {
        return view('livewire.admin.edit-product-page');
    }
}
