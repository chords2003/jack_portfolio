<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;

Route::get('/', JobController::class . '@index');
Route::get('/search', SearchController::class);//this is a single action controller. It has only one method, __invoke, which is called when the controller is invoked.
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('tags/{tag:name}', TagController::class);
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

//make a route for the job editing form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy')->middleware('auth');
Route::put('/jobs/{job}/hide', [JobController::class, 'hide'])->name('jobs.hide');
route::middleware('guest') ->group(function() {
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
    //make a route for the job posting form

    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth' );

