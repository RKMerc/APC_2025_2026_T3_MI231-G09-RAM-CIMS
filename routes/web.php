<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inventory', InventoryController::class)->only([
    'index', 'store', 'update'
]);

Route::post('/doctor-schedules', [AppointmentController::class, 'storeSchedule']);
Route::resource('appointments', AppointmentController::class);