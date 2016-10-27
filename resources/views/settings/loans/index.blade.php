
@extends('layouts.master')

@section('title')
    F.M.F.S |  Loan Types
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Loan Types
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
                            Loan Types |
                            <a data-toggle="modal" href="#newLoanType"> New</a>
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form">
                            <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                <thead>
                                <tr class="">
                                    <th> Loan Type Name </th>
                                    <th> Active Status</th>
                                    <th> Interest </th>
                                    <th> Requires Consent </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loanTypes as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        <td>@if($type->isActive == '1')Active @else Inactive @endif</td>
                                        <td>{{ $type->interestRate }} %</td>
                                        <td>@if($type->requiresEmployerConsent == '1') Yes @else No @endif</td>
                                        <td>
                                            <a href="{{ route('settings.loanType.delete', $type->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ route('settings.loanType.edit', $type->name) }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>

    <div class="modal fade" id="newLoanType"  tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('settings.loans.saveLoanType') }}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">New Loan Type</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('interestRate') ? ' has-error' : '' }}">
                            <label for="name">Interest Rate:</label>
                            <input type="text" name="interestRate" class="form-control" id="interestRate" placeholder="Interest Rate" required>
                            @if ($errors->has('interestRate'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('interestRate') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="name">Description:</label>
                            <textarea name="description" class="form-control"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('isActive') ? ' has-error' : '' }}">
                            <label>Active Status  </label>
                            <div class="mt-radio-list">
                                <label class="mt-radio"> Active
                                    <input type="radio" value="1" name="isActive" />
                                    <span></span>
                                </label>
                                <label class="mt-radio"> Inactive
                                    <input type="radio" value="0" name="isActive" />
                                    <span></span>
                                </label>
                            </div>
                            @if ($errors->has('isActive'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('isActive') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('requiresEmployerConsent') ? ' has-error' : '' }}">
                            <label>Requires Employer Consent </label>
                            <div class="mt-radio-list">
                                <label class="mt-radio"> Yes
                                    <input type="radio" value="1" name="requiresEmployerConsent" />
                                    <span></span>
                                </label>
                                <label class="mt-radio"> No
                                    <input type="radio" value="0" name="requiresEmployerConsent" />
                                    <span></span>
                                </label>
                            </div>
                            @if ($errors->has('requiresEmployerConsent'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('requiresEmployerConsent') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn green" value="Save changes">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection


@section('plugins')
    <script src="{{ asset('../assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection





@section('scripts')
    <script src="{{ asset('../assets/pages/scripts/ui-modals.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/pages/scripts/table-datatables-fixedheader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
@endsection
