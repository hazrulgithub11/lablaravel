<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Define list of places
        $places = [
            1 => 'Building A',
            2 => 'Building B',
            3 => 'Building C',
            4 => 'Building D',
            5 => 'Building E'
        ];

        // Update each hall with a place
        foreach ($places as $id => $place) {
            DB::table('halls')
                ->where('id', $id)
                ->update(['lecture_hall_place' => $place]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reset places to null
        DB::table('halls')
            ->update(['lecture_hall_place' => null]);
    }
};