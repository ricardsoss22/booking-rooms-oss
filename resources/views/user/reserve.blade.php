<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-bold text-3xl text-center">
                    {{ __("Your reservations") }}
                </div>
                <div class="p-6">
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Room</th>
                            <th class="px-4 py-2">Start Date</th>
                            <th class="px-4 py-2">End Date</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="border px-4 py-2">{{ $reservation->room->name }}</td>
                                <td class="border px-4 py-2">{{ $reservation->start_date }}</td>
                                <td class="border px-4 py-2">{{ $reservation->end_date }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('user.reserve.edit', $reservation->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                                    <form action="{{ route('user.reserve.destroy', $reservation->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Decline</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
