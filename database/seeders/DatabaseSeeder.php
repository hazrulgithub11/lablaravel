<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DaySeeder::class,
            GroupSeeder::class,
            SubjectSeeder::class,
            HallSeeder::class,
        ]);
    }
}
