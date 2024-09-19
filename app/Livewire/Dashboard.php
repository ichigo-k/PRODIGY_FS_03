<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Start Here')]
class Dashboard extends Component
{

    public function getProducts()
    {
        $data = [];

        $sections = ['Featured Products', 'Popular Products', 'Discount Products'];

        foreach ($sections as $section) {
            if ($section == 'Discount Products') {
                $products = Product::where('discount', '>', 0)->take(4)->get();
            }

            elseif ($section == 'Featured Products') {
                $products = Product::orderBy('created_at', 'desc')->take(4)->get();
            }
            elseif ($section == 'Popular Products') {
                $products = Product::orderBy('rating', 'asc')->take(4)->get();
            }

            // Push each section's data into the array
            $data[] = [
                'section' => $section,
                'products' => $products,
            ];
        }

        return $data;
    }


    public function render()
    {
        return view('livewire.dashboard',[
            'sections' => $this->getProducts(),
        ]);
    }
}
