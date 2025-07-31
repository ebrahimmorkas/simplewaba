<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts');
    Route::get('/groups', [DashboardController::class, 'groups'])->name('groups');
    Route::post('/groups', [DashboardController::class, 'storeGroup'])->name('groups.store');
    Route::put('/groups/{id}', [DashboardController::class, 'updateGroup'])->name('groups.update');
    Route::delete('/groups/{id}', [DashboardController::class, 'deleteGroup'])->name('groups.delete');
    Route::get('/tags', [DashboardController::class, 'tags'])->name('tags');
});