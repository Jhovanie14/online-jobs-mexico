<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
  
    Route::inertia('/', 'Home')->name('home');
    Route::inertia('/pricing', 'Pricing')->name('pricing');
    Route::inertia('/jobseeker/jobsearch', 'Jobs/JobListings');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/Sign-up', [AuthController::class, 'Register'])->name('register');


    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);

});

Route::middleware(['auth'])->group(function () {

    Route::inertia('/dashboard', 'Dashboard/Index')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout']);
   
});

Route::get('/{any}', function () {
    return inertia('NotFoundView'); // Ensure this corresponds with your Vue component
})->where('any', '.*'); // This matches any undefined route