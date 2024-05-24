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

route::middleware('guest') ->group(function() {
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
    //make a route for the job posting form

    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth' );

