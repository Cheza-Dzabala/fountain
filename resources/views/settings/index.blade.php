
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

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection