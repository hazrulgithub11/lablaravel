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
    Schema::create('timetables', function (Blueprint $table) {
        $table->increments('id'); // Primary key
        $table->unsignedInteger('user_id')->nullable(); // Foreign key to users table
        $table->unsignedInteger('subject_id')->nullable(); // Foreign key to subjects table
        $table->unsignedInteger('day_id')->nullable(); // Foreign key to days table
        $table->unsignedInteger('hall_id')->nullable(); // Foreign key to halls table
        $table->unsignedInteger('group_id')->nullable(); // Foreign key to groups table
        $table->string('time_from')->nullable(); // Start time
        $table->string('time_to')->nullable(); // End time
        $table->timestamps(); // Timestamps
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
