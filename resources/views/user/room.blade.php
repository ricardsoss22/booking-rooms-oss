<x-app-layout>

    <?php 
        // Mock room data
        $rooms = [
            (object)[
                'id' => 1,
                'name' => 'Deluxe Jūrmala',
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
                'name' => 'Lētais   ',
                'description' => 'izstaba ceļotājiem, gūlta ledusskapis televizors viss ko vaig jaukai naktij!.',
                'image' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/233437993.jpg?k=9620dafa3a6744df697319b44e985271ab04dea9446be7c47bcfb52040f06c43&o=&hp=1'
            ],
            (object)[
                'id' => 4,
                'name' => 'Family Room',
                'description' => 'Lielā ģimenes telpa.',
                'image' => 'https://hips.hearstapps.com/hmg-prod/images/alexander-design-contemporary-family-room-1555952765.jpg'
            ],
            (object)[
                'id' => 5,
                'name' => 'Atpūtai ar draugiem',
                'description' => 'komfotabla vieta 3-5 draugiem, sašļiks svaigs gaiss un labs skats garantēts!.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUOsiYS7hMFGKjpwGca6GD8va-HWntCGV_xg&s'
            ],
            (object)[
                'id' => 6,
                'name' => 'Dubūltā Room',
                'description' => 'Istaba priekš ģimenes, īpaši, ja tev ir mazi bērni.',
                'image' => 'https://hips.hearstapps.com/hmg-prod/images/becca-casey-darien-ct-lo-15-64c018f8dce2b.jpeg?crop=0.7173469387755103xw:1xh;center,top&resize=640:*'
            ],
            (object)[
                'id' => 7,
                'name' => 'Twin Room',
                'description' => 'A room with two single beds, suitable for friends or siblings.',
                'image' => 'https://via.placeholder.com/600x400?text=Twin+Room'
            ],
            (object)[
                'id' => 8,
                'name' => 'Executive Suite',
                'description' => 'A spacious suite with a working area and additional amenities for business travelers.',
                'image' => 'https://via.placeholder.com/600x400?text=Executive+Suite'
            ],
            (object)[
                'id' => 9,
                'name' => 'Presidential Suite',
                'description' => 'A luxurious suite with top-notch amenities, perfect for VIPs.',
                'image' => 'https://via.placeholder.com/600x400?text=Presidential+Suite'
            ],
            (object)[
                'id' => 10,
                'name' => 'Junior Suite',
                'description' => 'A smaller suite with a cozy living area.',
                'image' => 'https://via.placeholder.com/600x400?text=Junior+Suite'
            ],
            (object)[
                'id' => 11,
                'name' => 'Honeymoon Suite',
                'description' => 'A romantic suite with special amenities for newlyweds.',
                'image' => 'https://via.placeholder.com/600x400?text=Honeymoon+Suite'
            ],
            (object)[
                'id' => 12,
                'name' => 'Penthouse Suite',
                'description' => 'A luxurious suite located on the top floor with a panoramic view of the city.',
                'image' => 'https://via.placeholder.com/600x400?text=Penthouse+Suite'
            ]
        ];
    ?>

    <div class="py-12 bg-white text-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="p-6 text-orange-500 font-bold text-7xl text-center" style="font-family: 'Arial', sans-serif;">
                Rooms
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                @foreach ($rooms as $room)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ $room->image }}" alt="Room Image" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-orange-500 mb-2">{{ $room->name }}</h3>
                            <p class="text-gray-700 mb-4">{{ $room->description }}</p>
                            <a href="/room/show/{{ $room->id }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-lg font-bold uppercase text-sm transition-transform duration-200 transform hover:scale-105">
                                View Room
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
