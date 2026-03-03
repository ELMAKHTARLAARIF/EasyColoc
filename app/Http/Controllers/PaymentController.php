<?php

namespace App\Http\Controllers;

use App\Models\ColocMember;
use App\Models\Depense;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function markAsPaid($id)
    {
        $payment = Payment::where('depense_id', $id)
            ->where('payed_id', Auth::id())
            ->where('status', 'unpaid')
            ->first();

        if (!$payment) {
            return redirect()
                ->route('Owner_dashboard')
                ->with('error', 'Paiement introuvable ou déjà payé.');
        }

        $payment->update([
            'status' => 'paid'
        ]);

        $payer = ColocMember::where('user_id', Auth::id())->first();

        if ($payer) {
            $payer->solde -= $payment->amount;
            $payer->save();
        }

        $creator = ColocMember::where('user_id', $payment->depense->payer_id)->first();

        if ($creator) {
            $creator->solde += $payment->amount;
            $creator->save();
        }

        return redirect()
            ->route('Owner_dashboard')
            ->with('success', 'Dépense marquée comme payée.');
    }
}
