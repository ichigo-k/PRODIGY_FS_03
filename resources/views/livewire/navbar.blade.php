<nav class="w-full max-xl:p-2  py-5 justify-center bg-white  pb-2 " x-data="{
    openDropDown:false,
   slide:false


}">

    <div class="xl:px-[5rem] w-full flex justify-between items-center relative">
        <a href="/" class="font-bold text-green-500   md:text-3xl text-2xl ">
            Swift<span class="text-black">Cart.</span>
        </a>

        <div class="space-x-[1rem] max-md:hidden xl:text-lg  text-md">
            <a href="/" class="{{request()->is('/') ? 'text-white bg-green-500 rounded-full px-2 p-1  ':'hover:bg-gray-100 rounded-full px-2 duration-150 p-1'}}">Home</a>
            <a href="/explore" class="{{request()->is('explore') ? 'text-white bg-green-500 rounded-full px-2  p-1':'hover:bg-gray-100 rounded-full px-2  duration-150 p-1'}}" >Explore</a>
            <a href="/categories" class="{{request()->is('categories') ? 'text-white bg-green-500 rounded-full px-2 p-1 ':'hover:bg-gray-100 rounded-full px-2  duration-150 p-1'}}">Categories</a>
        </div>

        @guest()
            <a href="/login"  class="p-1 px-10 border border-green-500 text-green-500 rounded-md font-semibold hover:bg-green-500 hover:text-white duration-300">
                Login
            </a>
        @endguest


        @auth()


            <div class="max-md:hidden flex justify-center items-center">
                   <p class="text-lg font-semibold">Hi, {{explode(' ', $user['name'], 2)[0]}}</p>
                <img src="{{$url}}" alt="" class="w-12 h-12 ml-2 rounded-full object-cover border-2 border-green-500" @click="openDropDown = !openDropDown" />

                <div class="absolute bg-white hidden md:flex  shadow-xl w-[15rem] rounded-md  flex-col mt-[15rem] z-[50]  p-2 mr-[10rem]" x-show="openDropDown" x-cloak x-transition @click.away="openDropDown = false">
                    <a class="flex items-center p-2 hover:bg-gray-200 hover:rounded-md mt-2" href="/cart">
                        <i class="fa-solid fa-cart-shopping mr-3"></i>
                        View Cart
                        @if($user->cart && count($user->cart->items) > 0)
                            <p class="absolute right-10 p-[4px] px-3 rounded-full bg-red-500 text-white">
                                {{ count($user->cart->items) }}
                            </p>
                        @endif
                    </a>


                    <a class="flex items-center p-2  hover:bg-gray-200 hover:rounded-md" href="/profile">
                        <i class="fa-solid fa-user mr-3"></i>
                        Profile
                    </a>

                    <button class="w-full bg-red-500 text-white rounded-md shadow-lg mt-3 p-1 " wire:click="logout">
                        Logout
                    </button>
                </div>
            </div>

            <div class="md:hidden">
                <i class="fa-solid fa-bars text-2xl " @click="slide = !slide"></i>

                <div  class="absolute w-[13rem] bg-white z-[50] rounded-md right-0 p-2 top-[2rem] shadow-xl" x-show="slide" x-cloak x-transition @click.away="slide = false">
                        <div class="w-full flex items-center space-x-3 mb-2">
                            <img src="{{$url}}" alt="" class="w-12 h-12 ml-2 rounded-full object-cover border-2 border-green-500" />
                            <p>
                                {{$user['name']}}
                            </p>
                        </div>

                    <hr/>
                    <div class="space-y-[1rem]  flex flex-col mt-5">
                        <a href="/" class="{{request()->is('/') ? 'text-white bg-green-500 rounded-full px-2 p-1  ':'hover:bg-gray-100 rounded-full px-2 duration-150 p-1'}}">Home</a>
                        <a href="/explore" class="{{request()->is('explore') ? 'text-white bg-green-500 rounded-full px-2  p-1':'hover:bg-gray-100 rounded-full px-2  duration-150 p-1'}}" >Explore</a>
                        <a href="/categories" class="{{request()->is('categories') ? 'text-white bg-green-500 rounded-full px-2 p-1 ':'hover:bg-gray-100 rounded-full px-2  duration-150 p-1'}}">Categories</a>
                    </div>

                    <hr/>
                    <a class="flex items-center p-2 hover:bg-gray-200 hover:rounded-md mt-2" href="/cart">
                        <i class="fa-solid fa-cart-shopping mr-3"></i>
                        View Cart
                        @if($user->cart && count($user->cart->items) > 0)
                            <p class="absolute right-10 p-[4px] px-3 rounded-full bg-red-500 text-white">
                                {{ count($user->cart->items) }}
                            </p>
                        @endif
                    </a>


                    <a class="flex items-center p-2  hover:bg-gray-200 hover:rounded-md" href="/profile">
                        <i class="fa-solid fa-user mr-3"></i>
                        Profile
                    </a>

                    <button class="w-full bg-red-500 text-white rounded-md shadow-lg mt-3 p-1 " wire:click="logout">
                        Logout
                    </button>


                </div>
            </div>



        @endauth


    </div>


</nav>
