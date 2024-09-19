<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.auth')]
class SignUpPage extends Component
{

    public string $email;
    public string $password;
    public string $name;
    public string $phone ;

    public array $fields= [
        [
            'name' => 'name',
            'label' => 'Name',
            'placeholder' => 'John Doe',
            'type' => 'text',
        ],
        [
            'name' => 'email',
            'label' => 'Email',
            'placeholder' => 'example@gmail.com',
            'type' => 'email',
        ],
        [
            'name' => 'password',
            'label' => 'Password',
            'placeholder' => '*******',
            'type' => 'password',
        ],
        [
            'name' => 'phone',
            'label' => 'Phone',
            'placeholder' => '+233 534345667',
            'type' => 'phone',
        ]

    ];


    public function signUp()
    {
        // Validate input fields
        $this->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|min:10|unique:users',
        ]);


        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
        ]);

        if ($user) {

            Cart::create([
                'user_id' => $user->id,
            ]);


            Auth::login($user);


            request()->session()->regenerate();


            return redirect('/');
        }
    }


    public function render()
    {
        return view('livewire.sign-up-page');
    }
}
