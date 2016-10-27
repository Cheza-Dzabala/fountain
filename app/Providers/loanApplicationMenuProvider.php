<?php

namespace App\Providers;

use App\loanTypes;
use Illuminate\Support\ServiceProvider;

class loanApplicationMenuProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loanApplicationMenu();
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

    private function loanApplicationMenu()
    {
        view()->composer('partials.global.headers.menus.loans&Services', function ($view) {
            $loanTypes = loanTypes::whereIsactive('1')->get();
            return $view->with('loanTypes', $loanTypes);
        });
    }


}
