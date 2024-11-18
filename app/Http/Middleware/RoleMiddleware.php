<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        // Periksa role user
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Redirect jika role tidak sesuai
        return redirect()->intended('/')->with('error', 'Anda tidak memiliki akses.');
    }
}
