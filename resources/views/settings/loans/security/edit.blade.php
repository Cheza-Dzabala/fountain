

@extends('layouts.master')

@section('title')
    F.M.F.S | SECURITY UPDATE
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    SECURITY UPDATE
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
                            Update{{ $security->name }}
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form">
                            <form method="post" action="{{ route('settings.loanSecurity.update', $security->id) }}">
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Update Security</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $security->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Active Status  </label>
                                        <div class="mt-radio-list">
                                            <label class="mt-radio"> Active
                                                <input type="radio" value="1" name="isActive" @if($security->isActive == '1') checked @endif/>
                                                <span></span>
                                            </label>
                                            <label class="mt-radio"> Inactive
                                                <input type="radio" value="0" name="isActive" @if($security->isActive == '0') checked @endif/>
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


