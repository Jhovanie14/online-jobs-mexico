<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterEmployerController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\Employer\EmployerProfileController;
use App\Http\Controllers\Dashboard\Employer\JobPostingController;
use App\Http\Controllers\Dashboard\JobPostController;
use App\Http\Controllers\Dashboard\Jobseeker\JobSeekerProfileController;
use App\Http\Controllers\Dashboard\ListingController;
use App\Http\Controllers\Steps\JobSeekerController;
use App\Http\Controllers\Steps\SkillsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware('guest')->group(function () {
    // jobseeker
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    //employer
    Route::get('/register/employer', [RegisterEmployerController::class, 'create'])->name('register.createEmployer');
    Route::post('/register/employer', [RegisterEmployerController::class, 'store'])->name('register.storeEmployer');

    // login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');

    // Requesting a password
    Route::get('/forgot-password',[ResetPasswordController::class, 'requestPass'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetHandler'])->name('password.update');
    
    
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    // Email Verification
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('jobseeker/steps', [JobSeekerController::class, 'index'])->name('steps');
    Route::get('/skills/search', [SkillsController::class, 'search'])->name('skills.search');
    Route::post('/jobseeker/store', [JobSeekerController::class, 'store'])->name('steps.store');
});


Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/summary', function () {
        return inertia('Steps/Summary', [
            'profileId' => Auth::user()->jobseeker->id,
        ]);
    })->name('profile.summary');

    Route::get('/jobseeker/info/{profile}', [JobSeekerProfileController::class, 'profile'])->name('jobseeker.info');
    
    Route::get('/employer/settings', [EmployerProfileController::class, 'settings'])->name('employer.settings');

    Route::get('/skills/search', [JobPostingController::class, 'search'])->name('skills.search');
    Route::get('/employers/jobpost', [JobPostingController::class, 'create'])->name('employer.jobPost');
    Route::post('/job_postings', [JobPostingController::class, 'storeJob'])->name('job_postings.store');
    Route::get('/employer/jobs', [JobPostingController::class, 'show'])->name('jobs.show');

    Route::resource('listing', ListingController::class);
});

Route::get('/', function () {
    return Inertia::render('Home');
})->middleware('verified')->name('home');
