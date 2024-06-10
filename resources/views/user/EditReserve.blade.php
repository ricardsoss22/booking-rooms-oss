<!-- resources/views/reservations/edit.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-bold text-2xl text-center">
                    {{ __("Edit Reservation") }}
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form action="{{ route('user.reserve.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->email }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->phone }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->start_date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->end_date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="room_quantity" class="block text-sm font-medium text-gray-700">Number of Rooms</label>
                            <input type="number" name="room_quantity" id="room_quantity" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $reservation->room_quantity }}" required min="1" max="{{ $reservation->room->quantity }}" onchange="updateEditPrice()">
                        </div>
                        <div class="mb-4">
                            <p class="block text-sm font-medium text-gray-700">Total Price: $<span id="edit_total_price">0.00</span></p>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <a href="/reserve" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const pricePerRoom = {{ $reservation->room->price }};

        function updateEditPrice() {
            const roomQuantity = document.getElementById('room_quantity').value;
            const totalPrice = roomQuantity * pricePerRoom;
            document.getElementById('edit_total_price').textContent = totalPrice.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateEditPrice(); // Initialize price on page load
        });
    </script>
</x-app-layout>
