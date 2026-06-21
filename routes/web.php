<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestmentPlanController;
use App\Http\Controllers\DepositController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/plans', [InvestmentPlanController::class, 'index'])->name('plans.index');
    
    Route::resource('deposits', DepositController::class);
});

require __DIR__.'/auth.php';
