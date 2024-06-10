<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <?php if(!$rooms){$rooms = [];} ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center items-center flex-col py-3">
                    <div class="p-6 text-gray-900 font-bold text-3xl">
                        {{ __("All Room") }}
                    </div>
                    <a href="/admin/room/create"><button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 px-4 rounded">Add Rooms</button></a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
                    @foreach ($rooms as $room)
                        <a href="/admin/room/edit/{{$room->id}}" class="block">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                                <div class="relative">
                                    <img src="{{ asset($room->image) }}" alt="Room Image" class="w-full h-48 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">Name: {{$room->name}}</h3>
                                    <p class="text-gray-600">Price per night: {{$room->price}}€</p>
                                    <form action="{{ route('admin.room.destroy', $room->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>





            </div>
        </div>
    </div>
</x-app-layout>
