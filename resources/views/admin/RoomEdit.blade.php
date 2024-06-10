<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Edit Room</h1>
        <form class="space-y-6" action="{{ route('admin.room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $room->id }}">
            @csrf
            @method('PATCH')
            <div class="form-field">
                <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" name="name" id="name" value="{{ old('name', $room->name) }}" required>
            </div>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="image" class="block text-lg font-medium text-gray-700">Image Upload</label>
                <input type="file" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" name="image" id="image" accept="image/*">
                @if ($room->image)
                    <img src="{{ asset($room->image) }}" alt="Room Image" class="mt-2 w-48 h-48 object-cover">
                @endif
            </div>
            @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" name="description" id="description" required>{{ old('description', $room->description) }}</textarea>
            </div>
            @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" name="price" id="price" value="{{ old('price', $room->price) }}" required>
            </div>
            @error('price')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity</label>
                <input type="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Room quantity" name="quantity" id="quantity" required>
            </div>
            @error('quantity')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>

