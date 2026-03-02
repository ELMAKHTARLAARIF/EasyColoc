<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
        if (Auth::user()->status === 'Baned') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account has been banned. Please contact support for more information.');
        }

        return $next($request);
    }
}