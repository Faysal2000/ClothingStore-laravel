<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if ($request->user()) {
            if (in_array($request->user()->role, $roles)) {
                return $next($request);
            }
        } else {
            return redirect('/login'); // Burada helper kullanıyoruz
        }

        return abort(403, 'Unauthorized');
    }
}
