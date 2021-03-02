<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/api', function () {
    return "ok";
});

Route::get('/api/reservation', function () {
    return "book";
});

// Route::post('/api/reservation', [\App\Http\Controllers\Api\BookingController::class, 'book'])->name('booking.form');

Route::get('/api/contact', function () {
    return "send";
});

// Route::post('/api/contact', [\App\Http\Controllers\Api\ContactController::class, 'send'])->name('contact.form');


Route::get('/api/reservation/annulation/{token}', function () {
    return "canceled";
});

// Route::post('/api/reservation/annulation/{token}', [\App\Http\Controllers\Api\CanceledController::class, 'delete'])->name('canceled');
