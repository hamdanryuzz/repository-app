<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user adalah User, izinkan akses ke case saja
        if (Auth::check() && Auth::user()->role_id === '2') {
            return $next($request);
        }

        // Jika Admin, lanjutkan karena Admin bisa akses semua
        if (Auth::check() && Auth::user()->role_id === '1') {
            return $next($request);
        }

        return redirect('/unauthorized');
    }
}
