<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'home']);
Route::post('/', [TaskController::class, 'store']);
Route::post('/delete', [TaskController::class, 'delete']);
Route::get('/edit', [TaskController::class, 'getEdit']);
Route::post('/edit', [TaskController::class, 'postEdit']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/profile', function () {
    return view('profile');
});