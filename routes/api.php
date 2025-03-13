<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\TranslationController;
use App\Models\Post;
use App\Models\PostTranslation;

// Rutas de la API para los posts
Route::get('/posts', [ApiPostController::class, 'index']); 
Route::get('/posts/{slug}', [ApiPostController::class, 'show']); 

// Rutas para las traducciones
Route::get('/translations', [TranslationController::class, 'index']);
Route::get('/translations/{lang}', function ($lang) {
    return response()->json(
        PostTranslation::where('locale', $lang)->get()
    );
});

// Rutas para obtener posts con traducciones
Route::get('/posts/translated/{lang}', function ($lang) {
    return response()->json(
        Post::with(['translations' => function ($query) use ($lang) {
            $query->where('locale', $lang);
        }])->get()
    );
});




