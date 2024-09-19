<div class="bg-white  flex flex-col hover:shadow-xl hover:scale-105 transition duration-300 border-2 border-gray-100 rounded-xl w-72  min-h-[10rem]" wire:key="{{$product['id']}}">
    <a href="/products/{{$product['id']}}" >
        <img src="{{asset($product['image'])}}" class="w-full h-full max-h-[13rem] object-cover rounded-t-xl" alt="{{$product['name']}}">
    </a>


    <div class="p-5 flex-col gap-3">
        <span class="px-3 py-1 rounded-full text-xs bg-gray-100">{{$product['category']}}</span>
{{--        <span class="px-3 py-1 rounded-full text-xs bg-gray-100">Chef's Special</span>--}}

        <h2 class="font-semibold text-2xl overflow-ellipsis overflow-hidden whitespace-nowrap">
            {{$product['name']}}
        </h2>

        <div class="flex flex-col space-y-2">
            <span class="text-xl font-bold">
                GH₵
                @if($product['discount'] > 0)
                    {{ number_format($product['price'] * (1 - $product['discount'] / 100), 2) }}
                @else
                    {{ number_format($product['price'], 2) }}
                @endif
            </span>

            @if($product['discount'] > 0)
                <div>
                    <span class="text-xs font-bold line-through">
                        GH₵ {{ number_format($product['price'], 2) }}
                    </span>
                    <span class="ml-2 bg-blue-500 text-white rounded-md text-xs p-1">
                        ({{$product['discount']}}% OFF)
                    </span>
                </div>
            @endif
        </div>

        <p class="text-red-500 ">{{$product['quantity']}} left in stock</p>

        <div class="mt-5 flex gap-2 items-center">

            <livewire:user.button.add-to-cart :id="$product['id']" :quantity="$product['quantity']" style="bg-green-500 hover:bg-green-500/90  py-2 rounded-md text-white font-medium tracking-wider transition w-full"/>
            <livewire:user.button.view :id="$product['id']" style="p-2 whitespace-nowrap font-medium rounded-md bg-black text-white "/>
        </div>
    </div>
</div>
