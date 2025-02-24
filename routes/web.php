<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('form');
});

Route::post('/interim', function () {
    // Handle form submission here
    return redirect()->back()->with('success', 'Form submitted successfully!');
})->name('interim.store');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
});

// Authentication pages
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

// User profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');