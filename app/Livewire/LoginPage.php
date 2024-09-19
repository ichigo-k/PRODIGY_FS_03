<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class LoginPage extends Component
{

    public string $email;
    public string $password;

    public array $fields= [
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
        ]

    ];


    public function login(){

        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            request()->session()->regenerate();

            if(auth()->user()->role == 'admin'){
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/');
        }

        $this->addError('email', 'The provided email does not match our records.');
        $this->addError('password', 'The provided password does not match our records.');




    }

    public function render()
    {
        return view('livewire.login-page');
    }
}
