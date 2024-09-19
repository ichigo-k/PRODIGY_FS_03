<div class="w-full p-2 flex flex-col items-center">

    <div class="w-full mb-4 flex items-center justify-between max-md:flex-col-reverse max-md:gap-y-5">
      <livewire:search-bar url="products/"/>



    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6  ">
        @foreach($products as $product)
            <livewire:product-card :product="$product" />
        @endforeach
    </div>

{{--    <div class="block md:hidden">--}}
{{--        {{$products->links()}}--}}
{{--    </div>--}}



</div>
