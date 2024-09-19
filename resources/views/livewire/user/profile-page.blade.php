<div class=" mt-4 p-2">



    <div class="w-full flex flex-col xl:flex-row  ">
        <div class="xl:w-1/3 w-full p-2 ">
            <img src="{{ asset($url) }}" alt="hello" class="rounded-full max-xl:size-[10rem] object-cover">

        </div>


        <div class="xl:mt-10 xl:w-2/3 xl:ml-[5.5rem]">
            <form class=" " wire:submit.prevent ="save">
                <h1 class="text-3xl font-bold mb-5">User Details </h1>

                <div class=" w-80  mb-2">
                    <label class="text-gray-600 font-semibold">Name</label>
                    <input
                        class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                        wire:model.defer="name" type="text"
                    />
                    @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full xl:flex gap-x-4 items-center">
                    <div class=" w-80">
                        <label class="text-gray-600 font-semibold">Email</label>
                        <input
                            class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                            wire:model.defer="email" type="text"
                        />
                        @error('email')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" w-80">
                        <label class="text-gray-600 font-semibold">Phone</label>
                        <input
                            class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                            wire:model.defer="phone" type="text"
                        />
                        @error('phone')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="p-2 rounded-md shadow-xl text-white mt-5 bg-blue-500  w-[8rem]">
                  <p wire:loading.remove wire:target="save" >Save Changes</p>
                    <p wire:loading wire:target="save"><i class="fa-solid fa-spinner fa-spin"></i></p>
                </button>

            </form>

            <div class="mt-10">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold mb-5">Shipping Details</h1>

                    <button class="p-2 bg-green-500 text-white rounded-full"  wire:click="$set('addAddress', true)">
                        Add Address
                    </button>
                </div>

                @if(count($addresses) >= 1)
                    <div class="mt-2 grid xl:grid-cols-2 gap-2">
                        @foreach($addresses as $item)
                            <div class="border-2 border-gray-100 p-2 rounded-xl flex flex-col  relative group" wire:key="{{$item->id}}">
                                <div>
                                    <p class="text-sm text-gray-500">Country</p>
                                    <h3 class="font-semibold text-black text-lg">{{$item->country}}</h3>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">City</p>
                                    <h3 class="font-semibold text-black text-lg">{{$item->city}}, {{$item->street}} </h3>
                                </div>

                              <div class="absolute right-2 top-2 hidden group-hover:block duration-300 ">
                                  <button class="mt-2 bg-orange-400 text-white rounded-md px-4" wire:click="$set('editAddress', true)" >
                                      Edit
                                  </button>

                                  <button class="mt-2 bg-red-500 text-white rounded-md  px-3 " wire:click="delete({{$item->id}})">
                                      Delete
                                  </button>
                              </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="w-full flex justify-center items-center">
                        You have no shipping address set
                    </div>
                @endif

            </div>

            <div class="mt-10 mb-4">

                <h1 class="text-3xl font-bold mb-5">Change Password</h1>

                <form class="mt-5 " wire:submit.prevent="changePassword">

                    <div class=" w-80  mb-2">
                        <label class="text-gray-600 font-semibold">Old Password</label>
                        <input
                            class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                            wire:model.defer="oldPassword" type="password"
                        />
                        @error('oldPassword')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class=" w-80  mb-2">
                        <label class="text-gray-600 font-semibold">New Password</label>
                        <input
                            class="w-full border border-gray-200 p-2 rounded-md focus:outline-none"
                            wire:model.defer="newPassword" type="password"
                        />
                        @error('newPassword')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="p-2 bg-green-500 text-white rounded-md mt-2 w-[10rem]">
                        <p wire:loading.remove wire:target="changePassword" >Change Password</p>
                        <p wire:loading wire:target="changePassword"><i class="fa-solid fa-spinner fa-spin"></i></p>
                    </button>

                </form>

            </div>




        </div>
    </div>


    @if ($addAddress)
       <livewire:user.modal.add-address/>
    @endif


    @if ($editAddress)
        <livewire:user.modal.edit-address/>
    @endif


</div>
