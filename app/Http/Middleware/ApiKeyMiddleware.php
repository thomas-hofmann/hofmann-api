<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-API-KEY') ?? $request->query('api_key');

        $route = $request->route();
        if (!$route) {
            return response()->json(['message' => 'Route not found'], 404);
        }

        $group = $request->segment(1); // z. B. 'books' oder 'cars'

        $expectedKey = config("api_keys.$group");

        if (!$expectedKey || $apiKey !== $expectedKey) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}