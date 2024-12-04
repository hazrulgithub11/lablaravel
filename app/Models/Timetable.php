<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetables'; // Specify the table name

    protected $fillable = [
        'user_id', // Add name column
        'subject_id',
        'day_id',
        'hall_id',
        'group_id',
        'time_from',
        'time_to',
    ];

    public function hall(){
        return $this->belongsTo('App\Models\Hall', 'hall_id');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
