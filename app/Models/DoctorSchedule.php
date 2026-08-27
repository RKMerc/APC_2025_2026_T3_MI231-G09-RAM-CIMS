<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'DOCTOR_NAME',
        'AVAILABLE_DATE',
        'START_TIME',
        'END_TIME',
        'NOTES',
    ];
}