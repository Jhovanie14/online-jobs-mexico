<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');
Route::inertia('/about', 'About', ['user' => 'mike']);
Route::inertia('/login', 'Auth/Login');

