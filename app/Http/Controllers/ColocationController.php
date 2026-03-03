<?php

namespace App\Http\Controllers;
use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Models\ColocMember;
use App\Models\Category;
use App\Models\Depense;
use App\Models\User;
use App\Http\Requests\StoreColocationRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ColocationController extends Controller
{

    public function colocations_destroy($id){
        $colocation = Colocation::findOrFail($id);
        $colocation->delete();
        return redirect()->route('home')->with('success', 'Colocation annulée avec succès.');
    }
    public function create(StoreColocationRequest $request)
    {
        $validatedData = $request->validated(); 
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
