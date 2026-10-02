<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;

Route::get('/register', [registercontroller::class, 'index']);
Route::post('/register', [registercontroller::class, 'register']);
Route::get('/users', [registercontroller::class, 'users']);
Route::get('/user/{id}/edit', [registercontroller::class, 'edit']);
Route::put('/user/{id}', [registercontroller::class, 'update']);
Route::delete('/user/{id}', [registercontroller::class, 'delete']);



