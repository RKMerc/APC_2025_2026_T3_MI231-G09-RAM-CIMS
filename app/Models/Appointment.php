<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments'; // Adjust if your table name differs
    protected $primaryKey = 'APPOINTMENT_ID';

    protected $fillable = [
        'PATIENT_ID',         // <--- Add this back
        'PATIENT_NAME',       // Keep if you still want to store the text name
        'APPOINTMENT_TYPE',
        'APPOINTMENT_REASON',
        'ATTENDING_PHYSICIAN',
        'SCHEDULED_AT',
        'STATUS',
    ];
}