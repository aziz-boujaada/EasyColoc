<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function markPaid(Payment $payment){
         $payment->update([
        'paid_at' => Carbon::now(),
        'status' => 'paid'
    ]);

    return redirect()->route('expenses.index')->with('success','payment paied');
    }
}
