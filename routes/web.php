<?php

use App\Http\Controllers\ApplicationManagementController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('/applications', [ApplicationsController::class, 'index'])->name(name: 'applications');

// Aplications Management
Route::get('/applications-management', [ApplicationManagementController::class, 'index'])->name(name: 'applications-management');
Route::post('/applications-management', [ApplicationManagementController::class, 'store'])->name(name: 'applications-management.store');
Route::put('/applications-management/{id}', [ApplicationManagementController::class, 'update'])->name(name: 'applications-management.update');
Route::delete('/applications-management/{id}', [ApplicationManagementController::class, 'destroy'])->name('applications-management.destroy');


