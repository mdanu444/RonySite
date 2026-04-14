<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisaSearchController;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Public verify route
    Route::post('/verify', function (Request $request) {
        $profile = Visa::where('visa_number', $request->input('visa_number'))->first();

        if ($profile) {

            // // Format dates in response
            $profile->date_of_birth = $profile->date_of_birth->format('d.m.Y');
            $profile->visa_validity = $profile->visa_validity->format('d.m.Y');

            return response()->json($profile);
        } else {
            return response()->json(['error' => 'Visa not found'], 404);
        }
    });

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);


});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    // Visa resource routes
    Route::resource('visas', VisaSearchController::class);
    Route::get('/visas/search', [VisaSearchController::class, 'search'])->name('visas.search');
});


