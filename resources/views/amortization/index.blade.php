
@extends('layouts.master')

@section('title')
@endsection

@section('styles')
    <link href="{{ asset('../node_modules/viewer-master/viewer.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    AMORTIZATION SCHEDULE
@endsection

@section('content')
    <div class="row" style="align-content: center">

        <div class="portlet light  col-md-12 ">
            <div class="portlet-title">

            </div>
            <div class="portlet-body form">
                <div class="row">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                            <tr class="">
                                <th> Payment Number </th>
                                <th> Payment Date </th>
                                <th> Starting Balance</th>
                                <th> Principle  </th>
                                <th> Interest Rate</th>
                                <th> Total Payment </th>
                                <th> Settlement Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                            @foreach($schedules as $schedule )
                                <tr @if($schedule->current == '1') style="background-color: #0a001f; color: #ffffff" @endif>
                                    <td>{{ $i }}</td>
                                    <td>{{  $schedule->settlementDate }}</td>
                                    <td>{{  number_format($schedule->balance, 2 )}}</td>
                                    <td>{{ number_format($schedule->principle , 2)}}</td>
                                    <td>{{  number_format($schedule->interest, 2) }}</td>
                                    <td>{{  number_format($schedule->total, 2) }}</td>
                                    <td>@if($schedule->isSettled == 1)
                                            <span style="color: darkgreen">Settled</span>
                                        @else
                                            <span style="color: red"> Unsettled </span>
                                        @endif
                                        @if($schedule->isDefauled == 1)
                                                <span style="color: red"> (Defaulted) </span>
                                         @endif
                                    </td>
                                    <td>
                                        @if($schedule->isSettled == 0)
                                          @if($schedule->settlementDate <= (\Carbon\Carbon::now()->toDateString()))
                                                <a href="{{ route('mark_defaulted', [$schedule->id, $schedule->loanId]) }}">
                                                    Mark As Defaulted
                                                </a>
                                           @elseif(
                                                    $schedule->settlementDate >= (\Carbon\Carbon::now()->toDateString())
                                                        &&
                                                    $schedule->settlementDate <= (\Carbon\Carbon::now()->addMonths(1)->toDateString())
                                                    )
                                                <a href="{{ route('mark_paid', [$schedule->id, $schedule->loanId]) }}">
                                                    Mark As Paid
                                                </a>
                                           @endif
                                        @else
                                            <a href="{{ route('payments.details', $schedule->id) }}">Settlement Details</a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END ROW  -->
            </div>
            <!-- END ROW  -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/angular/controllers/clientProfileEdit.js') }}" type="text/javascript"></script>
    <script src="{{  asset('../node_modules/viewer-master/viewer.js') }}" type="text/javascript"></script>
    <script>
        $('.securityImages').viewer();
    </script>
@endsection