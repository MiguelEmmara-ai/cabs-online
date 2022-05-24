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
    return view('home', [
        'title' => 'Cabs Online | Book A Taxi Ride With Us Today!']);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About | Cabs Online']);
});

Route::resource('/booking', PassengerController::class);
Route::match(['get', 'post'], '/continue-booking', [PassengerController::class, 'continueBooking']);

Route::get('/cancel-booking', [PassengerController::class, 'cancelBooking']);

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
        'title' => 'Dashboard Admin | Cabs Online',
    ]);
})->middleware('auth');

Route::post('/admin/assign', [DriverController::class, 'assign'])
    ->middleware('auth');

Route::match(['get', 'post'], '/admin/assign-button', [DriverController::class, 'assignBtn'])
    ->middleware('auth');

Route::match(['get', 'post'], '/admin/search-button', [DriverController::class, 'searchBtn'])
    ->middleware('auth');

Route::get('/admin/all', [DriverController::class, 'showAll'])
    ->middleware('auth');

Route::get('/admin/recent', [DriverController::class, 'showRecent'])
    ->middleware('auth');

Route::get('/admin/avail', [DriverController::class, 'showAvail'])
    ->middleware('auth');
