<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ColocMember;
use App\Models\Depense;
use App\Models\User;

class DepenseController extends Controller
{
    public function show(Request $request)
    {
        $colocMember = ColocMember::with('colocation')->where('user_id', Auth::id())->first();
        if (!$colocMember) {
            return redirect()->route('home')->with('error', 'Your are not a member of any colocation.');
        }
        $members = ColocMember::with('User')->where('colocation_id',$colocMember->colocation_id)->get();
        $depenses = $colocMember->colocation->depenses()->with('category', 'payer')->get();
        $toalDepenses = $depenses->sum('amount');

        return view('Owner.depenses', compact('depenses', 'toalDepenses','members'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payer_id' => 'required|integer',
            'colocation_id' => 'required|integer',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $category = Category::firstOrCreate([
            'name' => $validatedData['category'],
            'colocation_id' => $validatedData['colocation_id'],
        ]);

        Depense::create([
            'name' => $validatedData['name'],
            'amount' => $validatedData['amount'],
            'payer_id' => $validatedData['payer_id'],
            'category_id' => $category->id,
            'created_at' => $validatedData['date'],
            'colocation_id' => $validatedData['colocation_id'],
        ]);

        return redirect()->route('Owner_dashboard')->with('success', 'Dépense ajoutée avec succès.');
    }
    public function update($id)
    {
        $depense = Depense::findOrFail($id);
        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);
        $depense->name = $validatedData['title'];
        $depense->amount = $validatedData['amount'];
        $category = Category::firstOrCreate([
            'name' => $validatedData['category'],
            'colocation_id' => $depense->colocation_id,
        ]);
        $depense->category_id = $category->id;
        $depense->save();
        return redirect()->route('depenses')->with('success', 'Dépense mise à jour avec succès.');  
    }
    public function destroy($id)
    {
        $depense = Depense::findOrFail($id);
        $colocMember = ColocMember::where('user_id', Auth::id())->first();
        if (!$colocMember || $colocMember->colocation_id !== $depense->colocation_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this expense.');
        }
        $depense->delete();
        return redirect()->route('depenses')->with('success', 'Dépense supprimée avec succès.');
    }
}
