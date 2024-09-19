<div class="mb-5 p-2">
    @foreach($categories as $category)
        <div class="w-full flex items-center py-5 gap-x-5 ">
            <h1 class="font-semibold text-2xl ">{{ $category['name'] }}</h1>

            <a class="text-green-500" href="/categories/{{ $category['name'] }}">
                View All
            </a>
        </div>

        <div class="w-full grid md:grid-cols-2  xl:grid-cols-3 gap-x-[2rem] gap-y-4 mb-10">
            @foreach($category['products'] as $product)
                <div class="flex w-full border-2 border-gray-100 rounded-lg relative hover:shadow-md transition-all hover:border-none duration-300 hover:scale-105" wire:key="{{$product->id}}">
                    <img src="{{asset($product['image'])}}" class="max-xl:w-[10rem] w-[12rem] h-[10rem] rounded-l-lg object-cover">

                    <div class="p-2 flex flex-col justify-between">
                        <h3 class="font-semibold text-lg">{{$product['name']}}</h3>

                        <div class="flex flex-col mb-1 ">
                            <P class="text-gray-500 text-lg font-semibold">GH₵ {{$product['price']}}</P>
                            <P class="text-red-500 text-xs font-semibold">{{$product['quantity']}} left in stock</P>
                        </div>


                        <div class="flex items-center gap-x-2 ">
                           <livewire:user.button.view :id="$product['id']" style="p-2 rounded-md bg-black text-white whitespace-nowrap "/>
                            <livewire:user.button.add-to-cart :id="$product['id']" :quantity="$product['quantity']" style="bg-green-500 hover:bg-green-500/90 whitespace-nowrap  p-2 rounded-md text-white  transition "/>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    @endforeach
</div>
