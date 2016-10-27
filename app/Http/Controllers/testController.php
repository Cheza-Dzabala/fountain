<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class testController extends Controller
{
    //
    public function test (Request $request)
    {
        $loanAmount = $request->loanAmount;
        $months = $request->months;
        $interest = $request->interest;



        function pmt($interest, $months, $loanAmount)
        {
            $interest = $interest / 1200;
            return ($interest * -$loanAmount * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months)));

        }

        $amount = pmt($interest, $months, $loanAmount);
        echo "Your payment will be " . number_format($amount, 2) . " a month, for " . $months . " months".'<br/>';

        echo  'Schedule'.'<br/>';


    }

    public function loadPage()
    {
        return view('test');
    }
}
