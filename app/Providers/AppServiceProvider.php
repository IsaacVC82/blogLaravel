<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Cargar las rutas de la API
        Route::prefix('api')
            ->middleware('api') // Middleware 'api'
            ->namespace('App\Http\Controllers\Api') // Namespace para los controladores de la API
            ->group(base_path('routes/api.php')); 
    }
}
