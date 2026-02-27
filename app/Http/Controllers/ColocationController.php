<?php

namespace App\Http\Controllers;
use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Models\ColocMember;
use App\Models\Category;
use App\Models\Depense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ColocationController extends Controller
{

    public function colocations_destroy($id){
        $colocation = Colocation::findOrFail($id);
        $colocation->delete();
        return redirect()->route('home')->with('success', 'Colocation annulée avec succès.');
    }
    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'capacite' => 'nullable|integer',
        ]);
        $colocation = Colocation::where('name', $validatedData['name'])->first();
        if ($colocation) {
            return back()->with('error', 'Une colocation avec ce nom existe déjà.');
        }
        if ($validatedData) {
            Colocation::create($validatedData);
            $user = Auth::user();
            ColocMember::create([
                'role'=>'owner',
                'joined_at' => now(),
                'user_id' => $user->id,
                'colocation_id' => Colocation::latest()->first()->id,
            ]);
            return redirect()->route('Owner_dashboard');
        }
    }
}
