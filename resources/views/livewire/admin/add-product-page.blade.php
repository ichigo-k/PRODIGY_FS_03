<div class="container mx-auto p-8  min-h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add New Product</h1>

        <form wire:submit.prevent="saveProduct" enctype="multipart/form-data" class="space-y-6">
            <!-- Product Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" wire:model="name"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                       placeholder="Enter product name">
                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-4 ">Image</label>
                <div class="flex items-center gap-x-3">
                    <div class="shrink-0">
                        @if ($image)
                             <img class="h-16 w-16 object-cover rounded-full" src="{{ $image->temporaryUrl() }}" alt="Current profile photo" />
                        @endif
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" wire:model="image" class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-vgreen-50 file:text-green-700
                              hover:file:bg-green-100
                            "/>
                    </label>
                </div>
                <div wire:loading wire:target="image" class="text-blue-500 text-sm mt-2">Uploading...</div>
                @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror

                <!-- Loading and Preview -->

                @if ($image)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Image Preview</label>
                        <img src="{{ $image->temporaryUrl() }}"
                             alt="Image Preview" class="mt-2 w-[20rem] mx-auto h-48 object-cover rounded-lg border border-gray-200">
                    </div>
                @endif
            </div>

            <!-- Pricing Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" wire:model="price"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                           step="0.01" placeholder="Enter price">
                    @error('price') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" wire:model="quantity"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                           placeholder="Enter quantity">
                    @error('quantity') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea wire:model="description"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                          rows="4" placeholder="Enter product description"></textarea>
                @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Category and Discount -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select wire:model="category"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category =>$details)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Discount (%)</label>
                    <input type="number" wire:model="discount"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                           min="0" max="100" placeholder="Enter discount">
                    @error('discount') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full py-3 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-400 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</div>
