<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelRoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authUser = Auth::user();

        if ($authUser->hasRole(['super-admin', 'category-manager','product-manager', 'order-manager', 'user-manager']))
        {
            return $next($request);
        }
        return redirect()->route('index');
    }
}
