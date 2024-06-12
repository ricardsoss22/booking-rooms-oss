<x-app-layout>
    <?php
        // Mock room data
        $rooms = [
            (object)[
                'id' => 1,
                'name' => 'Standart Jūrmala',
                'description' => 'Luxus numurs Jūrmalas nostūrī starp priedēm svaigā aromātā ar visām ekstrām!.',
                'image' => 'https://img.freepik.com/free-photo/luxury-bedroom-suite-resort-high-rise-hotel-with-working-table_105762-1783.jpg'
            ],
            (object)[
                'id' => 2,
                'name' => 'Standarta Room',
                'description' => 'vienkārša istaba ar vienkārši aispildāmām parastām ikdienas vajadzībām, lai pārakšņotu nakti un aizvestu draudzeni randiņā.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQiFNcdGHHYn0NPBZDvyEsuJudKVeU9lZj9Q&s'
            ],
            (object)[
                'id' => 3,
                'name' => 'Luxury  ',
                'description' => 'izstaba ceļotājiem, gūlta ledusskapis televizors viss ko vaig jaukai naktij!.',
                'image' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/233437993.jpg?k=9620dafa3a6744df697319b44e985271ab04dea9446be7c47bcfb52040f06c43&o=&hp=1'
            ]
        ];
    ?>

    <div class="py-6 md:py-12 bg-white text-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="p-4 text-orange-500 font-bold text-4xl md:text-7xl text-center" style="font-family: 'Arial', sans-serif;">
                Rooms
            </h1>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 md:gap-8 mt-6 md:mt-8">
                @foreach ($rooms as $room)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ $room->image }}" alt="Room Image" class="w-full h-64 object-cover">
                        <div class="p-4 md:p-6">
                            <h3 class="text-xl md:text-2xl font-bold text-orange-500 mb-2">{{ $room->name }}</h3>
                            <p class="text-gray-700 mb-4">{{ $room->description }}</p>
                            <a href="{{ route('user.room.show', $room->id) }}" class="inline-block bg-orange-500 text-white px-4 md:px-6 py-2 rounded-lg font-bold uppercase text-sm md:text-base transition-transform duration-200 transform hover:scale-105">
                                View Room
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
