<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyAjaxRequests
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la solicitud es AJAX o tiene el header X-Requested-With
        if (!$request->ajax() && !$request->header('X-Requested-With')) {
            return response()->json([
                'message' => 'Solo se permiten solicitudes AJAX',
            ], 403);
        }

        return $next($request);
    }
}