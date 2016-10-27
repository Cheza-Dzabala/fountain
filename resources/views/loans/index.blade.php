
@extends('layouts.master')

@section('title')
    F.M.F.S | Loans Index
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Loans Index
@endsection

@section('content')
    <div class="row widget-row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Loans Index <a href="{{ route('clients.new') }}">New</a></span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                        <tr class="">
                            <th> Client First Name </th>
                            <th> Client Last Name </th>
                            <th> Loan Type</th>
                            <th> Loan Amount</th>
                            <th> Date Applied </th>
                            <th> Security Value </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loans as $loan)
                            <tr>
                                <td>{{ $loan->firstName }}</td>
                                <td>{{ $loan->lastName }}</td>
                                <td>{{ $loan->loanTypeName }}</td>
                                <td>{{ number_format( $loan->loanAmount, 2 ) }}</td>
                                <td>{{ $loan->created_at }}</td>
                                <td>{{ number_format($loan->securityValue, 2) }}</td>
                                <td>{{ $loan->applicationStatus }}</td>
                                <td>
                                    <a href="{{ route('loan.view', $loan->id) }}" type="button" class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/pages/scripts/table-datatables-fixedheader.min.js') }}" type="text/javascript"></script>
@endsection
