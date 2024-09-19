<div class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form class="space-y-3" wire:submit.prevent="add">

            <div class=" w-80">
                <label class="text-gray-600 font-semibold">Country<span class="text-red-500">*</span></label>
                <input
                    class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                    wire:model.defer="country" type="text"
                />
                @error('country')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class=" w-80">
                <label class="text-gray-600 font-semibold">City<span class="text-red-500">*</span></label>
                <input
                    class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                    wire:model.defer="city" type="text"
                />
                @error('city')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class=" w-80">
                <label class="text-gray-600 font-semibold">Street<span class="text-red-500">*</span></label>
                <input
                    class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                    wire:model.defer="street" type="text"
                />
                @error('street')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class=" w-80">
                <label class="text-gray-600 font-semibold">Landmark</label>
                <input
                    class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                    wire:model.defer="landmark" type="text"
                />
                @error('landmark')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </form>

        <div class="grid grid-cols-2 gap-x-2 mt-5 w-full">
            <button wire:click="add" class="p-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-colors duration-200 px-4 ">
                <p wire:loading.remove wire:target="add" >Add</p>
                <p wire:loading wire:target="add"><i class="fa-solid fa-spinner fa-spin"></i></p>
            </button>
            <button wire:click="cancelEditAddress" class="p-2 bg-gray-300 text-gray-800 rounded-lg shadow-md hover:bg-gray-400 transition-colors duration-200">Cancel</button>
        </div>
    </div>
</div>
