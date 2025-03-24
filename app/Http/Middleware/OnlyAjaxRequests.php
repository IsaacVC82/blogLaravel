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
        // Verificar si la solicitud es AJAX
        if (!$request->ajax()) {
            // Si no es una solicitud AJAX, devolver una respuesta JSON con un error 403
            return response()->json([
                'message' => 'Solo se permiten solicitudes AJAX',
            ], 403);
        }

        // Si es una solicitud AJAX, continuar con la solicitud
        return $next($request);
    }
}
