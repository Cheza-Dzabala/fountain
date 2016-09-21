

@extends('layouts.master')

@section('title')
    F.M.F.S | Update Location
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    LOCATION UPDATE
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user font-yellow-casablanca"></i>
                        <span class="caption-subject bold font-yellow-casablanca uppercase">
                            Update{{ $location->name }}
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form">
                            <form method="post" action="{{ route('settings.clients.location.update', $location->id) }}">
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">New ID</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $location->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Accepted Status  </label>
                                        <div class="mt-radio-list">
                                            <label class="mt-radio"> Accepted
                                                <input type="radio" value="1" name="isActive" @if($location->isActive == '1') checked @endif/>
                                                <span></span>
                                            </label>
                                            <label class="mt-radio"> Unaccepted
                                                <input type="radio" value="0" name="isActive" @if($location->isActive == '0') checked @endif/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn green" value="Save changes">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


