<?php

use Illuminate\Support\Facades\Route;

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