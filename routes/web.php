<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');
Route::inertia('/pricing', 'Pricing');
Route::inertia('/login', 'Auth/Login');
Route::inertia('/Sign-up', 'Auth/Register');

