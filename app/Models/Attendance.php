<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'parent_name',
        'time_in', 
        'time_out',
        'date',
        'rfid',
    ];
}
