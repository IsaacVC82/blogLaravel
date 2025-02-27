<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Definir rutas de la API
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

