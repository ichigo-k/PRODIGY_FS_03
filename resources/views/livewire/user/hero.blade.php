<div class="flex w-full items-center gap-x-10 p-2">
    <div class="w-[20rem]  xl:flex flex-col items-start hidden">
        @foreach($categories as $category => $details)
            <a href="categories/{{$category}}" class="p-4 flex items-center gap-x-3 hover:bg-gray-200 hover:scale-105 duration-300 transition-all rounded-md   w-full ">
                <i class="fa-solid {{$details['icon']}} mr-3"></i>
                <h3 class="font-semibold  text-lg">{{ $category }}</h3>
            </a>
        @endforeach
    </div>

    <div class="w-full xl:h-[35rem] md:h-[25rem] h-[12rem] relative">
        <img src="https://cdn.pixabay.com/photo/2018/05/17/14/16/fruit-3408683_960_720.jpg" class=" w-full h-full object-cover  ">
        <div class="w-full h-full rounded-md bg-black/50 z-[40] absolute top-0 rounded-md flex justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <h1 class="text-3xl text-white font-semibold">High Quality Products Right At Your Door Step</h1>

                    <a href="/explore" class="p-2 border border-green-500 text-xl  text-green-500 mt-5">
                        Explore More
                    </a>
                </div>
        </div>
    </div>

</div>
