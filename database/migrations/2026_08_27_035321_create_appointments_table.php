<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('APPOINTMENT_ID');
            $table->string('PATIENT_NAME');
            $table->string('APPOINTMENT_TYPE'); // e.g., Consultation, Dental Checkup, Emergency
            $table->text('APPOINTMENT_REASON');
            $table->string('ATTENDING_PHYSICIAN'); // Doctor / Clinic Staff in attendance
            $table->dateTime('SCHEDULED_AT');
            $table->string('STATUS')->default('Scheduled'); // Scheduled, Completed, Cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};