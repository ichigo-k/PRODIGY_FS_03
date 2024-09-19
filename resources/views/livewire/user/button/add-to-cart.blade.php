<div>
    @if(!$hasItem)
        <!-- Add to Cart Button -->
        <button wire:click="add" class="{{$style}} p-2 {{$quantity <= 0 ? 'bg-gray-500 cursor-not-allowed hover:bg-gray-500' : ''}}">
            <p wire:loading.remove wire:target="add">
                {{$quantity <= 0 ? 'Out of Stock' : 'Add to cart'}}
            </p>
            <p wire:loading wire:target="add"><i class="fa-solid fa-spinner fa-spin"></i></p>
        </button>
    @else
        <!-- Increment and Decrement Buttons -->
        <div class="flex items-center mr-5">
            <button wire:click="decrement" class="px-2 py-1 bg-red-500 text-white rounded">-</button>
            <span class="mx-2">{{$cartItemQuantity}}</span>
            <button wire:click="increment" class="px-2 py-1 bg-green-500 text-white rounded">+</button>
        </div>
    @endif
</div>
