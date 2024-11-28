<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $table = 'halls'; // Specify the table name

    protected $fillable = [
        'lecture_hall_name', // Add name column
        'lecture_hall_place', // Add part column
    ];
}
