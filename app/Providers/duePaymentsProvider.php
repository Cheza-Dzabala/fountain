<?php

namespace App\Providers;

use App\armotizationSchedule;
use App\Clients;
use App\loans;
use App\loanTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ServiceProvider;

class duePaymentsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('payments.due', function ($view) {
            $startDate = Carbon::now();
            $endDate = $startDate->addMonths(1);

            $td = date('Y-m-d', strtotime($startDate->toDateString()));
            $ed = date('Y-m-d', strtotime($endDate->toDateString()));
          //  dd($ed);
            $payments = armotizationSchedule::whereIssettled(0)->get();
            //dd($payments);
            $duePayments = new Collection();
            foreach ($payments as $payment)
            {
                $point = date('Y-m-d', strtotime($payment->settlementDate));
                if (($point >= $td) && ($point <= $ed))
                {
                    $loan = loans::whereId($payment->loanId)->first();
                    $loanType = loanTypes::whereId($loan->loanType)->first();
                    $client = Clients::whereId($loan->clientId)->first();

                    $payment = array_add($payment, 'loanType', $loanType->name);
                    $payment = array_add($payment, 'loanAmount', $loan->loanAmount);
                    $payment = array_add($payment, 'disbursed', $loan->disbursementDate);
                    $payment = array_add($payment, 'completion', $loan->expectedDateOfCompletion);
                    $payment = array_add($payment, 'client', $client->firstName.' '.$client->lastName);


                   $duePayments->push($payment);
                }
            }
            // dd($duePayments);
            return $view->with('duePayments', $duePayments);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
