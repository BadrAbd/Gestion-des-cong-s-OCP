<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterimController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandeCongeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

// Public routes
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Guest-only routes (not accessible when logged in)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);
});

// Admin authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    // Home and basic pages
    Route::get('/', function () {
        return view('form');
    });
    
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    Route::get('/contact', function () {
        return view('pages.contact');
    });
    
    // Authentication
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Interim routes
    Route::get('/interim/create', [InterimController::class, 'create'])->name('interim.create');
    Route::post('/interim', [InterimController::class, 'store'])->name('interim.store');
    Route::get('/interim/{id}/pdf', [InterimController::class, 'generatePdf'])->name('interim.pdf');
    
    // Signature route
    Route::get('/signature/{path}', function ($path) {
        $filePath = 'signatures/' . $path;

        if (!Storage::disk('private')->exists($filePath)) {
            abort(404);
        }
        return response()->file(storage_path('app/private/' . $filePath));
    })->where('path', '.*')->name('signature.show');

    // Demande de congés routes
    Route::get('/demande-conges', [DemandeCongeController::class, 'index'])->name('demande-conges.index');
    Route::patch('/demande-conges/{demandeConge}/status', [DemandeCongeController::class, 'updateStatus'])->name('demande-conges.update-status');
});

// Admin routes (require authentication and admin role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // User management routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // Admin demandes routes
    Route::get('/demandes', [DemandeCongeController::class, 'index'])->name('demandes');
    Route::patch('/demandes/{demandeConge}/status', [DemandeCongeController::class, 'updateStatus'])->name('demandes.update-status');
});
