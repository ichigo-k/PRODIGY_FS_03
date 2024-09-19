<div class="container mx-auto p-4">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-2xl font-semibold text-green-500 mb-4">Your Shopping Cart</h2>

        <button class="bg-red-500 p-2 rounded-md text-white" wire:click="clearCart">
            Clear cart
        </button>
    </div>

    <!-- Cart Table -->
    <div class="bg-white shadow-md rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full table-auto w-[50rem]">
            <thead>
            <tr class="text-left text-gray-500 font-medium">
                <th class="pb-4">Product</th>
                <th class="pb-4 text-center">Quantity</th>
                <th class="pb-4 text-center">Price</th>
                <th class="pb-4 text-center">Total</th>
                <th class="pb-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($cartItems as $cartItem)
                <tr class="text-gray-700" wire:key="{{$cartItem['id']}}">
                    <!-- Product Info -->
                    <td class="py-4 flex items-center space-x-4">
                        <a href="/products/{{$cartItem['product']->id}}">
                            <img src="{{ $cartItem['product']->image }}" alt="Product Image" class="w-16 h-16 rounded-lg object-cover">
                        </a>
                        <div>
                            <h3 class="text-lg font-medium">{{ $cartItem['product']->name }}</h3>
                            <p class="text-sm text-gray-500">Category: {{ $cartItem['product']->category }}</p>
                        </div>
                    </td>

                    <!-- Quantity with Icons -->
                    <td class="py-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <button class="text-gray-500 hover:text-green-500 focus:outline-none" wire:click="decrementQuantity({{ $cartItem['id'] }})">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                            <span class="text-lg font-semibold">{{ $cartItem['quantity'] }}</span>
                            <button class="text-gray-500 hover:text-green-500 focus:outline-none" wire:click="incrementQuantity({{ $cartItem['id'] }})">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </td>

                    <!-- Price -->
                    <td class="py-4 text-center">
                        <p class="text-lg font-semibold">GH₵{{ $cartItem['price'] }}</p>
                    </td>

                    <!-- Total Price for Item (Quantity * Price) -->
                    <td class="py-4 text-center">
                        <p class="text-lg font-semibold">GH₵{{ $cartItem['price'] * $cartItem['quantity'] }}</p>
                    </td>

                    <!-- Remove Button -->
                    <td class="py-4 text-center">
                        <button class="text-red-500 hover:text-red-700 focus:outline-none" wire:click="deleteItem({{$cartItem['id']}})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total Price Section -->
    <div class="mt-6 flex justify-between items-center">
        <h3 class="text-xl font-bold text-gray-700">Total: GH₵{{ $totalPrice }}</h3>
        <a href="/" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition-all {{ $totalPrice <= 0 ? 'bg-gray-500 cursor-not-allowed' : '' }}" @if($totalPrice <= 0) disabled @endif>
            Proceed to Checkout
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>
