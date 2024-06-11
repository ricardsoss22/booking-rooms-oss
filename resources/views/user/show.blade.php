<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$room->name}}
        </h2>
    </x-slot>

    <div class="py-6 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 md:p-6">
                <div class="flex flex-col md:flex-row md:gap-14">
                    <div class="md:w-1/2">
                        <img src="{{ asset($room->image) }}" alt="Room Image" class="w-full h-64 md:h-96 object-cover rounded-md">
                    </div>
                    <div class="md:w-1/2 mt-6 md:mt-0 pl-0 md:pl-12">
                        <h2 class="text-2xl md:text-4xl font-bold mb-4">{{ $room->name }}</h2>
                        <p class="text-lg md:text-4xl text-gray-700 mb-6">Price: {{ $room->price }}€</p>
                        <p class="text-lg md:text-2xl text-gray-600 mb-6">{{ $room->description }}</p>
                        <button id="bookNowBtn" class="inline-block bg-orange-500 text-white px-4 md:px-6 py-2 rounded-lg font-bold uppercase text-sm md:text-base transition-transform duration-200 transform hover:scale-105 w-full md:w-auto">
                            Book Now
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="reserveModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full md:w-1/3">

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

