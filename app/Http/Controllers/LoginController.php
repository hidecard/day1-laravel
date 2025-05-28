<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('frontend.login'); // Admin login view
    }

    public function login(Request $request)
    {
        $key = 'login.'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors(['email' => "Too many attempts. Try again in $seconds seconds."]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember'); // Handle "Remember Me" checkbox

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->is_admin === 1) {
                $request->session()->put('admin_id', Auth::user()->id);
                return redirect()->intended('backend/post')->with('success', 'Logged in as admin!');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('ShowAdminLogin')->with('error', 'Access denied. Admin privileges required.');
            }
        }

        RateLimiter::hit($key);
        return back()->withErrors([
            'email' => 'The email or password is incorrect.',
        ])->withInput();
    }
    public function showAdminRegister()
    {
        return view('frontend.admin-register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $key = 'register.' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors(['email' => "Too many attempts. Try again in $seconds seconds."]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1, // New user is an admin
        ]);

        RateLimiter::hit($key);

        return redirect()->route('backend.index')->with('success', 'Admin user created successfully!');
    }

}