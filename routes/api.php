<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::post('/v1/inventory', [InventoryController::class, 'store']);
Route::put('/v1/inventory/{code}', [InventoryController::class, 'update']);