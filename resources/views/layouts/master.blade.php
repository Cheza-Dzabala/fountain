<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="fountainMF">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">
    <link href="{{ asset('../assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- PAGE STYLES -->
    @yield('styles')
    <!-- PAGE STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('../assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('../assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('../assets/layouts/layout3/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/layouts/layout3/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('../assets/layouts/layout3/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                @include('partials.global.headers.topHeader')
                @include('partials.global.headers.menuHeader')
                <!-- END HEADER -->
            </div>
        </div>
    </div>
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>@yield('page-title') </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar" >
                                <div class="row" style="margin-top: 1%">
                                    <span href="javascript:;" class="btn dropdown-toggle darkCyan" data-toggle="dropdown">
                                        <h4>Quick Links | </h4>
                                    </span>
                                    <button type="button" class="btn blue-oleo">
                                        Apply For Loan
                                    </button>
                                    <button type="button" class="btn blue-hoki">
                                        Create Client Profile
                                    </button>
                                    <button type="button" class="btn blue-soft">
                                        Review Defaulted Loans
                                    </button>
                                    <button type="button" class="btn blue-steel">
                                        My Account Activity
                                    </button>
                                    <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- END PAGE TOOLBAR -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            @yield('content')
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                    @include('partials.global.quickSideBar')
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
            <!-- BEGIN PRE-FOOTER -->
            <div class="page-prefooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                            <h2>About</h2>
                            <p>Fountain Micro Finance Web System Interface Demo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PRE-FOOTER -->
            <!-- BEGIN INNER FOOTER -->
            <div class="page-footer">
                <div class="container"> 2016 &copy; Developed By
                    <a target="_blank" href="http://apptitudetech.net">Apptitude Tech Systems</a> &nbsp;|&nbsp;
                </div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
            <!-- END INNER FOOTER -->
            <!-- END FOOTER -->
        </div>
    </div>
</div>
<!--[if lt IE 9]>
<script src="{{ asset('../assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('../assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('../node_modules/angular/angular.js') }}" type="text/javascript"></script>




<script src="{{ asset('../assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->


<script src="{{ asset('/angular/app.js') }}" type="text/javascript"></script>

<!-- BEGIN PAGE PLUGINS -->
@yield('plugins')
        <!-- END CORE PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('../assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->


<!-- PAGE SCRIPTS -->
@yield('scripts')
        <!-- END PAGE SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('../assets/layouts/layout3/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/layouts/layout3/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->


</body>

</html>