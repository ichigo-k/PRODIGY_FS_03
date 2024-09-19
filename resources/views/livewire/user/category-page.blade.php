<div class="mt-5 ">
    <h1 class="text-3xl font-semibold" >{{$category}}</h1>
    <div class="w-full flex justify-center flex-wrap gap-6 mt-5">
        @foreach($products as $product)
            <livewire:product-card :product="$product" />
        @endforeach
    </div>
</div>
