<div class="p-2 flex  flex-col">

    <div class="xl:w-3/4  w-full xl:p-3 p-1">

        <div class="flex gap-5 max-xl:flex-col xl:items-center ">
            <img src="{{asset($product['image'])}}" class="rounded-md xl:w-[30rem] max-h-[20rem] object-cover">

            <div class="p-2  text-gray-500 ">
                <span class="p-1 rounded-full bg-gray-100">{{$product->category}}</span>
                <h1 class="text-4xl font-bold max-w-md text-black mt-3">{{$product->name}}</h1>

                <div class="flex flex-col space-y-2 mt-5">
                    <span class="text-3xl font-bold">
                        GH₵
                        @if($product['discount'] > 0)
                            {{ number_format($product['price'] * (1 - $product['discount'] / 100), 2) }}
                        @else
                            {{ number_format($product['price'], 2) }}
                        @endif
                    </span>

                    @if($product['discount'] > 0)
                        <div>
                    <span class="text-lg font-bold line-through ">
                        GH₵ {{ number_format($product['price'], 2) }}
                    </span>
                            <span class="ml-2 bg-blue-500 text-white rounded-md text-lg p-1">
                        ({{$product['discount']}}% OFF)
                    </span>
                        </div>
                    @endif
                </div>

                <livewire:user.button.add-to-cart :id="$product['id']" :quantity="$product['quantity']" style="bg-green-500 hover:bg-green-500/90  py-2 rounded-md text-white font-medium tracking-wider transition w-full mt-5 "/>
            </div>
        </div>


        <div class="mt-4 w-full ">

            <div class="flex xl:w-[30rem] p-2 justify-between items-center ">
                <p class="text-md text-red-500 font-semibold">{{$product->quantity}} left in stock</p>




            </div>
            {{$product->description}}
        </div>
    </div>

    <div class=" w-full p-2 mt-4 flex flex-col">
        <h1 class="text-green-500 text-3xl font-bold">Recommended Products</h1>
        <div class="w-full flex md:flex-row justify-between mt-4 flex-col gap-y-6 flex-wrap">
            @foreach($recommended as $product)
                <livewire:product-card :product="$product" />
            @endforeach
        </div>


    </div>



</div>
