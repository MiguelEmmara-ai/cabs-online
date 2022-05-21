<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RegisterController;
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
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('/booking', PassengerController::class);

// Route::get('/booking', function () {
//     return view('booking');
// });

// Route::resource('/register', RegisterController::class);

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', function () {
    return view('admin.index', [
        'title' => 'Dashboard Admin',
    ]);
})->middleware('auth');

Route::get('/admin/all', [DriverController::class, 'showAll'])
    ->middleware('auth');

Route::get('/admin/recent', [DriverController::class, 'showRecent'])
    ->middleware('auth');

Route::get('/admin/avail', [DriverController::class, 'showAvail'])
    ->middleware('auth');
