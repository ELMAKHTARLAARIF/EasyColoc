<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user || $user->role->name !== 'admin') {
            return redirect()->route('home')
                ->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
        }
        return $next($request);
    }
}
