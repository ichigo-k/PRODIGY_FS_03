<div class="w-full p-2 flex flex-col items-center">
    <livewire:user.hero/>

    <div class="p-3 mt-5">
        @foreach($sections as $item)
            <div class="w-full mb-10 ">
                <!-- Section title -->
                <div class="w-full flex flex-col items-center">
                    <h1 class="font-bold text-center text-3xl mb-2">{{ $item['section'] }}</h1>
                    <p class="w-[5rem] h-1 bg-green-500"></p>
                </div>

                <!-- Product grid -->
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-6">
                    @foreach($item['products'] as $product)
                        <livewire:product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
