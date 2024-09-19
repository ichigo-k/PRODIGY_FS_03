<div class="relative w-full md:w-[30rem] w-[15rem]" x-data="{ isOpen: true }" @click.away="isOpen = false" @keydown.escape.window="isOpen = false">
    <!-- Search Input -->
    <div class="flex items-center bg-white p-2 rounded-2xl shadow-lg w-full">
        <input
            type="text"
            class="w-full focus:outline-none transition-all duration-150"
            wire:model.live="search"
            placeholder="Search products..."
            @input="isOpen = true"
        />
        <!-- Loading Spinner -->
        <i wire:loading.remove class="fa-solid fa-magnifying-glass p-2 bg-green-500 text-white rounded-full"></i>
        <i wire:loading class="fa-solid fa-spinner fa-spin p-2 bg-green-500 text-white rounded-full"></i>
    </div>

    <!-- Search Results Dropdown -->
    @if(strlen($search) > 1)
        <div class="absolute w-full mt-2 z-50 rounded-xl shadow-xl p-4 bg-white flex flex-col max-h-[25rem] overflow-y-auto" x-show="isOpen" @click.away="isOpen = false">
            @if($results && $results->count() > 0)
                @foreach($results as $result)
                    <a href="{{$url}}{{$result->id}}" class="p-2 hover:bg-gray-100 cursor-pointer flex items-center mx-auto space-x-3 w-full">
                        <img src="{{asset($result->image)}}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover shadow-sm" />

                        <div>
                            <div class="font-medium">{{$result->name}} </div>
                            <div class="text-sm text-gray-500">{{$result->category}}</div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="text-gray-500">
                    Product with name "{{$search}}" not found.
                </div>
            @endif
        </div>
    @endif
</div>
