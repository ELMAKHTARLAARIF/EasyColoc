<?php

namespace App\Http\Controllers;

use App\Models\ColocMember;
use App\Models\Depense;
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
        $invitations = $colocMember->colocation->invitations()->where('status', 'pending')->get();
        
        // Get only unpaid expenses for the current user
        $depenses = Depense::where('colocation_id', $colocMember->colocation_id)
            ->with(['category', 'payer', 'payments'])
            ->whereHas('payments', function($query) use ($user) {
                $query->where('payed_id', $user->id)
                      ->where('status', 'unpaid');
            })
            ->limit(5)
            ->get();
        
        return View('Owner.dashboard',compact('colocMember','ColocMembers', 'invitations', 'depenses',));
    }
}
