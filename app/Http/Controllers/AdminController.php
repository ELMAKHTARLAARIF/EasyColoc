<?php

namespace App\Http\Controllers;

use App\Models\ColocMember;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    public function show()
    {
        $users = User::all();
        return view('Admin.Dashboard', ['users' => $users]);
    }
    public function user_ban($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->status = 'Baned';
            $user->save();
            return back()->with('success', $user->status ? 'User banned.' : 'User unbanned.');
        }
    }
    public function user_debanir($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->status = 'Not Baned';
            $user->save();
            return back()->with('success', $user->status ? 'User banned.' : 'User unbanned.');
        }
    }
}
