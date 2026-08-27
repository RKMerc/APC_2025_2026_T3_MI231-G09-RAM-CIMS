<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'APPOINTMENT_ID';

    protected $fillable = [
        'PATIENT_NAME',
        'APPOINTMENT_TYPE',
        'APPOINTMENT_REASON',
        'ATTENDING_PHYSICIAN',
        'SCHEDULED_AT',
        'STATUS',
    ];
}