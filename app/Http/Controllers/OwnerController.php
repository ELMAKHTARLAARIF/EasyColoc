<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Models\ColocMember;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function showOwnerDashboard()
    {
        $user = Auth::user(); 
        $colocMember = ColocMember::with('colocation')->where('user_id', $user->id)->first();
        if (!$colocMember) {
            return redirect()->route('home')->with('error', 'Vous n\'êtes pas membre d\'une colocation.');
        }

        $ColocMembers = ColocMember::with('user')->where('colocation_id', $colocMember->colocation_id)->get();
        return View('Owner.dashboard',compact('colocMember','ColocMembers'));
    }
}
