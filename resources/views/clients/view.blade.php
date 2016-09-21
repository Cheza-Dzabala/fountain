
@extends('layouts.master')

@section('title')
    F.M.F.S | {{ $client->firstName }} {{ $client->lastName }}
@endsection

@section('styles')
@endsection

@section('page-title')
    {{ $client->firstName }} {{ $client->lastName }} Record
@endsection

@section('content')
    <div class="row" style="align-content: center">

        <div class="portlet light  col-md-12 ">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-user font-green"></i>
                    <span class="caption-subject bold uppercase"> {{ $client->firstName }} {{ $client->lastName }}'s Record</span>
                    | <small style="color: #0a001f">User Added By: {{ $client->author }}</small>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="row">
                    <h4 class="form-section">Personal Details
                    <span class="pull-right" style="margin-top: 8px">
                        <a href="" type="button" class="btn blue-oleo">
                            Edit Section
                        </a>
                    </span>
                    </h4>

                    <div class="col-md-3">
                        <img src="{{ asset($client->clientImage) }}" style="height: 250px; width: 250px">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">First Name:</label>
                                <div class="col-md-6">
                                    {{ $client->firstName }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Last Name:</label>
                                <div class="col-md-6">
                                    {{ $client->lastName }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Other Names:</label>
                                <div class="col-md-6">
                                    @if($client->otherName == null)
                                       <span class="text-danger">None Provided</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Date Of Birth:</label>
                                <div class="col-md-6">
                                    {{ $client->dateOfBirth }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Gender:</label>
                                <div class="col-md-6">
                                    @if($client->gender == 'M')
                                        Male
                                    @else
                                        Female
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END ROW  -->
                <div class="row" style="margin-top: 10px">
                    <h4 class="form-section">Contact Details
                        <span class="pull-right" style="margin-top: 8px">
                        <a href="" type="button" class="btn blue-oleo">
                            Edit Section
                        </a>
                    </span>
                    </h4>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Primary Contact Number:</label>
                                <div class="col-md-6">
                                    {{  $client->primaryContactNumber }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Secondary Contact Number:</label>
                                <div class="col-md-6">
                                    @if($client->secondaryContactNumber == null)
                                        <span class="text-danger">None Provided</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Primary Email Address:</label>
                                <div class="col-md-6">
                                    {{  $client->primaryEmailAddress }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Secondary Email Address:</label>
                                <div class="col-md-6">
                                  @if($client->secondaryEmailAddress == null)
                                      <span class="text-danger">None Provided</span>
                                  @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Physical Address:</label>
                                <div class="col-md-6">
                                 {{ $client->physicalAddress }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Postal Address:</label>
                                <div class="col-md-6">
                                 {{ $client->postalAddress }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">City Of Residence:</label>
                                <div class="col-md-6">
                                 {{ $client->location_name }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END ROW  -->
                <div class="row">
                    <div class="row" style="margin-top: 10px">
                        <h4 class="form-section">Employment & Financial Details
                            <span class="pull-right" style="margin-top: 8px">
                                <a href="" type="button" class="btn blue-oleo">
                                    Edit Section
                                </a>
                            </span>
                        </h4>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-8">
                            @if($client->employmentStatus == '1')
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Employer Name:</label>
                                        <div class="col-md-6">
                                            {{ $client->employer_name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Employment Start Date:</label>
                                        <div class="col-md-6">
                                            {{ $client->employmentStart }}
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Employment:</label>
                                        <div class="col-md-6">
                                           <span class="text-danger">Unemployed</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Bank Name:</label>
                                        <div class="col-md-6">
                                            {{ $client->bankName }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Bank Account Name:</label>
                                        <div class="col-md-6">
                                            {{ $client->bankAccountName }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Bank Account Number:</label>
                                        <div class="col-md-6">
                                            {{ $client->bankAccountNumber }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Bank Branch:</label>
                                        <div class="col-md-6">
                                            {{ $client->bankBranch }}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- END ROW  -->
                <div class="row">
                    <div class="row" style="margin-top: 10px">
                        <h4 class="form-section">Identification
                            <span class="pull-right" style="margin-top: 8px">
                                <a href="" type="button" class="btn blue-oleo">
                                    Edit Section
                                </a>
                            </span>
                        </h4>
                        <div class="col-md-3">
                            <img src="{{ asset($client->idImage) }}" style="height: auto; width: 100%">
                        </div>
                        <div class="col-md-8">

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4">ID TYPE:</label>
                                    <div class="col-md-6">
                                        {{ $client->idType }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4">ID Number:</label>
                                    <div class="col-md-6">
                                        {{ $client->idNumber }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Issued:</label>
                                    <div class="col-md-6">
                                        {{ $client->dateIssued }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Place Issued:</label>
                                    <div class="col-md-6">
                                        {{ $client->placeIssued }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Expiry Date:</label>
                                    <div class="col-md-6">
                                        {{ $client->expiryDate }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection