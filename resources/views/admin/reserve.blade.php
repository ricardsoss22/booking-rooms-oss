<!-- resources/views/admin/reserve.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Reservations") }}

                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full mt-4">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Name</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Email</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Phone</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Room</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Start Date</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">End Date</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            @if($reservation->status == 'pending')
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->email }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->phone }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->room->name ?? 'No Room Assigned' }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->start_date }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $reservation->end_date }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ ucfirst($reservation->status) }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    <form action="{{ route('admin.reserve.accept', $reservation->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-900">Accept</button>
                                    </form>
                                    <form action="{{ route('admin.reserve.decline', $reservation->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Decline</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
