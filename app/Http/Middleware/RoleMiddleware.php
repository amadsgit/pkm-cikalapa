<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (! auth()->check()) {
            abort(403);
        }

        foreach ($roles as $role) {
            if (auth()->user()->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403);
    }
}
