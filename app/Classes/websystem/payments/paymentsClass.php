<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 11/9/16
 * Time: 12:37 PM
 */

namespace App\Classes\websystem\payments;


use App\armotizationSchedule;
use App\Clients;
use App\loans;
use App\loanTypes;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class paymentsClass
{
    public function duePayments()
    {
        $today = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addMonths(1)->toDateString();

        $payments = armotizationSchedule::getBefore($today)->getAfter($endDate)->get();


        foreach ($payments as $payment)
        {
            $loan = loans::whereId($payment->loanId)->first();
            $loanType = loanTypes::whereId($loan->loanType)->first();
            $client = Clients::whereId($loan->clientId)->first();
            $payment = array_add($payment, 'loanId', $loan->id);
            $payment = array_add($payment, 'completion', $loan->expectedDateOfCompleteion);
            $payment = array_add($payment, 'loanAmount', $loan->loanAmount);
            $payment = array_add($payment, 'loanType', $loanType->name);
            $payment = array_add($payment, 'disbursementDate', $loan->disbursementDate);
            $payment = array_add($payment, 'clientName', $client->firstName.' '.$client->lastName);
            $payment = array_add($payment, 'clientNumber', $client->primaryContactNumber);
        }

        return$payments;
    }

    public function save(\Illuminate\Http\Request $request)
    {
        //dd($request);
        $payment = armotizationSchedule::whereId($request->id)->first();
        $payment->settledOn = Carbon::now()->toDateString();
        $payment->paymentType = $request->paymentType;
        $payment->isSettled = 1;
        $payment->paymentLoggedBy = Auth::user()['id'];

        if ($request->paymentType == 'cheque')
        {
            $payment->chequeNumber = $request->chequeNumber;
        }
        $payment->receiptNumber = $request->receiptNumber;

        $payment->save();

        return redirect()->route('payments.due');
    }

    public function details($id)
    {
        $settlement = armotizationSchedule::whereId($id)->first();
        $loan = loans::whereId($settlement->loanId)->first();
        $client = Clients::whereId($loan->clientId)->first();
        $user = User::whereId($settlement->paymentLoggedBy)->first();
        return view('payments.details', compact('settlement', 'loan', 'client', 'user'));
    }

}