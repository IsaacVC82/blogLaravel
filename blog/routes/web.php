<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;

// Rutas de Filament
Route::prefix('admin')->group(function () {
});

// Rutas del blog (para el frontend)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Rutas de la API para posts (index y show por slug)
Route::prefix('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{slug}', [PostController::class, 'show']);
});

Route::get('/', function () {
    return view('welcome');
});




