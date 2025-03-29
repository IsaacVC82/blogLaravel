<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\TranslationController;
use App\Models\Post;
use App\Models\PostTranslation;

Route::middleware('ajax.only')->group(function () {
    // Rutas API
    Route::get('/posts', [ApiPostController::class, 'index']);
    Route::get('/posts/{slug}', [ApiPostController::class, 'show'])
        ->where('slug', '[a-z0-9-]+');
    
    // Rutas para traducciones
    Route::get('/translations', [TranslationController::class, 'index']);
    Route::get('/translations/{lang}', function ($lang) {
        return response()->json(PostTranslation::where('locale', $lang)->get());
    });
    
    Route::get('/posts/translated/{lang}', function ($lang) {
        return response()->json(
            Post::with(['translations' => fn($q) => $q->where('locale', $lang)])->get()
        );
    });
});

