<?php

namespace App\Providers;

use App\applicationStatus;
use App\Clients;
use App\loans;
use App\loanTypes;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class dashboardProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.dashboard.applicationStatuses', function ($view) {
            $applications = loans::whereCreatedby(Auth::user()['id'])->take(20)->get();

            foreach ($applications as $application)
            {
                $user = User::whereId($application->createdBy)->first();
                $client = Clients::whereId($application->clientId)->first();
                $applicationStatus = applicationStatus::whereId($application->applicationStatusId)->first();
                $loanType = loanTypes::whereId($application->loanType)->first();
                $application = array_add($application, 'userName', $user->name);
                $application = array_add($application, 'clientFirstName', $client->firstName);
                $application = array_add($application, 'clientImage', $client->clientImage);
                $application = array_add($application, 'clientLastName', $client->lastName);
                $application = array_add($application, 'applicationStatus', $applicationStatus->name);
                $application = array_add($application, 'loanType', $loanType->name);
            }
            return $view->with('applications', $applications);
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
