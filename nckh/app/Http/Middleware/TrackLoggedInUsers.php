<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class TrackLoggedInUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            Cache::put('logged_in_users', Cache::get('logged_in_users', 0) + 1);
        }

        $response = $next($request);

        if (auth()->check() && !$request->session()->has('just_logged_out')) {
            Cache::put('logged_in_users', Cache::get('logged_in_users', 1) - 1);
        }

        return $response;
    }
}
