<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    public function run()
    {
        $hall_seed = [
            ['id' => '1', 'lecture_hall_name' => 'Hall A'],
            ['id' => '2', 'lecture_hall_name' => 'Hall B'],
            ['id' => '3', 'lecture_hall_name' => 'Hall C'],
            ['id' => '4', 'lecture_hall_name' => 'Hall D'],
            ['id' => '5', 'lecture_hall_name' => 'Hall E'],
        ];

        foreach ($hall_seed as $hall) {
            Hall::firstOrCreate($hall);
        }
    }
}
