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
        echo "Your payment will be " . number_format($amount, 2) . " a month, for " . $months . " months".'<br/>'.'<br/>';

        echo  'Schedule'.'<br/>'.'<br/>';

        $balance = $loanAmount;
        $interest = $balance * 0.10;
        $principle = $amount - $interest;


        $i = 0;
        while ($i < $months)
        {
            $curr = $i + 1;
            $total = $principle+$interest;
            echo 'In Month '. $curr.' Balance is '.number_format($balance, 2).
                ' Principle is '.number_format($principle, 2).' Interest Is '.number_format($interest, 2).'Paying a Total Of '.$total.'<br/>'.'<br/>';
            $balance = $balance - $principle;
            $interest = $balance * 0.10;
            $principle = $amount - $interest;
            $i++;
        }
    }

    public function loadPage()
    {
        return view('test');
    }
}
