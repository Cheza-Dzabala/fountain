<?php

namespace App\Providers;

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

            return $view->with('totalDisbursed', $totalDisbursed);
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
