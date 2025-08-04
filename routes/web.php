<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClockInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clock', [ClockInController::class, 'index'])->name('clock.index');
    Route::get('/clock-in', [ClockInController::class, 'clockIn'])->name('clock.in');
    Route::get('/clock-out', [ClockInController::class, 'clockOut'])->name('clock.out');
    Route::get('/clock/hours', [ClockInController::class, 'getClockIn'])->name('clock.hours');
    

    Route::get('/staffs/hours', [StaffController::class, 'staffHours'])->name('staffs.hours');
    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs.index');
    Route::get('/staffs/data', [StaffController::class, 'getStaffs'])->name('staffs.data');
    Route::delete('/staffs/{id}', [StaffController::class, 'deleteStaffs'])->name('staffs.delete');

    
});

require __DIR__.'/auth.php';
