<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::inertia('/', 'Home')->name('home');
    Route::inertia('/pricing', 'Pricing')->name('pricing');
    Route::inertia('/jobseeker/jobsearch', 'Jobs/JobListings');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);

 
});

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard/Index')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::fallback(function () {
    return inertia('NotFoundView');
});
