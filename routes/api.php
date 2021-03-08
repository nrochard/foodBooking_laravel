<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/infos', [\App\Http\Controllers\Api\InformationsController::class, 'index']);

Route::post('/reservation', [\App\Http\Controllers\Api\BookingController::class, 'book']);

Route::post('/reservation/annulation/{token}', [\App\Http\Controllers\Api\BookingController::class, 'cancel']);