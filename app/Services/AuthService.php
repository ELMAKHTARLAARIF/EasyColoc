<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\ColocMember;

class AuthService
{
    public function register(array $data)
    {
        $role = Role::firstOrCreate(['name' => 'user']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $role->id
        ]);

        if ($user) {
            Auth::login($user);
        } else {
            return back()->withErrors([
                'register_error' => 'Registration failed. Please try again.'
            ]);
        }
    }
    public function CheckloginData(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        session()->regenerate();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return 'admin';
        }

        $colocMember = ColocMember::where('user_id', $user->id)->first();

        if ($colocMember) {
            if ($colocMember->role === 'owner' && $user->status==='Not Baned') 
                return 'member';
        }
        return 'user';
    }
}
