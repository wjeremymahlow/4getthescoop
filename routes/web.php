<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CateringRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/api/calendar/availability', [CalendarController::class, 'availability']);

// Catering request routes
Route::get('/request-catering', [CateringRequestController::class, 'create'])->name('catering.create');
Route::post('/request-catering', [CateringRequestController::class, 'store'])->middleware('auth')->name('catering.store');
Route::get('/request-catering/success', [CateringRequestController::class, 'success'])->middleware('auth')->name('catering.success');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-requests', [DashboardController::class, 'requests'])->name('my-requests');
    Route::patch('/requests/{cateringRequest}/cancel', [DashboardController::class, 'cancelRequest'])->name('requests.cancel');

    // Profile (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
