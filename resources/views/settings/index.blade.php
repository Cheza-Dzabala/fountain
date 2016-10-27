
@extends('layouts.master')

@section('title')
    F.M.F.S | Settings
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    System Settings
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-yellow-casablanca"></i>
                        <span class="caption-subject bold font-yellow-casablanca uppercase"> System Settings </span>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Clients Module</h4>
                            <p>
                                <a href="{{ route('settings.clients.ids') }}" type="button" class="btn blue-oleo">
                                   Accepted Identification
                                </a>
                                <a href="{{ route('settings.clients.locations') }}" type="button" class="btn blue-oleo">
                                   Locations
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4>Loans Module</h4>
                            <p>
                                <a href="{{ route('settings.loans.types') }}" type="button" class="btn blue-oleo">
                                    Loan Types
                                </a>
                                <a href="{{ route('settings.loanSecurity') }}" type="button" class="btn blue-oleo">
                                    Loan Securities
                                </a>
                                <a href="{{ route('settings.applicationStatuses') }}" type="button" class="btn blue-oleo">
                                   Application Statuses
                                </a>

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Users Module</h4>
                            <p>
                                <a href="{{ route('settings.users.roles-and-permissions') }}" type="button" class="btn blue-oleo">
                                    Manage Roles And Permissions
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection