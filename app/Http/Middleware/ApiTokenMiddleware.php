<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $expected = config('app.api_token');

        // In case of missing API token inside .env
        if (empty($expected)) {
            return response()->json(['error' => 'API token not configured'], 500);
        }

        // Use a timing-attack-safe comparison and normalize to strings.
        if (!hash_equals((string) $expected, (string) $token)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
