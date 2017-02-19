<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();



Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/users/new',
        [
            'as' => 'users.new',
            'uses' => 'usersController@newUser'
        ]
    );

    Route::post('/users/save',
        [
            'as' => 'users.save',
            'uses' => 'usersController@saveUser'
        ]
    );

    Route::get('/dashboard',
        [
            'as' => 'dashboard',
            'uses' => 'dashboardController@index'
        ]
    );

    Route::get('/clients',
        [
            'as' => 'clients',
            'uses' => 'clientsController@index'
        ]
    );


    Route::get('/clients/new',
        [
            'as' => 'clients.new',
            'uses' => 'clientsController@newClient'
        ]
    );

    Route::post('clients/save',
        [
            'as' => 'clients.save',
            'uses' => 'clientsController@saveClient'
        ]
    );

    Route::get('/clients/{id}',
        [
            'as' => 'client.view',
            'uses' => 'clientsController@viewClient'
        ]
    );

    Route::get('/employers',
        [
            'as' => 'employers',
            'uses' => 'employerController@index'
        ]
    );

    Route::get('/employers/new',
        [
            'as' => 'employer.new',
            'uses' => 'employerController@newEmployer'
        ]
    );

    Route::post('employers/new',
        [
            'as' => 'employer.save',
            'uses' => 'employerController@saveNew'
        ]
    );

    Route::get('employer/delete/{id}',
        [
            'as' => 'employer.delete',
            'uses' => 'employerController@deleteEmployer'
        ]
    );

    Route::get('employer/{name}',
        [
            'as' => 'employer.view',
            'uses' => 'employerController@viewEmployer'
        ]
    );

    Route::get('employer/edit/{name}',
        [
            'as' => 'employer.edit',
            'uses' => 'employerController@editEmployer'
        ]
    );

    Route::post('employer/update/{id}',
        [
            'as' => 'employer.update',
            'uses' => 'employerController@updateEmployer'
        ]
    );


    //LOANS PATHS

    Route::post('pmtTest',
        [
            'as' => 'pmtTest',
            'uses' => 'testController@test'
        ]
    );

    Route::get('/pmtTest',
        [
            'as' => 'pmtTestPage',
            'uses' => 'testController@loadPage'
        ]
    );


   Route::group(['middleware' => ['permission:create-loan']], function (){

       Route::get('loans/new/{schemeId}',
           [
               'as' => 'loans.new',
               'uses' => 'loansController@newLoan'
           ]
       );

       Route::post('loans/new/',
           [
               'as' => 'loans.saveNew',
               'uses' => 'loansController@saveNew'
           ]
       );

       Route::get('loans/',
           [
               'as' => 'loans.index',
               'uses' => 'loansController@index'
           ]
       );
   });

    Route::get('loans/view/{id}',
        [
            'as' => 'loan.view',
            'uses' => 'loansController@view'
        ]
    );

    Route::get('amortization/{id}',
        [
            'as' => 'schedule',
            'uses' => 'amortizationController@index'
        ]);

    Route::get('amortization/mark_paid/{id}/{loanId}',
        [
            'as' => 'mark_paid',
            'uses' => 'amortizationController@markPaid'
        ]);

    Route::get('amortization/mark_defaulted/{id}/{loanId}',
        [
            'as' => 'mark_defaulted',
            'uses' => 'amortizationController@markDefaulted'
        ]);

    Route::get('payments/settlementDetails/{id}',
        [
            'as' => 'payments.details',
            'uses' => 'paymentsController@details'
        ]);


    Route::get('payments/due',
        [
           'as' => 'payments.due',
            'uses' => 'paymentsController@due'
        ]);

    Route::post('payments/due',
        [
           'as' => 'payments.save',
            'uses' => 'paymentsController@save'
        ]);
    Route::group(['middleware' => ['permission:approve-loans']], function(){
        Route::post('loans/changeState/{id}',
            [
                'as' => 'loans.changeState',
                'uses' => 'loansController@changeState'
            ]
        );
    });

    Route::group(['middleware' => ['permission:disburse-funds']], function(){
        Route::post('loans/disburse/{id}',
            [
                'as' => 'loans.disburse',
                'uses' => 'loansController@disburse'
            ]
        );
    });

    Route::group(['middleware' => ['role:admin']], function ()
    {
        //Settings Paths
        Route::get('settings',
            [
                'as' => 'settings',
                'uses' => 'settingsController@index'
            ]
        );

        Route::get('settings/clients/ids',
            [
                'as' => 'settings.clients.ids',
                'uses' => 'settingsController@clientsIds'
            ]
        );

        Route::post('settings/clients/ids/save',
            [
                'as' => 'settings.clients.id.saveNew',
                'uses' => 'settingsController@saveNewIds'
            ]
        );

        Route::post('settings/clients/ids/update/{id}',
            [
                'as' => 'settings.clients.id.update',
                'uses' => 'settingsController@updateId'
            ]
        );

        Route::get('settings/clients/ids/edit/{name}',
            [
                'as' => 'settings.clients.id.edit',
                'uses' => 'settingsController@editId'
            ]
        );

        Route::get('settings/clients/ids/delete/{id}',
            [
                'as' => 'settings.clients.ids.delete',
                'uses' => 'settingsController@deleteIds'
            ]
        );

        Route::get('settings/clients/locations/',
            [
                'as' => 'settings.clients.locations',
                'uses' => 'settingsController@clientsLocations'
            ]
        );

        Route::post('settings/clients/locations/save',
            [
                'as' => 'settings.clients.locations.saveNew',
                'uses' => 'settingsController@saveNewLocation'
            ]
        );

        Route::get('settings/clients/locations/delete/{id}',
            [
                'as' => 'settings.clients.locations.delete',
                'uses' => 'settingsController@deleteLocation'
            ]
        );

        Route::get('settings/clients/locations/edit/{name}',
            [
                'as' => 'settings.clients.location.edit',
                'uses' => 'settingsController@editLocation'
            ]
        );

        Route::post('settings/clients/locations/update/{id}',
            [
                'as' => 'settings.clients.location.update',
                'uses' => 'settingsController@updateLocation'
            ]
        );

        Route::get('settings/loan_types/',
            [
                'as' => 'settings.loans.types',
                'uses' => 'settingsController@loanTypes'
            ]
        );

        Route::post('settings/loan_types/',
            [
                'as' => 'settings.loans.saveLoanType',
                'uses' => 'settingsController@saveLoanType'
            ]
        );


        Route::get('settings/loan_types/delete/{id}',
            [
                'as' => 'settings.loanType.delete',
                'uses' => 'settingsController@deleteLoanType'
            ]
        );


        Route::get('settings/loan_types/edit/{name}',
            [
                'as' => 'settings.loanType.edit',
                'uses' => 'settingsController@editLoanType'
            ]
        );

        Route::post('settings/loan_types/update/{id}',
            [
                'as' => 'settings.loanTypes.update',
                'uses' => 'settingsController@updateLoanType'
            ]
        );

        Route::get('settings/loan_security/',
            [
                'as' => 'settings.loanSecurity',
                'uses' => 'settingsController@loanSecurity'
            ]
        );

        Route::post('settings/loan_security/',
            [
                'as' => 'settings.loanSecurity.saveNew',
                'uses' => 'settingsController@saveNew'
            ]
        );

        Route::get('settings/loan_security_delete/{id}',
            [
                'as' => 'settings.loanSecurity.delete',
                'uses' => 'settingsController@deleteSecurity'
            ]
        );


        Route::get('settings/loan_security_edit/{name}',
            [
                'as' => 'settings.loanSecurity.edit',
                'uses' => 'settingsController@editSecurity'
            ]
        );

        Route::post('settings/loan_security_update/{id}',
            [
                'as' => 'settings.loanSecurity.update',
                'uses' => 'settingsController@updateSecurity'
            ]
        );


        Route::get('settings/applicationStatuses',
            [
                'as' => 'settings.applicationStatuses',
                'uses' => 'settingsController@applicationStatuses'
            ]
        );

        Route::post('settings/applicationStatuses/new',
            [
                'as' => 'settings.applicationStatuses.saveNew',
                'uses' => 'settingsController@applicationStatusNew'
            ]
        );

        Route::get('settings/applicationStatuses/delete/{id}',
            [
                'as' => 'settings.applicationStatuses.delete',
                'uses' => 'settingsController@applicationStatusDelete'
            ]
        );



        Route::get('settings/users/roles',
            [
                'as' => 'settings.users.roles-and-permissions',
                'uses' => 'settingsController@roles'
            ]
        );



        Route::post('settings/users/roles',
            [
                'as' => 'settings.users.saveRole',
                'uses' => 'settingsController@saveRole'
            ])
        ;


        Route::get('settings/users/permissions/{id}',
            [
                'as' => 'settings.users.roles.permissions',
                'uses' => 'settingsController@setPermissions'
            ]
        );


        Route::post('settings/users/permissions/{id}',
            [
                'as' => 'settings.users.savePermissions',
                'uses' => 'settingsController@savePermissions'
            ])
        ;
    });

});

Route::group(['middleware' => ['web', 'CORS'], 'prefix' => 'api'], function (){
   Route::get('loadCharts',
       [
           'uses' => 'API\apiController@chartData'
       ]);
});

