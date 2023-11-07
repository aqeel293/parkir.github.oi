<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Oten
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adaPrivilege = false;

        // Check if the header 'x-bbsso-sus-usr' exists in the request
        if ($request->hasHeader('x-bbsso-sus-usr')) {
            $user = $request->header('x-bbsso-sus-usr');           

            $matchingUser = User::where('email', $user)->first();

            if ($matchingUser) {
                $adaPrivilege = true;
            }
        }

        if ($adaPrivilege) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Unauthorized'], 461);
        }
    }
}
