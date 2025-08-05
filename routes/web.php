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
    Route::post('/contacts', [DashboardController::class, 'storeContact'])->name('contacts.store');
    Route::post('/contacts/{id}', [DashboardController::class, 'updateContact'])->name('contacts.update');
    Route::post('/contacts/delete/{id}', [DashboardController::class, 'deleteContact'])->name('contacts.delete');
    Route::get('/groups', [DashboardController::class, 'groups'])->name('groups');
    Route::post('/groups', [DashboardController::class, 'storeGroup'])->name('groups.store');
    Route::post('/groups/{id}', [DashboardController::class, 'updateGroup'])->name('groups.update');
    Route::post('/groups/delete/{id}', [DashboardController::class, 'deleteGroup'])->name('groups.delete');
    Route::get('/tags', [DashboardController::class, 'tags'])->name('tags');
    Route::post('/tags', [DashboardController::class, 'storeTag'])->name('tags.store');
    Route::post('/tags/{id}', [DashboardController::class, 'updateTag'])->name('tags.update');
    Route::post('/tags/delete/{id}', [DashboardController::class, 'deleteTag'])->name('tags.delete');
    Route::get('/templates', [DashboardController::class, 'templates'])->name('templates');
    Route::post('/templates/refresh', [DashboardController::class, 'refreshTemplates'])->name('templates.refresh');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
});