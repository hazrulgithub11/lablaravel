<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $day_seed = [
            ['id' => '1', 'day_name' => 'Monday'],
            ['id' => '2', 'day_name' => 'Tuesday'],
            ['id' => '3', 'day_name' => 'Wednesday'],
            ['id' => '4', 'day_name' => 'Thursday'],
            ['id' => '5', 'day_name' => 'Friday'],
            ['id' => '6', 'day_name' => 'Saturday'],
            ['id' => '7', 'day_name' => 'Sunday'],
        ];

        foreach ($day_seed as $day) {
            Day::firstOrCreate($day);
        }
    }
}