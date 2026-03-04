<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    
    public function markPaid(Payment $payment){
        if ($payment->from_user_id !== Auth::id()) {
            abort(403);
        }

        $payment->update([
            'paid_at' => Carbon::now(),
        ]);

        return redirect()->route('expenses.index')->with('success', 'Payment marked as paid.');
    }
}
