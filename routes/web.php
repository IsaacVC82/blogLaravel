<?php
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Rutas de Filament
Route::prefix('admin')->group(function () {

});

// Rutas del blog (frontend)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/{lang}/posts/{slug}', [PostController::class, 'show'])->where(['lang' => 'es|en']);


// Página de inicio
Route::get('/', function () {
    return view('welcome');
});




