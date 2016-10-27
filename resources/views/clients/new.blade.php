@extends('layouts.master')

@section('title')
    F.M.F.S | Create Client
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    New Client
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
                                <i class=" icon-layers font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> Client Creation -
                                                                <span class="step-title"> Step 1 of 5 </span>
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
                                {!! Form::open(array('route' => 'clients.save', 'files' => true, 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'submit_form')) !!}

                                {{ csrf_field() }}
                                <div class="form-wizard">
                                    <div class="form-body">
                                        <ul class="nav nav-pills nav-justified steps">
                                            <li>
                                                <a href="#tab1" data-toggle="tab" class="step">
                                                    <span class="number"> 1 </span>
                                                    <span class="desc">
                                                                                    <i class="fa fa-check"></i> Personal Details </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab" class="step">
                                                    <span class="number"> 2 </span>
                                                    <span class="desc">
                                                                                    <i class="fa fa-check"></i> Contact Details </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab" class="step">
                                                    <span class="number"> 3 </span>
                                                    <span class="desc">
                                                                                    <i class="fa fa-check"></i> Employment &<br/> Financial </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab" class="step">
                                                    <span class="number"> 4 </span>
                                                    <span class="desc">
                                                                                    <i class="fa fa-check"></i> Identification </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab5" data-toggle="tab" class="step active">
                                                    <span class="number"> 5 </span>
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
                                                <h3 class="block">Provide your account details</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">First Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required/>
                                                        <span class="help-block"> Provide client's First Name </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Last Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required/>
                                                        <span class="help-block"> Provide client's last Name </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Other Names
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="otherNames" value="{{ old('otherNames') }}" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Gender
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="radio-list">
                                                            <label>
                                                                <input type="radio" name="gender" value="M" data-title="Male" /> Male </label>
                                                            <label>
                                                                <input type="radio" name="gender" value="F" data-title="Female" /> Female </label>
                                                        </div>
                                                        <div id="form_gender_error"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="clientImage" />
                                                        <span class="help-block"> Provide client's Image </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Date Of Birth
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="date" class="form-control" name="dateOfBirth" required/>
                                                        <span class="help-block"> Provide Date Of Birth </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <h3 class="block">Provide your contact details</h3>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Primary Contact Number
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="primaryContactNumber" required/>
                                                        <span class="help-block"> Provide client's primary contact number </span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Secondary Contact Number

                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="secondaryContactNumber"  />
                                                        <span class="help-block"> Provide client's secondary contact number </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Primary Email Address
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="primaryEmailAddress"  />
                                                        <span class="help-block"> Please Provide Primary Email Address </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Secondary Email Address
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="secondaryEmailAddress"  />
                                                        <span class="help-block"> Please Provide Secondary Email Address </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Physical Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                       <textarea class="form-control" name="physicalAddress" required></textarea>
                                                        <span class="help-block"> Provide clients physical address </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Postal Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                       <textarea class="form-control" name="postalAddress" required></textarea>
                                                        <span class="help-block"> Provide clients postal address </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">City/Town
                                                        <span class="required" required> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="locationId" >
                                                            @foreach($locations as $location)
                                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="help-block"> Provide your city or town </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <h3 class="block">Employment & Financial</h3>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Employment Status
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="radio-list">
                                                            <label>
                                                                <input type="radio" class="md-radiobtn" name="employmentStatus" value="1" data-title="employed" checked/> Employed </label>
                                                            <label>
                                                                <input type="radio" class="md-radiobtn" name="employmentStatus" value="0" data-title="unemployed" /> Unemployed </label>
                                                        </div>
                                                        <div id="form_gender_error"> </div>
                                                    </div>
                                                </div>
                                                <span id="employerDetails">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Employer
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="employer_id" required>
                                                                @foreach ($employers as $employer)
                                                                    <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="help-block"> Provide client's Employer</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Employment Start Date
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" name="employmentStartDate" required />
                                                            <span class="help-block"> Provide client's employment start date</span>
                                                        </div>
                                                    </div>
                                                </span>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bankName" required />
                                                        <span class="help-block"> Provide client's Bank Name</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Account Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bankAccountName" required />
                                                        <span class="help-block"> Provide client's bank account name</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Account Number
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="number" placeholder="" class="form-control" name="bankAccountNumber" required/>
                                                        <span class="help-block"> Provide clients bank account number</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Branch
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="" class="form-control" name="bankBranch" required/>
                                                        <span class="help-block"> Provide clients bank branch</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab4">
                                                <h3 class="block">Identification</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID type
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="idType" required>
                                                            @foreach($ids as $id)
                                                                <option value="{{ $id->id }}">{{ $id->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="help-block"> Provide clients identification type</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Number
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="" class="form-control" name="idNumber" required/>
                                                        <span class="help-block"> Provide clients identification number</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Date Issued
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="date" placeholder="" class="form-control" name="dateIssued" required/>
                                                        <span class="help-block"> Provide clients identification issue date </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Place Issued
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="" class="form-control" name="placeIssued" required/>
                                                        <span class="help-block"> Provide clients identification issue location </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Expiry Date
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="date" placeholder="" class="form-control" name="expiryDate" required/>
                                                        <span class="help-block"> Provide clients identification expiry Date</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Id Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" placeholder="" class="form-control" name="idImage" />
                                                        <span class="help-block"> Provide clients identification Image</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab5">
                                                <h3 class="block">Confirm client account</h3>
                                                <h4 class="form-section">Personal Details</h4>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">First Name:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="firstName"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">last Name:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="lastName"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Other Names:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="otherNames"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Date Of Birth:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="dateOfBirth"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Gender:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="gender"> </p>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Contact Details</h4>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Primary Phone Number:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="primaryContactNumber"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Secondary Phone Number:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="secondaryContactNumber"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Primary Email Address:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="primaryEmailAddress"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Secondary Email Address:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="secondaryEmailAddress"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Physical Address:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="physicalAddress"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Postal Address:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="postalAddress"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Location:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="locationId"> </p>
                                                    </div>
                                                </div>
                                                <h4 class="form-section">Employment & Financial</h4>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Employment Status:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="employmentStatus"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Employer:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="employer_id"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Name:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="bankName"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Account Name:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="bankAccountName"> </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Account Number:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="bankAccountNumber"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Bank Branch:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="bankBranch"> </p>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Identification</h4>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Type:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="idType"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Number:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="idNumber"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Issue Date:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="dateIssued"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Issue Location:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="placeIssued"> </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">ID Expiry Date:</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="expiryDate"> </p>
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
                            </form>
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
    <script src="{{ asset('../assets/pages/scripts/form-wizard.js') }}" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="1"){
                    $("#employerDetails").show();
                }
                if($(this).attr("value")=="0"){
                    $("#employerDetails").hide();
                }
            });
        });
    </script>
@endsection