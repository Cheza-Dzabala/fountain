
@extends('layouts.master')

@section('title')
@endsection

@section('styles')
    <link href="{{ asset('../node_modules/viewer-master/viewer.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
   Settlement Details
@endsection

@section('content')
    <div class="row" style="align-content: center">

        <div class="portlet light  col-md-12 ">
            <div class="portlet-title">
                {{ $client->firstName.' '.$client->lastName }}'s Settlement
            </div>
            <div class="portlet-body form">
                <div class="row">


                    <div class="form-group">
                        <label class="control-label col-md-4">Date Payment Due:</label>
                        <div class="col-md-6">
                            {{ $settlement->settlementDate }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Date Payment Made:</label>
                        <div class="col-md-6">
                            {{ $settlement->settledOn }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Payment Method:</label>
                        <div class="col-md-6">
                            {{ $settlement->paymentType }}
                        </div>
                    </div>
                </div>

                @if($settlement->paymentType == 'cheque')
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">Cheque Number:</label>
                            <div class="col-md-6">
                                {{ $settlement->chequeNumber }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Receipt Number:</label>
                        <div class="col-md-6">
                            {{ $settlement->receiptNumber }}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Processed By:</label>
                        <div class="col-md-6">
                            {{ $user->name }}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Loan Amount:</label>
                        <div class="col-md-6">
                            {{ number_format($loan->loanAmount, 2) }}
                        </div>
                    </div>
                </div>

            </div>
                <!-- END ROW  -->


        </div>
            <!-- END ROW  -->
   </div>


@endsection

@section('scripts')
    <script src="{{ asset('/angular/controllers/clientProfileEdit.js') }}" type="text/javascript"></script>
    <script src="{{  asset('../node_modules/viewer-master/viewer.js') }}" type="text/javascript"></script>
    <script>
        $('.securityImages').viewer();
    </script>
@endsection