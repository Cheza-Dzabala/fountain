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




});