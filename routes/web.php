<?php


// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TimeAllocationController;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Define the home route
Route::middleware(['auth'])->get('/home', function () {
    return view('home'); // Ensure that you have the home.blade.php view
})->name('home');

// Dashboard Route
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard'); // Ensure that you have the dashboard.blade.php view
})->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('coaches', CoachController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('games', GameController::class);
    Route::resource('time_allocations', TimeAllocationController::class);
});

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
