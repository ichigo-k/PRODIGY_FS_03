<?php

use App\Http\Middleware\CheckRole;
use App\Livewire\Dashboard;
use App\Livewire\LoginPage;
use App\Livewire\SignUpPage;
use App\Livewire\User\CartPage;
use App\Livewire\User\CategoryPage;
use App\Livewire\User\CatPage;
use App\Livewire\User\ExplorePage;
use App\Livewire\User\ProductPage;
use App\Livewire\User\ProfilePage;
use Illuminate\Support\Facades\Route;



Route::get('/login', LoginPage::class)->name('login')->middleware('guest');
Route::get('/signup', SignUpPage::class)->name('signup')->middleware('guest');

Route::get('/', Dashboard::class)->name('home');
Route::get('/categories',CatPage::class)->name('categories');
Route::get('/explore', ExplorePage::class)->name('explore');
Route::get('/products/{product}', ProductPage::class)->name('product');
Route::get('/categories/{category}', CategoryPage::class)->name('cat');

Route::get('/profile', ProfilePage::class)->name('profile')->middleware(['auth','role:user']);
Route::get('/cart', CartPage::class)->name('profile')->middleware(['auth', 'role:user']);

Route::get('/admin/dashboard', App\Livewire\Admin\Dashboard::class)->name('admin.dashboard')
->middleware(['auth', 'role:admin']);

Route::get('/product/add', App\Livewire\Admin\AddProductPage::class)->name('admin.product.add')
    ->middleware(['auth','role:admin']);

Route::get('/products/edit/{productId}', App\Livewire\Admin\EditProductPage::class)->name('admin.product.edit')
    ->middleware(['auth','role:admin']);
