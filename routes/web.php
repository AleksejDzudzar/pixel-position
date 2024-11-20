<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');



Route::get('/search', SearchController::class);
Route::get('tags/{tag:name}',TagController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('jobs.register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('jobs.register');

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

});
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
