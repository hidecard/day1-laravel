<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                return $next($request);
            }
            return redirect('/')->with('error', 'Unauthorized access!');
        }
        return redirect()->route('ShowAdminLogin')->with('error', 'Please login as admin first.');
    }
}
