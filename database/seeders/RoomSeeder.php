<?php

namespace Database\Seeders;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rooms::create([
            'quantity' => 20,
            'name' => 'Standart',
            'description' => 'At 21 square meters, the Aerostars Standard Rooms are relatively compact, but space is maximized using carefully selected furniture and fittings. Decorated in a simple traditional style with fabrics in classic colours, Standard Rooms have either one king-size bed or two twin beds, with other furniture including writing desk with chair, armchair, and large wardrobe.',
            'image' => 'images/1717840768.jpg',
            'price' => 50
        ]);

        Rooms::create([
            'quantity' => 15,
            'name' => 'Deluxe',
            'description' => 'With more space than our classic offerings, the delux is upgraded and ideally located within the hotel.',
            'image' => 'images/1717840975.png',
            'price' => 80
        ]);

        Rooms::create([
            'quantity' => 10,
            'name' => 'luxury',
            'description' => 'The high-end luxury room biggest one- and two-bedrooms, with layouts that feel spacious and grand.',
            'image' => 'images/1717841060.jpg',
            'price' => 120
        ]);
    }
}
