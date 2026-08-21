<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::put('/update-profile', [\App\Http\Controllers\Api\DoctorController::class, 'updateProfile'])->middleware('auth:sanctum');
Route::get('/doctors', [\App\Http\Controllers\Api\DoctorController::class, 'index']);

Route::post('/availability', [\App\Http\Controllers\Api\AvailabilityController::class, 'store'])->middleware('auth:sanctum');
