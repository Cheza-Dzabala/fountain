
@extends('layouts.master')

@section('title')
    F.M.F.S | {{ $loan->firstName }} {{ $loan->lastName }}
@endsection

@section('styles')
    <link href="{{ asset('../node_modules/viewer-master/viewer.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    {{ $loan->firstName }} {{ $loan->lastName }} Loan Application
@endsection

@section('content')
    <div class="row" style="align-content: center" ng-controller="clientProfileEditController as clientEdit">

        <div class="portlet light  col-md-12 ">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-user font-green"></i>
                    <span class="caption-subject bold uppercase"> {{ $loan->firstName }} {{ $loan->lastName }}'s Record</span>
                    | <small style="color: #0a001f">Loan Added By: {{ $loan->author }}</small>
                </div>
                <div class="pull-right">
                   @permission('approve-loans')
                    <button type="button" data-toggle="modal" href="#manageLoan" class="btn blue-hoki">
                        Manage Loan Status
                    </button>
                    @if($loan->disbursementDate != null)
                        <a type="button" data-toggle="modal" href="{{ route('schedule', $loan->id) }}" class="btn btn-warning">
                            Payment Schedule
                        </a>
                    @endif
                    @endpermission
                    @ability('admin', 'disburse-funds')
                        @if($loan->applicationStatus == 'Approved')
                            @if($loan->expectedDateOfCompletion == null)
                                <button type="button" data-toggle="modal" href="#disbursefunds" class="btn blue-hoki">
                                    Disburse Funds
                                </button>
                            @endif
                        @endif
                    @endability
                </div>
            </div>
            <div class="portlet-body form">
                <div class="row">
                    <h4 class="form-section">Client Details
                        <span class="pull-right" style="margin-top: 8px">

                    </span>
                    </h4>

                    <div class="col-md-3">
                        <img src="{{ asset($loan->clientImage) }}" style="height: 250px; width: 250px">
                        <input type="hidden" name="clientID" value="{{ $loan->id }}">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">First Name:</label>
                                <div class="col-md-6">
                                    {{ $loan->firstName }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Last Name:</label>
                                <div class="col-md-6">
                                    {{ $loan->lastName }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Number Of Previous Loans:</label>
                                <div class="col-md-6">
                                    {{ $loan->previousLoans }}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END ROW  -->
            </div>
                <!-- END ROW  -->
            <div class="row" style="margin-top: 10px">
                <h4 class="form-section">Loan Details
                    <span class="pull-right" style="margin-top: 8px">

                    </span>
                </h4>
                <div class="col-md-3">

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Loan Type:</label>
                            <div class="col-md-6">
                                {{ $loan->loanTypeName }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Loan Amount:</label>
                            <div class="col-md-6">
                                {{ number_format($loan->loanAmount, 2) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Application Status:</label>
                            <div class="col-md-6">
                                {{ $loan->applicationStatus }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Disbursement Date:</label>
                            <div class="col-md-6">
                                {{ $loan->disbursementDate }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Expected Date Of Completion:</label>
                            <div class="col-md-6">
                                {{ $loan->expectedDateOfCompletion }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Loan Application Comments:</label>
                            <div class="col-md-6">
                                {{ $loan->recommendationNotes }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <h4 class="form-section">Security Details
                    <span class="pull-right" style="margin-top: 8px">

                    </span>
                </h4>
                <div class="col-md-3">

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Security Type:</label>
                            <div class="col-md-6">
                                {{ $loan->securityType }}
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Security Value:</label>
                            <div class="col-md-6">
                                {{ number_format($loan->securityValue, 2) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Security Document:</label>
                            <div class="col-md-6">
                                <a href="/uploads/loans/securityDocuments/{{ $loan->securityDocument }}" target="_blank">View Here</a>
                            </div>
                        </div>
                    </div>
                    @if($loan->employerConsentForm != NULL)
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Employer Consent Form:</label>
                            <div class="col-md-6">
                                <a href="/uploads/loans/employerConsentForms/{{ $loan->employerConsentForm }}" target="_blank">View Here</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Security Images:</label>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row" style="display: inline">
                            <div class="securityImages">
                                <img src="/{{ $loan->securityImage_0 }}" style="height: 250px; width: 250px; margin-top: 5px">
                                <img src="/{{ $loan->securityImage_1 }}" style="height: 250px; width: 250px; margin-top: 5px">
                                <img src="/{{ $loan->securityImage_2 }}" style="height: 250px; width: 250px; margin-top: 5px">
                                <img src="/{{ $loan->securityImage_3 }}" style="height: 250px; width: 250px; margin-top: 5px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4 class="form-section">Dependancies
                    <span class="pull-right" style="margin-top: 8px">

                    </span>
                </h4>
                <div class="col-md-3">

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Utility Bill:</label>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row" style="display: inline">
                            <div class="securityImages">
                                <img src="/uploads/loans/utilityBills/{{ $loan->utilityBill }}" style="height: 250px; width: 250px; margin-top: 5px">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Payslips:</label>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row" style="display: inline">
                            <div class="securityImages">
                                <img src="/uploads/loans/paySlips/{{ $loan->payslip_1 }}" style="height: 250px; width: 250px; margin-top: 5px">
                                <img src="/uploads/loans/paySlips/{{ $loan->payslip_2 }}" style="height: 250px; width: 250px; margin-top: 5px">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageLoan"  tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div style="margin-left: 50px; margin-right: 50px">
                   <form method="post" action="{{ route('loans.changeState', $loan->id) }}">
                       {{ csrf_field() }}
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title">Manage Loan</h4>
                       </div>
                       <div class="form-group{{ $errors->has('applicationStatusId') ? ' has-error' : '' }}">
                           <label>Application Status  </label>
                           <div class="mt-radio-list">
                               @foreach($applicationStatuses as $status)
                                   <label class="mt-radio"> {{ $status->name }}
                                       <input type="radio" value="{{ $status->id }}" name="applicationStatusId" @if($status->id == $loan->applicationStatusId) checked @endif/>
                                       <span></span>
                                   </label>
                               @endforeach
                           </div>
                           @if ($errors->has('applicationStatusId'))
                               <span class="help-block">
                                        <strong>{{ $errors->first('applicationStatusId') }}</strong>
                                    </span>
                           @endif
                       </div>

                       <div class="form-group{{ $errors->has('loanComments') ? ' has-error' : '' }}">
                           <label>Loan Comments </label>
                           <textarea cols="10" rows="5" class="form-control" name="loanComments"></textarea>
                           @if ($errors->has('loanComments'))
                               <span class="help-block">
                                        <strong>{{ $errors->first('loanComments') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                           <input type="submit" class="btn green" value="Save changes">
                       </div>
                   </form>
               </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="disbursefunds"  tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div style="margin-left: 50px; margin-right: 50px">
                   <form method="post" action="{{ route('loans.disburse', $loan->id) }}">
                       {{ csrf_field() }}
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title">Disburse Funds</h4>
                       </div>
                       <div class="form-group{{ $errors->has('disbursedAmount') ? ' has-error' : '' }}">
                           <label>Disbursement Total</label>
                           <input type="text" name="disbursedAmount"  class="form-control" value="{{ $loan->loanAmount }}">
                           @if ($errors->has('disbursedAmount'))
                               <span class="help-block">
                                        <strong>{{ $errors->first('disbursedAmount') }}</strong>
                                    </span>
                           @endif
                       </div>

                       <div class="form-group{{ $errors->has('chequeNumber') ? ' has-error' : '' }}">
                           <label>Cheque Number</label>
                           <input type="text" name="chequeNumber"  class="form-control" >
                           @if ($errors->has('chequeNumber'))
                               <span class="help-block">
                                        <strong>{{ $errors->first('chequeNumber') }}</strong>
                                    </span>
                           @endif
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                           <input type="submit" class="btn green" value="Save changes">
                       </div>
                   </form>
               </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/angular/controllers/clientProfileEdit.js') }}" type="text/javascript"></script>
    <script src="{{  asset('../node_modules/viewer-master/viewer.js') }}" type="text/javascript"></script>
    <script>
        $('.securityImages').viewer();
    </script>
@endsection