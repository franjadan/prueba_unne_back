<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Registra la información de la petición
        \Log::channel('api_requests')->info("Request received: " . $request->fullUrl());
        \Log::channel('api_requests')->info("HTTP Method: " . $request->method());
        \Log::channel('api_requests')->info("IP Address: " . $request->ip());
        // Registra el código de respuesta
        \Log::channel('api_requests')->info("Response Status Code: " . $response->status());

        // Verifica si el código de respuesta está entre 400 y 500
        if ($response->status() >= 400 && $response->status() <= 500) {
            // Registra el detalle del error
            \Log::channel('api_requests')->error("Error Response: " . $response->getContent());
        }

        return $response;
    }
}
