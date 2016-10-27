
@extends('layouts.master')

@section('title')
    F.M.F.S | New {{ $loanScheme->name }}
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    New {{ $loanScheme->name }}
@endsection

@section('content')
    <div class="row widget-row">
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>New Client Form Wizard</h3>
                        <p> This Wizard will guide you through the creation of a new client. It will let you know that what fields are required.
                            Unauthorized users will not be able to create users. Any attempt to do so will automatically disable your account.</p>
                        <p> For more info please check out
                            <a class="btn red btn-outline" href="#" target="_blank">the official user manual</a>
                        </p>
                    </div>
                    <div class="portlet light " id="form_wizard_1">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-layers font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> Client Creation -
                                                                <span class="step-title"> Step 1 of 3 </span>
                                                            </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {!! Form::open(array('route' => 'loans.saveNew', 'files' => true, 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'submit_form', 'enctype' => 'multipart/form-data')) !!}

                            {{ csrf_field() }}
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc">
                                                                                    <i class="fa fa-check"></i> Basic Loan Details </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step">
                                                <span class="number"> 2 </span>
                                                <span class="desc">
                                                                                    <i class="fa fa-check"></i> Security</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                                                    <i class="fa fa-check"></i> Notes</span>
                                            </a>
                                        </li>


                                        <li>
                                            <a href="#tab4" data-toggle="tab" class="step active">
                                                <span class="number"> 4 </span>
                                                <span class="desc">
                                                                                    <i class="fa fa-check"></i> Confirm </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                        <div class="alert alert-success display-none">
                                            <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">Loan Details</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Client
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="clientId">
                                                        <option value="">Select Client...</option>
                                                        @foreach($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Loan Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" name="loanAmount" required/>
                                                    <input type="hidden" class="form-control" name="loanType" value="{{ $loanScheme->id }}" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Repayment Period (Months)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" name="loanRepaymentPeriod" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Loan Security</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Security Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="loanSecurityTypeId">
                                                        <option value="">Select Security...</option>
                                                        @foreach($securities as $security)
                                                            <option value="{{ $security->id }}">{{ $security->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Security Value
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" name="loanSecurityValue" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Security Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="loanSecurities[]" required/>
                                                        <span class="help-block"> Provide Security Image</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Security Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="loanSecurities[]" required/>
                                                        <span class="help-block"> Provide Security Image</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Security Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="loanSecurities[]" required/>
                                                        <span class="help-block"> Provide Security Image</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Security Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="loanSecurities[]" required/>
                                                        <span class="help-block"> Provide Security Image</span>
                                                    </div>
                                            </div>



                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Security Document
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="securityDocument" required/>
                                                        <span class="help-block"> Provide Security Document</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Utility Bill
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="utilityBill" required/>
                                                        <span class="help-block"> Provide Recent Utility Bill</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Pay Slip 1
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="payslip_1" required/>
                                                        <span class="help-block"> Provide Client Pay Slip</span>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="control-label col-md-3">Pay Slip 2
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="payslip_2" required/>
                                                        <span class="help-block"> Provide Second Client Pay Slip</span>
                                                    </div>
                                            </div>
                                            @if($loanScheme->requiresEmployerConsent == '1')
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Employer Consent Form
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="file" placeholder="" class="form-control" name="employerConsentForm" required/>
                                                            <span class="help-block"> Provide Employer Consent Form</span>
                                                        </div>
                                                </div>
                                            @endif

                                        </div>


                                        <div class="tab-pane" id="tab3">
                                            <h3 class="block">Loan Notes</h3>
                                            <h4 class="form-section">Basic Loan Details</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Notes & Observations
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea class="form-control" name="recommendationNotes"></textarea>
                                                    <span class="help-block"> Provide Assessment Notes</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <h3 class="block">Loan Application</h3>
                                            <h4 class="form-section">Basic Loan Details</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Client:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="clientId"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Loan Amount:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="loanAmount"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Loan Repayment Period:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="loanRepaymentPeriod"> </p>
                                                </div>
                                            </div>
                                            <h4 class="form-section">Security</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Security Value:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="loanSecurityValue"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Loan Security Type:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="loanSecurityTypeId"> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <button type="submit" class="btn green button-submit"> submit
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
@endsection

@section('plugins')
    <script src="{{ asset('../assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
@endsection

@section('scripts')
    <script src="{{ asset('../assets/pages/scripts/form-wizard_2.js') }}" type="text/javascript"></script>

@endsection