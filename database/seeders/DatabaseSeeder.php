<?php

namespace Database\Seeders;

use App\Models\address;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' =>'Admin',
            'email' =>'admin@mail.com',
            'role' =>'admin',

        ]);



        Product::factory(70)->create();
//
//        Address::factory(50)->create();
//
//        Cart::factory(50)->create();


    }
}
