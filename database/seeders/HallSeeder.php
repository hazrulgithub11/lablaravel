<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    public function run()
    {
        $hall_seed = [
            ['id' => '1', 'lecture_hall_name' => 'Hall A', 'lecture_hall_place' => 'Building A'],
            ['id' => '2', 'lecture_hall_name' => 'Hall B', 'lecture_hall_place' => 'Building B'],
            ['id' => '3', 'lecture_hall_name' => 'Hall C', 'lecture_hall_place' => 'Building C'],
            ['id' => '4', 'lecture_hall_name' => 'Hall D', 'lecture_hall_place' => 'Building D'],
            ['id' => '5', 'lecture_hall_name' => 'Hall E', 'lecture_hall_place' => 'Building E'],
        ];

        foreach ($hall_seed as $hall) {
            Hall::firstOrCreate($hall);
        }
    }
}