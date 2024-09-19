<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{

    public $search='';
    public $url='';

    public function render()
    {

        $results =[];
        if (strlen($this->search) > 1) {
            $results = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%')
                ->get();
        }

        return view('livewire.search-bar',[
            'results'=>$results
        ]);
    }
}
