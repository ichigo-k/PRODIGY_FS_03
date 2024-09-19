<a class="flex items-center p-2 hover:bg-gray-200 hover:rounded-md mt-2" href="/cart">
    <i class="fa-solid fa-cart-shopping mr-3"></i>
    View Cart
    @if($cartCount > 0)
        <p class="absolute right-10 p-[4px] px-3 rounded-full bg-red-500 text-white">
            {{ $cartCount }}
        </p>
    @endif
</a>
