<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [\App\Http\Controllers\IndexController::class, 'show'])->name('index');

// Route::get('/reservation', function () {
//     return view('booking');
// });
Route::get('/reservation', [\App\Http\Controllers\BookingController::class, 'show'])->name('booking.form');
Route::post('/reservation', [\App\Http\Controllers\BookingController::class, 'book'])->name('booking.form');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact.form');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.form');


Route::get('/annulation/{token}', [\App\Http\Controllers\CanceledController::class, 'show'])->name('canceled');
