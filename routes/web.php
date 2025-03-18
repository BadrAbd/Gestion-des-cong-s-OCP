<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterimController;
use Illuminate\Support\Facades\Storage;

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

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// FAQ page
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

//InterimConrtoller
Route::get('/interim/create', [InterimController::class, 'create'])->name('interim.create');
Route::post('/interim', [InterimController::class, 'store'])->name('interim.store');
// Route pour générer le PDF d'une demande d'intérim
Route::get('/interim/{id}/pdf', [InterimController::class, 'generatePdf'])->name('interim.pdf');

Route::get('/signature/{path}', function ($path) {
    $filePath = 'signatures/' . $path;

    if (!Storage::disk('private')->exists($filePath)) {
        abort(404);
    }
    return response()->file(storage_path('app/private/' . $filePath));
})->where('path', '.*')->name('signature.show');
