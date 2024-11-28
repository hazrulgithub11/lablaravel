<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('halls', function (Blueprint $table) {
        $table->increments('id'); // Primary key
        $table->string('lecture_hall_name'); // Lecture hall name column
        $table->string('lecture_hall_place')->nullable(); // Lecture hall place column
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
