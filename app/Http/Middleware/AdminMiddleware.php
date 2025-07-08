<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'Vous devez être administrateur pour accéder à cette page.');
        }

        return $next($request);
    }
} 