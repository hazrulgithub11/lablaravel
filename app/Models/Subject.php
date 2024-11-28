<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects'; // Specify the table name

    protected $fillable = [
        'subject_code', // Add name column
        'subject_name',
        'lecturer_name',
    ];
}
