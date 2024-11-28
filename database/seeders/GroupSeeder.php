<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group_seed = [
            ['name' => 'Group A', 'part' => 'Part 1'],
            ['name' => 'Group B', 'part' => 'Part 2'],
            ['name' => 'Group C', 'part' => 'Part 3'],
            ['name' => 'Group D', 'part' => 'Part 4'],
        ];

        foreach ($group_seed as $group) {
            Group::firstOrCreate($group);
        }
    }
}
