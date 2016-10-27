<?php

namespace App\Http\Controllers;

use App\Classes\websystem\loans\loansClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class loansController extends Controller
{
    //
    public function newLoan($schemeId)
    {
        $loanSchemeClass = new loansClass();
        $schemeType = $loanSchemeClass->newLoan($schemeId);
        return $schemeType;
    }

    public function saveNew(Request $request)
    {
        $LoansClass = new loansClass();
        $saveNew = $LoansClass->saveNew($request);
        return $saveNew;
    }

    public function index()
    {
        $LoansClass = new loansClass();
        $all = $LoansClass->all();
        return $all;
    }

    public function view($id)
    {
        $LoansClass = new loansClass();
        $pending = $LoansClass->viewPending($id);
        return $pending;
    }

    public function changeState(Request $request, $id)
    {
        $LoansClass = new loansClass();
        $loan = $LoansClass->changeState($request, $id);
        return $loan;
    }
    public function disburse(Request $request, $id)
    {
        $LoansClass = new loansClass();
        $loan = $LoansClass->disburse($request, $id);
        return $loan;
    }
}
