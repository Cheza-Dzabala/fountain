<?php

namespace App\Providers;

use App\armotizationSchedule;
use App\disbursements;
use Illuminate\Support\ServiceProvider;

class dashboardTilesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //
        view()->composer('partials.dashboard.dashboardTiles', function ($view) {
            $totalDisbursed = disbursements::sum('disbursedAmount');
            $totalCollected = armotizationSchedule::whereIssettled(1)->sum('total');

            return $view->with(['totalDisbursed' => $totalDisbursed, 'totalCollected' => $totalCollected]);
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
