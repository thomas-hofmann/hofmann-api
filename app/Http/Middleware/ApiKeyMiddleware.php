<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // API-Key aus Header oder Query holen
        $apiKey = $request->header('X-API-KEY') ?? $request->query('api_key');

        // Erster Pfadsegment, z.B. 'api'
        $firstSegment = $request->segment(1);
        $secondSegment = $request->segment(2);

        // Wir erwarten die Route so: /api/{group}/...
        // Also nehmen wir das zweite Segment als Gruppe
        $group = $firstSegment === 'api' ? $secondSegment : $firstSegment;

        if (!$group) {
            return response()->json(['message' => 'Route group not found'], 404);
        }

        // Hole erwarteten Key oder Keys aus config
        $expectedKeys = config("api_keys.$group");

        if (!$expectedKeys) {
            return response()->json(['message' => 'Unauthorized - no keys configured'], 401);
        }

        $clientName = null;

        // Prüfen: ist $expectedKeys ein Array (mehrere keys) oder ein String (ein key)
        if (is_array($expectedKeys)) {
            // Mehrere keys (z.B. 'data' Gruppe)
            // Prüfen, ob einer der Keys passt
            $clientName = array_search($apiKey, $expectedKeys, true);
            if ($clientName === false) {
                return response()->json(['message' => 'Unauthorized - invalid API key'], 401);
            }
        } else {
            // Ein einzelner Key
            if ($apiKey !== $expectedKeys) {
                return response()->json(['message' => 'Unauthorized - invalid API key'], 401);
            }
            $clientName = $group; // z.B. 'books'
        }

        // API Client Name für Controller als Request-Parameter setzen
        $request->merge(['api_client' => $apiKey]);

        return $next($request);
    }
}