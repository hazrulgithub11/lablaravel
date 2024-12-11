<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Clear all existing records
        DB::table('subjects')->truncate();

        $subject_seed = [
            [
                'subject_code' => 'MTH101',
                'subject_name' => 'Mathematics',
                'lecturer_name' => 'Dr. John Smith'
            ],
            [
                'subject_code' => 'PHY101',
                'subject_name' => 'Physics',
                'lecturer_name' => 'Prof. Sarah Johnson'
            ],
            [
                'subject_code' => 'CHM101',
                'subject_name' => 'Chemistry',
                'lecturer_name' => 'Dr. Michael Brown'
            ],
            [
                'subject_code' => 'BIO101',
                'subject_name' => 'Biology',
                'lecturer_name' => 'Dr. Emily Wilson'
            ],
            [
                'subject_code' => 'ENG101',
                'subject_name' => 'English',
                'lecturer_name' => 'Prof. David Miller'
            ],
        ];

        foreach ($subject_seed as $subject) {
            Subject::create($subject);
        }

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}