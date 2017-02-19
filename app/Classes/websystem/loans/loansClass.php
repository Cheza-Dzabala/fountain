<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 9/27/16
 * Time: 12:38 PM
 */

namespace App\Classes\websystem\loans;


use App\applicationStatus;
use App\armotizationSchedule;
use App\Clients;
use App\disbursements;
use App\loanDetails;
use App\loans;
use App\loanSecurities;
use App\loanSecuritiesTypes;
use App\loanTypes;
use App\stateChanges;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class loansClass
{
    public function newLoan($schemeId)
    {
        $loanScheme = loanTypes::whereid($schemeId)->first();
        $securities = loanSecuritiesTypes::whereIsactive('1')->get();
        $clients = Clients::whereEmploymentstatus('1')->get();
        return view('loans.new', compact('loanScheme', 'securities', 'clients'));
    }

    public function saveNew(Request $request)
    {
        //dd($request);


        list($employerConsentForm, $securityDocument, $utilityBill, $payslip_1, $payslip_2) = $this->processFiles($request);

        //Process Files
        $loanId = $this->createLoan($request);

        //Process Images
        $this->processSecurityImages($request, $loanId);

        //Save Loan Details
        $this->createLoanDetails($request, $loanId, $utilityBill, $securityDocument, $payslip_1, $payslip_2, $employerConsentForm);

        return redirect()->route('loans.new', $request->loanType);

    }


    public function all()
    {
        $loans = loans::get();
        foreach ($loans as $loan)
        {
            $this->compileLoanData($loan);
        }

        return view('loans.index', compact('loans'));

    }


    public function viewPending($id)
    {
        $loan = loans::whereId($id)->first();
        $this->compileLoanData($loan);

        $applicationStatuses = applicationStatus::get();
        return view('loans.view', compact('loan', 'applicationStatuses'));

    }

    public function changeState(Request $request, $id)
    {
        $loan = loans::whereId($id)->first();
        $loanDetails = loanDetails::whereLoanapplicationid($id)->first();

        $loan->applicationStatusId = $request->applicationStatusId;
        $loanDetails->loanComments = $request->loanComments;

        $loan->save();
        $loanDetails->save();

        stateChanges::create([
            'loanId' => $id,
            'statusId' => $request->applicationStatusId,
            'moderatorId' => Auth::user()['id'],
            'moderatorComments' => $request->loanComments,
        ]);

        return redirect()->route('loans.index');
    }

    public function disburse(Request $request, $id)
    {
        $loan = loans::whereId($id)->first();
        $today = Carbon::today()->toDateString();
        $completion = Carbon::now()->addMonths($loan->loanRepaymentPeriod)->toDateString();


        //Armotization Schedule
        $this->amortization($id);


        $loan->disbursementDate = $today;
        $loan->expectedDateOfCompletion = $completion;

        $loan->isActive = 1;
        $loan->save();

        $disbursement = disbursements::create([
            'loanId' => $id,
            'disbursedAmount' => $request->disbursedAmount,
            'disbursedBy' => Auth::user()['id'],
            'chequeNumber' => $request->chequeNumber,
            'date' => $today,
        ]);

        return redirect()->route('loan.view', $id);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function processFiles(Request $request)
    {
        if (Input::hasFile('employerConsentForm')) {
            $extension = $request->employerConsentForm->extension();
            $employerConsentForm = str_random(30) . $request->clientId . '.' . $extension;
            if (Input::file('employerConsentForm')->move('uploads/loans/employerConsentForms/', $employerConsentForm)) {

            }
        }else{
            $employerConsentForm = null;
        }

        if (Input::hasFile('securityDocument')) {
            $extension = $request->securityDocument->extension();
            $securityDocument = str_random(30) . $request->clientId . '.' . $extension;
            if (Input::file('securityDocument')->move('uploads/loans/securityDocuments/', $securityDocument)) {
            }
        }

        if (Input::hasFile('utilityBill')) {
            $extension = $request->utilityBill->extension();
            $utilityBill = str_random(30) . $request->clientId . '.' . $extension;
            if (Input::file('utilityBill')->move('uploads/loans/utilityBills/', $utilityBill)) {

            }
        }

        if (Input::hasFile('payslip_1')) {
            $extension = $request->payslip_1->extension();
            $payslip_1 = str_random(30) . $request->clientId . '.' . $extension;
            if (Input::file('payslip_1')->move('uploads/loans/paySlips/', $payslip_1)) {

            }
        }

        if (Input::hasFile('payslip_2')) {
            $extension = $request->payslip_2->extension();
            $payslip_2 = str_random(30) . $request->clientId . '.' . $extension;
            if (Input::file('payslip_2')->move('uploads/loans/paySlips/', $payslip_2)) {
            }
        }
        return array($employerConsentForm, $securityDocument, $utilityBill, $payslip_1, $payslip_2);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function createLoan(Request $request)
    {
//Create The Loan

        $applicationStat = applicationStatus::whereName('Pending')->first();


        $loan = loans::create([
            'clientId' => $request->clientId,
            'loanType' => $request->loanType,
            'loanAmount' => $request->loanAmount,
            'loanRepaymentPeriod' => $request->loanRepaymentPeriod,
            'applicationStatusId' => $applicationStat->id,
            'recommendationNotes' => $request->recommendationNotes,
            'createdBy' => Auth::user()['id'],
            'recommendedBy' => Auth::user()['id'],
        ]);

        $loanId = $loan->id;
        return $loanId;
    }

    /**
     * @param Request $request
     * @param $loanId
     * @param $utilityBill
     * @param $securityDocument
     * @param $payslip_1
     * @param $payslip_2
     * @param $employerConsentForm
     */
    private function createLoanDetails(Request $request, $loanId, $utilityBill, $securityDocument, $payslip_1, $payslip_2, $employerConsentForm)
    {
        $loanDetails = loanDetails::create([
            'loanApplicationId' => $loanId,
            'loanComments' => 'Default Comment',
            'loanSecurityTypeId' => $request->loanSecurityTypeId,
            'loanSecurityValue' => $request->loanSecurityValue,
            'utilityBill' => $utilityBill,
            'securityDocument' => $securityDocument,
            'payslip_1' => $payslip_1,
            'payslip_2' => $payslip_2,
            'employerConsentForm' => $employerConsentForm
        ]);
    }

    /**
     * @param Request $request
     * @param $loanId
     */
    private function processSecurityImages(Request $request, $loanId)
    {
        if (isset($request->loanSecurities)) {

            $destinationPath = 'uploads/securities/' . $request->clientId . '/';
            if(!file_exists($destinationPath))
            {
                \File::makeDirectory($destinationPath, $mode = 0777, true);
            }

            foreach ($request->loanSecurities as $security) {
                $file = $security;
                $img = Image::make($file);
                $filename = str_random(32) . '.' . $file->getClientOriginalExtension();
                $client_save_path = $destinationPath . $filename;
                $img->save($client_save_path, 60);

                loanSecurities::create([
                    'loanId' => $loanId,
                    'securityImage' => $destinationPath.$filename
                ]);
            }
        }
    }

    /**
     * @param $loan
     */
    private function compileLoanData($loan)
    {
        $previousLoans = loans::whereId(!$loan->id)->count();
        $loan = array_add($loan, 'previousLoans', $previousLoans);

        $client = Clients::whereId($loan->clientId)->first();
        $loan = array_add($loan, 'firstName', $client->firstName);
        $loan = array_add($loan, 'lastName', $client->lastName);
        $loan = array_add($loan, 'clientImage', $client->clientImage);


        $security = loanDetails::whereLoanapplicationid($loan->id)->first();
        $loan = array_add($loan, 'securityValue', $security->loanSecurityValue);
        $loan = array_add($loan, 'utilityBill', $security->utilityBill);
        $loan = array_add($loan, 'securityDocument', $security->securityDocument);
        $loan = array_add($loan, 'payslip_1', $security->payslip_1);
        $loan = array_add($loan, 'payslip_2', $security->payslip_2);
        $loan = array_add($loan, 'employerConsentForm', $security->employerConsentForm);

        $securityType = loanSecuritiesTypes::whereId($security->loanSecurityTypeId)->first();
        $loan = array_add($loan, 'securityType', $securityType->name);

        $status = applicationStatus::whereId($loan->applicationStatusId)->first();
        $loan = array_add($loan, 'applicationStatus', $status->name);

        $loanTypeName = loanTypes::whereId($loan->loanType)->first();
        $loan = array_add($loan, 'loanTypeName', $loanTypeName->name);

        $loanCreator = User::whereId($loan->createdBy)->first();
        $loan = array_add($loan, 'author', $loanCreator->name);

        $securityImages = loanSecurities::whereLoanid($loan->id)->get();
         $i = 0;
        foreach ($securityImages as $image)
        {
            $loan = array_add($loan, 'securityImage_'.$i , $image->securityImage);
            $i ++;
        }

    }

    /**
     * @param $loanId
     */
    private function amortization($loanId)
    {
        $loan = loans::whereId($loanId)->first();
        $loanType = loanTypes::whereId($loan->loanType)->first();

        $loanAmount = $loan->loanAmount;
        $interestRate = $loanType->interestRate;
        $interestRate = $interestRate / 1200;
       // dd($interestRate);
        $months = $loan->loanRepaymentPeriod;

        function pmt($interestRate, $months, $loanAmount)
        {
           // dd($interestRate);
            return ($interestRate * -$loanAmount * pow((1 + $interestRate), $months) / (1 - pow((1 + $interestRate), $months)));
        }

        $amount = pmt($interestRate, $months, $loanAmount);
        echo "Your payment will be " . number_format($amount, 2) . " a month, for " . $months . " months".'<br/>'.'<br/>';

        echo  'Schedule'.'<br/>'.'<br/>';
       // dd($amount);
        $balance = $loanAmount;
      // dd($balance);
        $interest = $balance * $interestRate;
        //dd($interest);
        $principle = $amount - $interest;
        //dd($principle);
        $i = 1;
        $date = Carbon::now();

        while ($i <= $months) {
            $curr = $date->addMonths(1);
            $total = $principle + $interest;
            armotizationSchedule::create([
                'loanId' => $loanId,
                'settlementDate' => $curr,
                'principle' => $principle,
                'interest' => $interest,
                'isSettled' => '0',
                'balance' => $balance,
                'total' => $total
            ]);

            $balance = $balance - $principle;
            $interest = $balance * $interestRate;
            $principle = $amount - $interest;
            $i++;
            $date = $curr;
        }
    }

    /**
     * @param Request $request
     */

}