<?php

use App\Http\Controllers\CalculationController;
use App\Models\Activity;
use App\Models\Calculation;
use Illuminate\Support\Facades\Route;

// Home Page (accessible to all users)
Route::get('/', function () {
    $activities = Activity::all();
    return view('welcome', compact('activities'));
})->name('home');

// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Calculation Routes (accessible to all users)
Route::get('/calculate', [CalculationController::class, 'create'])->name('calculations.create');
Route::post('/calculate', [CalculationController::class, 'store'])
    ->name('calculations.store')
    ->middleware('web');

// Dashboard (now public)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'calculations' => Calculation::latest()->take(5)->get(),
        'count' => Calculation::count()
    ]);
})->name('dashboard');

// Calculation Management (now public)
Route::get('/calculations', [CalculationController::class, 'index'])->name('calculations.index');
Route::get('/calculations/{calculation}', [CalculationController::class, 'show'])->name('calculations.show');
Route::delete('/calculations/{calculation}', [CalculationController::class, 'destroy'])->name('calculations.destroy');
