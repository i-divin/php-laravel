<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

// Welcome Page
Route::get('/', [AuthenticationController::class, 'showWelcome']);

// Authentication Routes
Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthenticationController::class, 'registerHandler'])->name('register.post');

Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginHandler'])->name('login.post');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Home Page - Displays All Users
Route::get('/home', [AuthenticationController::class, 'allusers'])->name('home');

// User Management
Route::get('/update/{id}', [AuthenticationController::class, 'viewUpdate'])->name('update');
Route::put('/update/{id}', [AuthenticationController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [AuthenticationController::class, 'destroy'])->name('delete');


Route::get('/update/{id}', [AuthenticationController::class, 'viewUpdate'])->name('viewUpdate');
Route::put('/update/{id}', [AuthenticationController::class, 'update'])->name('update');


Route::get('/update/{id}', [AuthenticationController::class, 'viewUpdate'])->name('viewUpdate');
Route::put('/update/{id}', [AuthenticationController::class, 'update'])->name('update');
