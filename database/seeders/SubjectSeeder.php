<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subject_seed = [
            ['id' => '1', 'subject_name' => 'Mathematics'],
            ['id' => '2', 'subject_name' => 'Physics'],
            ['id' => '3', 'subject_name' => 'Chemistry'],
            ['id' => '4', 'subject_name' => 'Biology'],
            ['id' => '5', 'subject_name' => 'English'],
        ];

        foreach ($subject_seed as $subject) {
            Subject::firstOrCreate($subject);
        }
    }
}
