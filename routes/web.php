<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;

// Route utama (Landing Page)
Route::get('/', [LandingController::class, 'index'])->name('landing');



// Route group untuk admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

       Route::resource('students', StudentController::class);
});