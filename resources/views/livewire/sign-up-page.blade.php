<div class="flex flex-col items-center" wire:submit.prevent="signUp">
    <h1 class="text-green-500 font-bold text-2xl text-center">Sign Up</h1>
    <p class="text-md text-gray-500 text-center">Already have an account? <a href="/login" class="text-green-500">logIn</a></p>

    <form class="mt-5">
        @foreach($fields as $field)
            <div class="w-[20rem] flex flex-col mb-5">
                <label class="text-gray-600 font-semibold">
                    {{ $field['label'] }} <span class="text-red-500">*</span>
                </label>
                <input
                    class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                    placeholder="{{ $field['placeholder'] }}"
                    wire:model.defer="{{$field['name']}}"
                    type="{{ $field['type'] }}"
                />
                @error($field['name'])
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button class="w-full rounded-md bg-green-500 p-2 shadow-lg text-white">
            <p wire:loading.remove wire:target="signUp" >SignUp</p>
            <p wire:loading ><i class="fa-solid fa-spinner fa-spin" style="color: #ffffff;"></i> </p>
        </button>
    </form>
</div>
