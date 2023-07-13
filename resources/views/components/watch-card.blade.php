@props(['watch'])

<div class="flex h-auto max-w-full w-full mt-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center">
            <a href="{{ route('watches.show', [$watch]) }}">
                <img class="w-[100px] h-[100px] object-cover object-center rounded-t-lg" src={{"/storage/$watch->image"}} alt="watch image" />

            </a>
        </div>

    <div class="px-5 pb-5 w-full">
        <a href="{{ route('watches.show', [$watch]) }}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$watch->name}}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$watch->description}}</p>
        </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Available: {{$watch->stock}}</p>
        <div class="flex gap-5 items-center w-full justify-start">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$watch->price}}</span>
            @if (! Auth::guest())
            <!--<a href="#" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>-->
            <a href="{{route("watches.edit", [$watch])}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Edit</a>
            <form action="{{route("watches.destroy", [$watch])}}" method="post">
                @method("delete")
                @csrf
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">DELETE</button>
            </form>
            @endif
            </div>
    </div>
</div>
