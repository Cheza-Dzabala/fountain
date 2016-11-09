
@extends('layouts.master')

@section('title')
    F.M.F.S | Due Payment
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Due Payment Index
@endsection

@section('content')
    <div class="row widget-row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Due Payment Index</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                        <tr class="">
                            <th>Loan Type</th>
                            <th>client Name</th>
                            <th>Loan Amount</th>
                            <th>Payment Amount</th>
                            <th>Disbursement Date</th>

                            <th>Date Due</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($duePayments as $duePayment)
                            <tr>
                                <td>{{ $duePayment->loanType }}</td>
                                <td>{{ $duePayment->client }}</td>
                                <td>{{ number_format($duePayment->loanAmount , 2) }}</td>
                                <td>{{ number_format($duePayment->total , 2) }}</td>
                                <td>{{ $duePayment->disbursed }}</td>

                                <td>{{ $duePayment->settlementDate }}</td>
                                <td>
                                    <a>
                                        Mark
                                    </a>
                                    <a>
                                        View Loan
                                    </a>
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
