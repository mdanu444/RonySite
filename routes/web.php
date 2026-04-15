<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisaSearchController;
use App\Http\Controllers\CaptchaController;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ক্যাপচা ইমেজ দেখানোর রাউট
Route::get('/get-captcha', [CaptchaController::class, 'generate'])->name('captcha.generate');

// Public verify route
    Route::post('/verify', function (Request $request) {
        $profile = Visa::where('visa_number', $request->input('visa_number'))->first();

        $session_captcha_text = Session::get('captcha_text');
        $request_captcha_text = $request->input('captcha');

        // return response()->json(['Session_captcha_text' => $session_captcha_text, 'request_captcha_Text' => $request_captcha_text], 200);

        if ($session_captcha_text !== $request_captcha_text) {
            return response()->json(['error' => 'Invalid captcha'], 200);
        }

        $CAPTCHA_VALIDITY = $request_captcha_text === $session_captcha_text;

        if ($profile && $CAPTCHA_VALIDITY) {
            // // Format dates in response
            $profile->date_of_birth = $profile->date_of_birth->format('d.m.Y');
            $profile->visa_validity = $profile->visa_validity->format('d.m.Y');

            return response()->json($profile);
        } else {
            return response()->json(['error' => 'Visa not found'], 200);
        }
    });

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/asdfy585lkju8/login', [LoginController::class, 'create'])->name('login');
    Route::post('/asdfy585lkju8/login', [LoginController::class, 'store']);


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


