<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 9/28/16
 * Time: 8:51 AM
 */

namespace App\Classes\websystem\settings\loanSecurities;


use App\Http\Requests\newLoanSecurities;
use App\loanSecuritiesTypes;
use Illuminate\Http\Request;

class loanSecurityClass
{
    public function loanSecurity()
    {
        $securities = loanSecuritiesTypes::get();
        return view('settings.loans.securities', compact('securities'));
    }

    public function saveNew(newLoanSecurities $request)
    {
        loanSecuritiesTypes::create([
            'name' => $request->name,
            'isActive' => $request->isActive,
        ]);

        return redirect()->route('settings.loanSecurity');
    }

    public function deleteSecurity($id)
    {
        $security = loanSecuritiesTypes::whereId($id)->first();
        $security->delete();
        return redirect()->route('settings.loanSecurity');
    }

    public function editSecurity($name)
    {
        $security = loanSecuritiesTypes::whereName($name)->first();
        return view('settings.loans.security.edit', compact('security'));
    }

    public function updateSecurity(Request $request, $id)
    {
        $input = $request->all();
        $security = loanSecuritiesTypes::whereId($id)->first();
        $security->fill($input);
        $security->save();
        return redirect()->route('settings.loanSecurity');
    }


}