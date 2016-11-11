
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
                            <th>Settlement</th>
                            <th>Payment Amount</th>
                            <th>Disbursement Date</th>
                            <th>Date Due</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->loanType }}</td>
                                <td>{{ $payment->clientName }}</td>
                                <td>
                                    @if($payment->isSettled == 0)
                                        <span style="color: darkred">Unsettled</span>
                                    @else
                                        <span style="color: darkgreen">Settled</span>
                                    @endif
                                </td>
                                <td>{{ number_format($payment->total , 2) }}</td>
                                <td>{{ $payment->disbursementDate }}</td>

                                <td>{{ $payment->settlementDate }}</td>
                                <td>
                                    @if($payment->isSettled == 0)
                                    <a data-toggle="modal" href="#markPaid" class="btn blue-hoki">
                                        Mark As Paid
                                    </a>
                                    @endif
                                    <a href="{{ route('loan.view', $payment->loanId) }}" class="btn blue-hoki">
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


    <div class="modal fade bs-modal-lg" id="markPaid" tabindex="-1" role="dialog" aria-hidden="true">
        <form action="{{ route('payments.save') }}" method="post">
            {{ csrf_field() }}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Mark  {{ $payment->clientName.'\'s' }} installment As Paid</h4>
                </div>

                <div class="modal-body">

                    Installment Amount: {{ number_format($payment->total , 2)}}
                    <br/>
                    <hr>
                    <input type="hidden" name="id" value="{{ $payment->id }}">

                        <div class="form-group form-md-radios has-success">
                            <label for="form_control_1">Payment Method</label>
                            <div class="md-radio-list">
                                <div class="md-radio">
                                    <input type="radio" id="checkbox2_6" value="cash" name="paymentType" class="md-radiobtn" checked="">
                                    <label for="checkbox2_6">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Cash </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="checkbox2_7" value="cheque" name="paymentType" class="md-radiobtn" >
                                    <label for="checkbox2_7">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Cheque </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input type="text" class="form-control" id="form_control_1" name="chequeNumber">
                            <label for="form_control_1">Cheque Number</label>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input type="text" class="form-control" id="form_control_1" name="receiptNumber">
                            <label for="form_control_1">Receipt Number</label>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/pages/scripts/table-datatables-fixedheader.min.js') }}" type="text/javascript"></script>
@endsection
