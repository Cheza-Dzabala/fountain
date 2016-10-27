
@extends('layouts.master')

@section('title')
    F.M.F.S | New Employer
@endsection

@section('styles')
@endsection

@section('page-title')
    New Employer
@endsection

@section('content')
    <div class="row" style="align-content: center">
        <div class="col-md-2"></div>
        <div class="portlet light  col-md-8 ">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-pin font-green"></i>
                    <span class="caption-subject bold uppercase"> {{ $employer->name }} Record</span>
                </div>
            </div>
            <div class="portlet-body form">
               <div class="row">
                   <div class="form-group">
                       <label class="control-label col-md-4">Name:</label>
                       <div class="col-md-6">
                           {{ $employer->name }}
                       </div>
                   </div>
               </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Primary Contact Person:</label>
                        <div class="col-md-6">
                            {{ $employer->contactPerson }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Primary Contact Number:</label>
                        <div class="col-md-6">
                            {{ $employer->primaryContactNumber }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Secondary Contact Number:</label>
                        <div class="col-md-6">
                            {{ $employer->secondaryContactNumber }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Physical Address:</label>
                        <div class="col-md-6">
                            {{ $employer->physicalAddress }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Postal Address:</label>
                        <div class="col-md-6">
                            {{ $employer->postalAddress }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Email Address:</label>
                        <div class="col-md-6">
                            {{ $employer->emailAddress }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Created By:</label>
                        <div class="col-md-6">
                            {{ $employer->user }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Actions:</label>
                        <div class="col-md-6">
                            <a href="{{ route('employer.edit', $employer->name) }}" class="btn btn-md btn-warning">
                                <i class="icon-pencil"></i>&nbsp;
                                Edit This Employer</a>
                            <a href="" class="btn btn-md btn-success">
                                <i class="icon-printer"></i> &nbsp;
                                Print This Employer</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection

@section('scripts')

@endsection