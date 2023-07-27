<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrStaffAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->user()->role)
        return $next($request);
        if(($request->user()->role!==User::getRoleAdmin()) && $request->user()->role!==User::getRoleStaff())
            throw new AuthenticationException('Unauthenticated.');
        return $next($request);
    }
}
