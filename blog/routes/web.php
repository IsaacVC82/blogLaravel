<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/post/{id}', [BlogController::class, 'show']);
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// Configuración del panel de administración
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
    });

