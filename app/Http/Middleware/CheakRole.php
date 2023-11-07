<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheakRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Check if the user is authenticated and has the correct role
        if ($user && in_array($user->email, $roles)) {
            return $next($request);
        }

        // If the user is not authenticated or has the wrong role, redirect to a different page or show an error
        return response()->json(['message' => 'Unauthorized'], 461);
    }
}
