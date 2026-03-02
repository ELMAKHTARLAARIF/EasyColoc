<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as MailMessage;
use App\Models\Invitation;
use App\Models\Colocation;
use App\Models\ColocMember;
use Illuminate\Support\Str;

class ColocMemberController extends Controller
{
    public function invite(Request $request, $id)
    {
            $request->validate([
                'email' => 'required|email',
            ]);
        $inputEmail = $request->input('email');

        $colocation = Colocation::findOrFail($id);

        $invitation = Invitation::create([
            'email' => $inputEmail,
            'colocation_id' => $colocation->id,
            'status' => 'pending',
            'token' => Str::uuid(),
            'expires_at' => now()->addDays(7)
        ]);
        try {
            Mail::to($inputEmail)->send(new MailMessage($invitation, $colocation));
            return redirect()->back()->with('success', "Invitation sent to {$inputEmail} for colocation {$colocation->name}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Failed to send invitation: " . $e->getMessage());
        }
    }
    public function acceptInvitation($token){
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('home')->with('error', 'Invalid invitation token.');
        }

        if ($invitation->isExpired()) {
            return redirect()->route('home')->with('error', 'This invitation has expired.');
        }

        $user = User::where('email', $invitation->email)->first();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Please register first.');
        }

        $colocation = Colocation::find($invitation->colocation_id);
        if (!$colocation) {
            return redirect()->route('home')->with('error', 'Colocation not found for this invitation.');
        }
        if(ColocMember::where('user_id', $user->id)->where('colocation_id', $colocation->id)->exists()){
            return redirect()->route('Owner_dashboard')->with('error', 'You are already a member of this colocation.');
        }

        ColocMember::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'member',
            'joined_at' => now(),
        ]);

        $invitation->status = 'accepted';
        $invitation->save();

        return redirect()->route('login')->with('success', "You have successfully joined the colocation {$colocation->name}.");
    }

    public function join(Request $request)
    {
        $request->validate([
            'token' => 'required|uuid',
        ]);

        $token = $request->input('token');
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('home')->with('error', 'Invalid invitation token.');
        }

        if ($invitation->isExpired()) {
            return redirect()->route('home')->with('error', 'This invitation has expired.');
        }

        $user = User::where('email', $invitation->email)->first();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Please register first.');
        }

        $colocation = Colocation::find($invitation->colocation_id);
        if (!$colocation) {
            return redirect()->route('home')->with('error', 'Colocation not found for this invitation.');
        }
        if(ColocMember::where('user_id', $user->id)->where('colocation_id', $colocation->id)->exists()){
            return redirect()->route('Owner_dashboard')->with('error', 'You are already a member of this colocation.');
        }

        ColocMember::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'member',
            'joined_at' => now(),
        ]);

        $invitation->status = 'accepted';
        $invitation->save();

        return redirect()->route('Owner_dashboard')->with('success', "You have successfully joined the colocation {$colocation->name}.");
    }
}
