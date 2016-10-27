<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 9/27/16
 * Time: 11:29 AM
 */

namespace App\Classes\websystem\settings\loanTypes;


use App\Http\Requests\newLoanTypeRequest;
use App\loanTypes;
use Illuminate\Http\Request;

class loanTypeClass
{
    public function loanTypes()
    {
        $loanTypes = loanTypes::get();
        return view('settings.loans.index', compact('loanTypes'));
    }

    public function saveLoanType(newLoanTypeRequest $request)
    {

        $newLoanType = loanTypes::create([
            'name' => $request->name,
            'interestRate' => $request->interestRate,
            'isActive' => $request->isActive,
            'requiresEmployerConsent' => $request->requiresEmployerConsent,
            'description' => $request->description,
        ]);

        return redirect()->route('settings.loans.types');
    }

    public function deleteLoanType($id)
    {
        $loanType = loanTypes::whereId($id)->first();
        $loanType->delete();
        return redirect()->route('settings.loans.types');
    }

    public function editLoanType($name)
    {
        $loanType = loanTypes::whereName($name)->first();
        return view('settings.loans.editLoanType', compact('loanType'));
    }

    public function updateLoanType(Request $request, $id)
    {
        $input = $request->all();
        $loanType = loanTypes::whereId($id)->first();
        $loanType->fill($input);
        $loanType->save();
        return redirect()->route('settings.loans.types');
    }
}