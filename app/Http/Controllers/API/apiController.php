<?php

namespace App\Http\Controllers\API;

use App\armotizationSchedule;
use App\Clients;
use App\Http\Controllers\Controller;
use App\loans;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class apiController extends Controller
{
    //
     public function chartData()
     {
        //Morris Chart
        //Get Disbursement Totals For The Year

        $janDisb = loans::getJan()->sum('loanAmount');
        $febDisb = loans::getFeb()->sum('loanAmount');
        $marDisb = loans::getMar()->sum('loanAmount');
        $aprDisb = loans::getApr()->sum('loanAmount');
        $mayDisb = loans::getMay()->sum('loanAmount');
        $junDisb = loans::getJun()->sum('loanAmount');
        $julDisb = loans::getJul()->sum('loanAmount');
        $augDisb = loans::getAug()->sum('loanAmount');
        $sepDisb = loans::getSep()->sum('loanAmount');
        $octDisb = loans::getOct()->sum('loanAmount');
        $novDisb = loans::getNov()->sum('loanAmount');
        $decDisb = loans::getDec()->sum('loanAmount');

        //Get Collections Totals For The Year

         $janColl = armotizationSchedule::isSettled()->getJan()->sum('total');
         $febColl = armotizationSchedule::isSettled()->getFeb()->sum('total');
         $marColl = armotizationSchedule::isSettled()->getMar()->sum('total');
         $aprColl = armotizationSchedule::isSettled()->getApr()->sum('total');
         $mayColl = armotizationSchedule::isSettled()->getMay()->sum('total');
         $junColl = armotizationSchedule::isSettled()->getJun()->sum('total');
         $julColl = armotizationSchedule::isSettled()->getJul()->sum('total');
         $augColl = armotizationSchedule::isSettled()->getAug()->sum('total');
         $sepColl = armotizationSchedule::isSettled()->getSep()->sum('total');
         $octColl = armotizationSchedule::isSettled()->getOct()->sum('total');
         $novColl = armotizationSchedule::isSettled()->getNov()->sum('total');
         $decColl = armotizationSchedule::isSettled()->getDec()->sum('total');

         $charData = collect(
              [$janColl,  $janDisb],
              [$febColl,  $febDisb],
              [$marColl,  $marDisb],
              [$aprColl,  $aprDisb],
              [$mayColl,  $mayDisb],
              [$junColl,  $junDisb],
              [$julColl,  $julColl],
              [$augColl,  $augDisb],
              [$sepColl,  $sepDisb],
              [$octColl,  $octDisb],
              [$novColl,  $novDisb],
              [$decColl,  $decDisb]
         );


         return json_encode($charData);

     }
}
