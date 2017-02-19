<?php

namespace App\Http\Controllers;

use App\armotizationSchedule;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        dd('Payment ID: '.$paymentId.' Loan ID:'.$loanId);
        $payment = armotizationSchedule::whereLoanid($loanId)->whereId($paymentId)->first();
        $payment->isSettled = 1;
        $payment->save();
        return redirect()->route('schedule');
    }
}
