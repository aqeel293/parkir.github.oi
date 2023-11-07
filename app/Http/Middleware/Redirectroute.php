<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class redirectroute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Pengguna sudah login, arahkan ke halaman index sesuai email
            $user = Auth::user();
            $redirectRoute = $this->getRedirectRoute($user->email);

            return redirect()->route($redirectRoute);
        }

        return $next($request);
    }

    private function getRedirectRoute($email)
    {
        // Tentukan halaman tujuan berdasarkan email
        switch ($email) {
            case 'kolektor@gmail.com':
                return 'kolektor'; // Sesuaikan dengan nama route kolektor
            case 'bendahara@gmail.com':
                return 'bendahara'; // Sesuaikan dengan nama route bendahara
            default:
                return 'home'; // Atau halaman default lainnya
        }
    }
}
