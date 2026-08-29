<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inventory', InventoryController::class)->only([
    'index', 'store', 'update'
]);

Route::post('/doctor-schedules', [AppointmentController::class, 'storeSchedule']);
Route::resource('appointments', AppointmentController::class);

Route::get('/medical-records', [MedicalRecordController::class, 'index']);
Route::post('/medical-records', [MedicalRecordController::class, 'store']);
Route::delete('/medical-records/{id}', [MedicalRecordController::class, 'destroy']);