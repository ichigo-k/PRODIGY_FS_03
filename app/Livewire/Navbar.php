<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public $url;

    public function mount()
    {

        // Generate a random image URL
        $images = ["/assets/image1.jpeg", "/assets/image2.jpeg",  "/assets/image3.jpeg","/assets/image4.jpeg","/assets/image5.jpeg","/assets/image6.jpeg","/assets/image7.jpeg","/assets/image8.jpeg","/assets/image9.jpeg","/assets/image10.jpeg"];
        $this->url = $images[array_rand($images)];


    }






    public function render()
    {
        return view('livewire.navbar',[
            'user'=>auth()->user(),
        ]);
    }
}
