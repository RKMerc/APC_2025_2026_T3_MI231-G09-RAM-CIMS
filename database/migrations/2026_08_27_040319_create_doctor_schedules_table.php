<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('DOCTOR_NAME');
            $table->date('AVAILABLE_DATE');
            $table->time('START_TIME')->default('08:00:00');
            $table->time('END_TIME')->default('17:00:00');
            $table->string('NOTES')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_schedules');
    }
};