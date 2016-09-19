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



});