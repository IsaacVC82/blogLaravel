<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Página principal y blog
Route::get('/', [BlogController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
    });

