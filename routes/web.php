<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::view('/', 'home');
Route::view('about', 'about');
Route::view('contact', 'contact');


// jobs routes
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}',  'show');
    Route::post('/jobs',  'store')->middleware('auth');
    Route::get('/jobs/{job}/edit',  'edit')->middleware('auth')->can('edit', 'job');
    Route::patch('/jobs/{job}',  'update')->middleware('auth');
    Route::delete('/jobs/{job}',  'destroy')->middleware('auth');
});


// auth routes
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);
