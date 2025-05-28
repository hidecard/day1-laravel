<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('UserLogin')->with('error', 'Please login first.');
        }
        return $next($request);
    }
}
