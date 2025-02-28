<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectProfileComplete;
use App\Http\Controllers\SkillController;
use App\Http\Middleware\EnsureProfileCompleted;
use App\Http\Middleware\EnsureSkillsCompleted;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::inertia('sample', 'Sample');

    Route::inertia('/', 'Home')->name('home');
    Route::inertia('/pricing', 'Pricing')->name('pricing');
    Route::inertia('/jobseeker/jobsearch', 'Jobs/JobListings');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/email/verify', [AuthController::class, 'showVerificationNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])->middleware(['throttle:6,1'])->name('verification.send');

    // Route::inertia('/steps', 'Stepper/MultiSteps')->name('steps');
});

Route::middleware(['auth', 'verified', EnsureSkillsCompleted::class])->group(function () {
    Route::get('/steps', [SkillController::class, 'index'])->name('skills.index');

    Route::get('/jobseeker/info/{profile}', [ProfileController::class, 'profile'])->name('jobseeker.info');

    Route::get('/skills/search', [SkillController::class, 'search'])->name('skills.search');
    Route::post('/profile/store', [ProfileController::class, 'storeProfile'])->name('profile.storeProfile');

    Route::inertia('/dashboard', 'Dashboard/Index')->name('dashboard');
    Route::get('/summary', function () {
        return inertia('Stepper/Summary', [
            'profileId' => Auth::user()->profile->id,
        ]);
    })->name('profile.summary');
  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return inertia('NotFoundView');
});
