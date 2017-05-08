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
    <form action="{{ route('client.employment.save') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="client" value="{{ $client->id }}" />
    <div class="row" style="align-content: center">

        <div class="portlet light  col-md-12 ">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-user font-green"></i>
                    <span class="caption-subject bold uppercase"> {{ $client->firstName }} {{ $client->lastName }}'s Employment Record</span>
                    |
                    <small style="color: #0a001f">User Added By: {{ $client->author }}</small>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="row ">
                    <h4 class="form-section">Emplyment Details</h4>
                    <div class="form-group">
                        <label class="control-label col-md-3">Employment Status
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="radio-list">
                                <label>
                                    <input type="radio" class="md-radiobtn" name="employmentStatus" value="1"
                                           data-title="employed" checked/> Employed </label>
                                <label>
                                    <input type="radio" class="md-radiobtn" name="employmentStatus" value="0"
                                           data-title="unemployed"/> Unemployed </label>
                            </div>
                            <div id="form_gender_error"></div>
                        </div>
                    </div>
                    <span id="employerDetails" style="padding-top: 20px">

                        <div class="form-group col-md-12" >
                            <label class="control-label col-md-3">Employer
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="employer_id" >
                                    @foreach ($employers as $employer)
                                        <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"> Provide client's Employer</span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label col-md-3">Position</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="position"/>
                                <span class="help-block"> Provide Your Position</span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label col-md-3">Employment Start Date
                                <span class="required"> * </span></label>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="employmentStartDate" />
                                <span class="help-block"> Provide client's employment start date</span>
                            </div>
                        </div>
                    </span>
                    @if($client->employmentStatus == 1)
                        <span id="employmentEndDate" style="padding-top: 20px">
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Employment End Date
                                    <span class="required"> * </span></label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="employmentEndDate" />
                                    <span class="help-block"> Provide client's employment End date</span>
                                </div>
                            </div>
                        </span>
                    @endif
                </div>

                <input type="submit" value="update" class="btn blue-oleo" />


            </div>

            <!-- END ROW  -->
        </div>

    </div>
    </form>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "1") {
                    $("#employerDetails").show();
                    $("#employmentEndDate").hide();
                }
                if ($(this).attr("value") == "0") {
                    $("#employerDetails").hide();
                    $("#employmentEndDate").show();

                }
            });
        });
    </script>
@endsection
