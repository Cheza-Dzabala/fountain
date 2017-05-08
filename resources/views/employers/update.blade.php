
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
                    <span class="caption-subject bold uppercase"> Update {{ $employer->name }} Employer Record</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{ route('employer.update', $employer->id) }}" method="post" class="" role="form">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $employer->name }}" disabled>
                            <label for="name">Company Name</label>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Business Registered Name...</span>
                            @endif
                        </div>



                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('contactPerson') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="contactPerson" name="contactPerson" value="{{ $employer->contactPerson }}">
                            <label for="contactPerson">Contact Person</label>
                            @if ($errors->has('contactPerson'))
                                <span class="help-block">
                                <strong>{{ $errors->first('contactPerson') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Contact Person For Information Verification...</span>
                            @endif
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('primaryContactNumber') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="primaryContactNumber" name="primaryContactNumber" value="{{ $employer->primaryContactNumber }}">
                            <label for="primaryContactNumber">Primary Contact Number</label>

                            @if ($errors->has('primaryContactNumber'))
                                <span class="help-block">
                                <strong>{{ $errors->first('primaryContactNumber') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Phone Number For Primary Contact...</span>
                            @endif
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('secondaryContactNumber') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="secondaryContactNumber" name="secondaryContactNumber" value="{{ $employer->secondaryContactNumber }}">
                            <label for="secondaryContactNumber">Secondary Contact Number</label>
                            @if ($errors->has('secondaryContactNumber'))
                                <span class="help-block">
                                <strong>{{ $errors->first('secondaryContactNumber') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Phone Number Incase Primary Is Unreachable...</span>
                            @endif
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('physicalAddress') ? ' has-error' : '' }}">
                            <textarea class="form-control" name="physicalAddress" >{{ $employer->physicalAddress }}</textarea>
                            <label for="physicalAddress">Physical Address</label>
                            @if ($errors->has('physicalAddress'))
                                <span class="help-block">
                                <strong>{{ $errors->first('physicalAddress') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Business Location ...</span>
                            @endif
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('postalAddress') ? ' has-error' : '' }}">
                            <textarea class="form-control" name="postalAddress">{{ $employer->postalAddress }}</textarea>
                            <label for="postalAddress">Postal Address</label>
                            @if ($errors->has('postalAddress'))
                                <span class="help-block">
                                <strong>{{ $errors->first('postalAddress') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Business Postal Address...</span>
                            @endif
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label{{ $errors->has('emailAddress') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="{{ $employer->emailAddress }}">
                            <label for="emailAddress">Email Address</label>
                            @if ($errors->has('emailAddress'))
                                <span class="help-block">
                                <strong>{{ $errors->first('emailAddress') }}</strong>
                            </span>
                            @else
                                <span class="help-block">Primary Contact Email...</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <button type="submit" class="btn btn-lg btn-success">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection

@section('scripts')

@endsection