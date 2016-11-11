@extends('layouts.master')

@section('title')
    F.M.F.S | Dashboard
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content')

     <div class="row widget-row">
        @include('partials.dashboard.dashboardTiles')
    </div>
    <div class="divider"></div>
        <!-- END LOAN APPLICATION STATUSES -->
        @permission('approve-loans')
            @include('partials.dashboard.applicationStatuses')
        @endpermission
       <!-- END LOAN APPLICATION STATUSES -->

    <div class="divider"></div>
    <div class="row">
        <!-- BEGIN DISBURSEMENT CHART-->
        <div class="col-md-6">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Disbursement Vs. Collection Rate</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div id="disburseVScollect" style="height:500px;"></div>
                </div>
            </div>
        </div>
        <!-- END DISBURSEMENT CHART-->

        <!-- BEGIN EXPENSES CHART-->
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-green-haze"></i>
                        <span class="caption-subject bold uppercase font-green-haze">Income Vs Expenditure</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="fullscreen"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="chart_1" class="chart" style="height: 500px;"> </div>
                </div>
            </div>
            <!-- END EXPENSES CHART-->
        </div>
    </div>
    <!-- END ROW -->
    <!-- BEGIN ROW -->
@endsection


@section('plugins')
    <script src="{{ asset('../assets/global/plugins/morris/morris.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajax({
                type: 'GET',
                url: 'api/loadCharts/',
                datatype: 'json',
                timeout: 10000,
                success: function(result){
                    console.log(result);
                    chart.setData(JSON.parse(result));
                },
                error: function(data){
                    console.log(data);
                }
            });


            var chart = Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'disburseVScollect',
                data: [0, 0], // Set initial data (ideally you would provide an array of default data)
                xkey: 'y', // Set the key for X-axis
                ykeys: ['a', 'b'], // Set the key for Y-axis
                labels: ['Disbursed', 'Collected'] // Set the label when bar is rolled over
            });





        });
    </script>

    <script src="{{ asset('../assets/pages/scripts/charts-amcharts.js') }}" type="text/javascript"></script>
@endsection
