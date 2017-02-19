<?php

namespace App\Http\Controllers;

use App\armotizationSchedule;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class amortizationController extends Controller
{
    //

    public function index($id)
    {
        $schedules = armotizationSchedule::whereLoanid($id)->orderBy('id', 'ASC')->get();

        return view('amortization.index', compact('schedules'));
    }

    public function markPaid($paymentId, $loanId)
    {
        $payment = armotizationSchedule::whereId($paymentId)->first();
        $payment->isSettled = 1;
        $payment->paymentLoggedBy = Auth::user()['id'];
        $payment->save();
        return redirect()->route('schedule', $loanId);
    }

    public function markDefaulted($paymentId, $loanId)
    {
        $payment = armotizationSchedule::whereId($paymentId)->first();
        $payment->isDefaulted = 1;
        $payment->save();
        return redirect()->route('schedule', $loanId);
    }
}
