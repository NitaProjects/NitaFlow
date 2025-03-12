<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            return redirect('/dashboard')->with('error', 'No tienes permisos para acceder.');
        }
        return $next($request);
    }
}