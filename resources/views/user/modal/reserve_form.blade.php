<!-- resources/views/reserve_form.blade.php -->
<form action="{{ route('user.reserve.store', $room->id) }}" method="POST">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    @csrf
    <!-- Flex container to hold the close button at the top right -->
    <div class="flex justify-end mb-4">
        <button type="button" id="closeModalBtn" class="inline-flex items-center justify-center h-10 bg-transparent transition-all duration-200 ease-in-out px-4 cursor-pointer font-sans font-bold tracking-widest uppercase text-sm leading-tight border-2 border-[#402a23] hover:bg-[#402a23] hover:text-white rounded-full">
            X
        </button>
    </div>

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required>
    </div>
    <div class="mb-4">
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="tel" name="phone" id="phone" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required>
    </div>
    <div class="mb-4">
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
    </div>
    <div class="mb-4">
        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
        <input type="date" name="end_date" id="end_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
    </div>
    <div class="mb-4">
        <label for="room_quantity" class="block text-sm font-medium text-gray-700">Number of Rooms</label>
        <input type="number" name="room_quantity" id="room_quantity" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" required min="1" max="{{ $room->quantity }}" value="1" onchange="updatePrice()">
    </div>
    <div class="mb-4">
        <p class="block text-sm font-medium text-gray-700">Total Price: $<span id="total_price">0.00</span></p>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="inline-flex items-center justify-center h-10 bg-transparent transition-all duration-200 ease-in-out px-6 py-0.5 w-full cursor-pointer font-sans font-bold tracking-widest uppercase text-sm leading-tight border-2 [border-color:#402a23] hover:[background-color:#402a23] hover:text-white">
            Reserve
        </button>
    </div>
</form>

<script>
    const pricePerRoom = {{ $room->price }};

    function updatePrice() {
        const roomQuantity = document.getElementById('room_quantity').value;
        const totalPrice = roomQuantity * pricePerRoom;
        document.getElementById('total_price').textContent = totalPrice.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function() {
        updatePrice(); // Initialize price on page load
    });
</script>
