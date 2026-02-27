<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Services\AuthService;

class AuthController extends Controller
{

    public function store_user(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validatedData) {
            (new AuthService())->register($validatedData);
            return redirect()->route('home');
        }
    }
    public function CheckloginData(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $person = (new AuthService())->CheckloginData($credentials);

        switch ($person) {
            case 'admin':
                return redirect()->route('admin_dashboard');
            case 'owner':
                return redirect()->route('Owner_dashboard');
            case 'member':
                return redirect()->route('Owner_dashboard');
            case 'user':
                return redirect()->route('home');
            default:
                return back()->withErrors([
                    'login_error' => 'The provided credentials do not match our records.'
                ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
