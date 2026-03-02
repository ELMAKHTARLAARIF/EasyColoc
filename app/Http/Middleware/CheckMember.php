<?php
namespace App\Http\Middleware;

use App\Models\ColocMember;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMember
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if(ColocMember::where('user_id', Auth::id())->doesntExist()) {
            return redirect()->route('home')->with('error', 'You must be a member or owner of a colocation to access this page.');
        }
        return $next($request);
    }
}