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
       <!-- BEGIN WIDGET -->
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Current DISBURSED</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">MWK</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">760,000</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <!-- END WIDGET -->

        <!-- BEGIN WIDGET -->
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Current Defaulted</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">MWK</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">350,000</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <!-- END WIDGET -->

          <!-- BEGIN WIDGET -->
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Biggest EXPENSE</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">MWK</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">120,000</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <!-- END WIDGET -->

        <!-- BEGIN WIDGET -->
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Average Monthly Expense</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">MWK</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">72,000</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <!-- END WIDGET -->
    </div>
    <div class="divider"></div>
        <!-- END LOAN APPLICATION STATUSES -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-bubbles font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">YOUR LOAN APPLICATIONS</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_comments_1" data-toggle="tab"> Pending </a>
                            </li>
                            <li>
                                <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_comments_1">
                                <!-- BEGIN: Comments -->
                                <div class="mt-comments">
                                    <div class="mt-comment">
                                        <div class="mt-comment-img">
                                            <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                        <div class="mt-comment-body">
                                            <div class="mt-comment-info">
                                                <span class="mt-comment-author">John Doe | MWK 500,000</span>
                                                <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                            </div>
                                            <div class="mt-comment-text">Importing Textiles. </div>
                                            <div class="mt-comment-details">
                                                <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                <ul class="mt-comment-actions">
                                                    <li>
                                                        <a href="#">Quick Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-comment">
                                        <div class="mt-comment-img">
                                            <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                        <div class="mt-comment-body">
                                            <div class="mt-comment-info">
                                                <span class="mt-comment-author">JANE DOE | MWK 250,000</span>
                                                <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                            </div>
                                            <div class="mt-comment-text"> Vehicle Service Loan. </div>
                                            <div class="mt-comment-details">
                                                <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                <ul class="mt-comment-actions">
                                                    <li>
                                                        <a href="#">Quick Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Comments -->
                            </div>
                            <div class="tab-pane" id="portlet_comments_2">
                                <!-- BEGIN: Comments -->
                                NO APPROVED LOAN APPLICATIONS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            new Morris.Bar({
                element: 'disburseVScollect',
                data: [
                    {y: 'January', a: 4000000, b: 3500000},
                    {y: 'February', a: 2750000, b: 1000500},
                    {y: 'March', a: 3750000, b: 3750000},
                    {y: 'April', a: 4500000, b: 4250000},
                    {y: 'May', a: 4000000, b: 4000000},
                    {y: 'June', a: 4000000, b: 3255800},
                    {y: 'July', a: 3540000, b: 2100000},
                    {y: 'August', a: 3400000, b: 2750000},
                    {y: 'September', a: 3500000, b: 3250000},
                    {y: 'October', a: 1750000, b: 900000},
                    {y: 'November', a: 2310000, b: 2000000},
                    {y: 'December', a: 4500000, b: 3410000}
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Disbursed', 'Collected']
            });
        });
    </script>

    <script src="{{ asset('../assets/pages/scripts/charts-amcharts.js') }}" type="text/javascript"></script>
@endsection
