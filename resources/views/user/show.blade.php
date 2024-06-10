<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$room->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-row gap-14">
                    <div class="w-1/2">
                        <img src="{{ asset($room->image) }}" alt="Room Image" class="w-full h-96 object-cover rounded-md">
                    </div>
                    <div class="w-1/2 pl-12">
                        <h2 class="text-4xl font-bold mb-4">{{ $room->name }}</h2>
                        <p class="text-4xl text-gray-700 mb-6">Price: {{ $room->price }}€</p>
                        <p class="text-2xl text-gray-600 mb-6">{{ $room->description }}</p>
                        <button id="bookNowBtn" class="inline-flex items-center justify-center h-10 bg-transparent transition-all duration-200 ease-in-out px-6 py-0.5 w-full cursor-pointer font-sans font-bold tracking-widest uppercase text-sm leading-tight border-2 [border-color:#402a23] hover:[background-color:#402a23] hover:text-white">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="reserveModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">

            @include('user.modal.reserve_form', ['room' => $room])
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('bookNowBtn').addEventListener('click', function() {
            document.getElementById('reserveModal').classList.remove('hidden');
        });
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('reserveModal').classList.add('hidden');
        });
    </script>
</x-app-layout>
