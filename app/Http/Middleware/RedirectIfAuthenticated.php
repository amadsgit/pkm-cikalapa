<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {

            $user = Auth::user();

            if ($user->hasRole('administrator')) {
                return redirect()->route('dashboard.admin');
            }

            if ($user->hasRole('pegawai')) {
                return redirect('/dashboard/pegawai');
            }

            return redirect('/');
        }

        return $next($request);
    }
}

// namespace App\Http\Middleware;

// use App\Providers\RouteServiceProvider;
// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Response;

// class RedirectIfAuthenticated
// {
//     public function handle(Request $request, Closure $next, string ...$guards): Response
//     {
//         $guards = empty($guards) ? [null] : $guards;

//         foreach ($guards as $guard) {
//             if (Auth::guard($guard)->check()) {
//                 return redirect(RouteServiceProvider::HOME);
//             }
//         }

//         return $next($request);
//     }
// }
