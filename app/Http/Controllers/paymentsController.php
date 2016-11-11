<?php

namespace App\Http\Controllers;

use App\Classes\websystem\payments\paymentsClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class paymentsController extends Controller
{
    //
    public function due()
    {
        $paymentClass = new paymentsClass();
        $payments = $paymentClass->duePayments();
        return view('payments.due', compact('payments'));
    }

    public function save(Request $request)
    {

        $paymentClass = new paymentsClass();
        $save = $paymentClass->save($request);
        return $save;
    }

    public function details($id)
    {
        $paymentClass = new paymentsClass();
        $settlement = $paymentClass->details($id);
        return $settlement;
    }
}
