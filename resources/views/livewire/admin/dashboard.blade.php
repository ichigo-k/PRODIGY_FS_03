<div class="mt-5 bg-white  rounded-lg p-6 overflow-auto h-[50rem]">

    <table class="min-w-full table-auto w-[50rem]">
        <thead>
        <tr class="text-left text-gray-500 font-medium">
            <th class="pb-4 ">Product</th>
            <th class="pb-4 text-center">Quantity</th>
            <th class="pb-4 text-center">Unit Price</th>
            <th class="pb-4 text-center">Total Price </th>
            <th class="pb-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($products as $product)
            <tr class="text-gray-700" wire:key="{{$product['id']}}">
                <!-- Product Info -->
                <td class="py-4 flex items-center space-x-4">
                    <a href="/products/edit/{{$product['id']}}">
                        <img src="{{ asset($product->image )}}"
                             alt="Product Image"
                             class="w-16 h-16 rounded-lg object-cover">
                    </a>


                    <div>
                        <h3 class="text-lg font-medium">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">Category: {{ $product->category }}</p>
                    </div>
                </td>

                <!-- Quantity with Icons -->
                <td class="py-4 text-center">
                    <span class="text-lg font-semibold">{{ $product['quantity'] }}</span>
                </td>

                <!-- Price -->
                <td class="py-4 text-center">
                    <p class="text-lg font-semibold">GH₵{{ $product['price'] }}</p>
                </td>

                <!-- Total Price for Item (Quantity * Price) -->
                <td class="py-4 text-center">
                    <p class="text-lg font-semibold">GH₵{{ $product['price'] * $product['quantity'] }}</p>
                </td>

                <!-- Remove Button -->
                <td class="py-4 text-center">
                    <a href="/products/edit/{{$product['id']}}" class="text-red-500 hover:text-red-700 focus:outline-none" >
                        View Item
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
