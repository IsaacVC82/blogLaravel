<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\TranslationController;
use App\Models\Post;
use App\Models\PostTranslation;

// Función para verificar solicitudes AJAX
$onlyAjax = function (Request $request, Closure $next) {
    if (!$request->ajax()) {
        return response()->json([
            'message' => 'Solo se permiten solicitudes AJAX',
        ], 403);
    }

    return $next($request);
};

// Instanciar los controladores
$apiPostController = new ApiPostController();
$translationController = new TranslationController();

// Rutas de la API para los posts
Route::get('/posts', function (Request $request) use ($onlyAjax, $apiPostController) {
    return $onlyAjax($request, function ($request) use ($apiPostController) {
        return $apiPostController->index($request);
    });
});

Route::get('/posts/{slug}', function (Request $request, $slug) use ($onlyAjax, $apiPostController) {
    return $onlyAjax($request, function ($request) use ($apiPostController, $slug) {
        return $apiPostController->show($slug, $request);
    });
});

// Rutas para las traducciones
Route::get('/translations', function (Request $request) use ($onlyAjax, $translationController) {
    return $onlyAjax($request, function ($request) use ($translationController) {
        return $translationController->index($request);
    });
});

Route::get('/translations/{lang}', function (Request $request, $lang) use ($onlyAjax) {
    return $onlyAjax($request, function ($request) use ($lang) {
        return response()->json(
            PostTranslation::where('locale', $lang)->get()
        );
    });
});

// Rutas para obtener posts con traducciones
Route::get('/posts/translated/{lang}', function (Request $request, $lang) use ($onlyAjax) {
    return $onlyAjax($request, function ($request) use ($lang) {
        return response()->json(
            Post::with(['translations' => function ($query) use ($lang) {
                $query->where('locale', $lang);
            }])->get()
        );
    });
});



