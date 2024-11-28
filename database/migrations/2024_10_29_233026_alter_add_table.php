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
    Schema::table('users', function (Blueprint $table) {
        $table->string('age')->nullable()->after('name'); // Add 'age' column after 'name'
    });

    Schema::table('subjects', function (Blueprint $table) {
        $table->string('lecturer_name')->nullable()->after('subject_name'); // Add 'lecturer_name'
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
