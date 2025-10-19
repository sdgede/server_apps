<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $user = Auth::user();
        $ip = $request->ip();
        $method = $request->method();
        $url = $request->fullUrl();
        $agent = $request->userAgent();

        $logData = [
            'ip' => $ip,
            'method' => $method,
            'url' => $url,
            'status' => $response->status(),
            'user_id' => $user?->id,
            'email' => $user?->email,
            'agent' => $agent,
        ];

        Log::channel('activity')->info('User Activity', $logData);

        return $response;
    }
}
