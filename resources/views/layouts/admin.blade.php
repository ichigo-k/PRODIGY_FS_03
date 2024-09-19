<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    {{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100">

<?php

$images = ["/assets/image1.jpeg", "/assets/image2.jpeg",  "/assets/image3.jpeg","/assets/image4.jpeg","/assets/image5.jpeg","/assets/image6.jpeg","/assets/image7.jpeg","/assets/image8.jpeg","/assets/image9.jpeg","/assets/image10.jpeg"];

$url = $images[array_rand($images)];

?>

<main class="relative" x-data="{show:false}">
    <div class="xl:px-20 p-5">
        <nav class="w-full flex justify-between">
            <a href="/admin/dashboard" class="font-bold text-green-500   md:text-3xl text-2xl ">
                Swift<span class="text-black">Cart.</span>
            </a>

            <div class="flex items-center">
                <livewire:user.button.logout style="bg-red-500 text-white p-2 rounded-md" x-show="show"/>

                <p x-show="!show" class="text-lg font-semibold max-md:hidden">Hi, {{auth()->user()->name}}</p>
                <!-- User Avatar -->
                <img src="{{asset($url)}}" alt="" class="w-12 h-12 ml-2 rounded-full object-cover border-2 border-green-500" @click="show = !show" />
            </div>
        </nav>

        <div class="flex justify-between items-center mt-5 max-md:flex-col-reverse">
            <livewire:search-bar url="products/view/" />

            <a class="p-2 bg-green-500 rounded-md text-white" href="{{ request()->is('admin/dashboard') ? '/product/add' : '/admin/dashboard' }}">
                {{ request()->is('admin/dashboard') ? 'Add Product' : 'Cancel' }}
            </a>
        </div>

        {{$slot}}
    </div>
</main>
</body>
</html>
