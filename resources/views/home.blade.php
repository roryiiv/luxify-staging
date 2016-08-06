@extends('layouts.dashboard')


@section('head')
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="/db/css/pace-theme-flash.css">
    <script type="text/javascript" src="/db/js/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="/db/css/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="/db/css/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Toastr-->
    <link rel="stylesheet" type="text/css" href="/db/css/toastr.min.css">
    <!-- SpinKit-->
    <link rel="stylesheet" type="text/css" href="/db/css/7-three-bounce.css">
    <!-- Jvector Map-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery-jvectormap-2.0.3.css">
    <!-- Morris Chart-->
    <link rel="stylesheet" type="text/css" href="/db/css/morris.css">
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="/db/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/responsive.bootstrap.min.css">
    <!-- Weather Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/weather-icons-wind.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/weather-icons.min.css">
    <!-- FullCalendar-->
    <link rel="stylesheet" type="text/css" href="/db/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/fullcalendar.print.css" media="print">
    <!-- jQuery MiniColors-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.minicolors.css">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="/db/css/daterangepicker.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
@endsection

@section('content')
    <div class="page-container">
        <div class="page-header clearfix">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mt-0 mb-5">Welcome to Luxify</h4>
                    <p class="text-muted mb-0">Dealer Portal</p>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group mt-5">
                        <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <!--
                        <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                            <li><a href="index.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
                            <li><a href="index.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
                            <li><a href="index.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
                            <li><a href="index.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
                            <li><a href="index.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
                        </ul>
-->
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content container-fluid">

            <div class="row">
                <div class="col-lg-9">
                    <div class="col-lg-12">
                        <div class="widget clear">
                            <h3 class="widget-title pull-left">Items Traffic</h3>
                            <br></br>
                            <div class="widget-body">
                                <div class="clearfix">
                                    <div id="flot-visitor-legend" class="pull-left"></div>
                                    <div class="pull-right">
                                        <div class="btn-toolbar">
                                            <button id="daterangepicker" type="button" class="btn btn-raised btn-black"><i class="ti-calendar"> </i><span></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="flot-visitor" style="height: 300px"></div>
                                <div class="row row-0 mt-10 text-center">
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600">45.87M</div>
                                        <h5 class="m-0">Overall Visitors <span class="text-danger"><i class="ti-arrow-down fs-13"></i> 2.43%</span></h5>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600">15:32</div>
                                        <h5 class="m-0">Avg. Visit Duration <span class="text-success"><i class="ti-arrow-up fs-13"></i> 12.54%</span></h5>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600">115.65</div>
                                        <h5 class="m-0">Item/Visit <span class="text-success"><i class="ti-arrow-up fs-13"></i> 5.62%</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <div class="mb-30">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading">Total Visitors <span class="text-success"><i class="ti-arrow-up fs-13"></i> 5.28%</span></h5>
                                        <div class="fs-36 fw-600 counter">650</div>
                                    </div>
                                    <div class="media-right"><i class="fs-30 ti-user"></i></div>
                                </div>
                                <div id="flot-order" style="height: 74px"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4">
                            <div class="mb-30">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading">Total Inquiries <span class="text-danger"><i class="ti-arrow-down fs-13"></i> 1.06%</span></h5>
                                        <div class="fs-36 fw-600"><span class="counter">20320</span></div>
                                    </div>
                                    <div class="media-right"><i class="fs-30 ti-email"></i></div>
                                </div>
                                <div id="flot-revenue" style="height: 74px"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4">
                            <div class="mb-30">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading">Total Products <span class="text-danger"><i class="ti-arrow-down fs-13"></i> 3.76%</span></h5>
                                        <div class="fs-36 fw-600 counter">278</div>
                                    </div>
                                    <div class="media-right"><i class="fs-30 ti-shopping-cart"></i></div>
                                </div>
                                <ul class="list-unstyled">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery-->
    <script type="text/javascript" src="/db/js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="/db/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="/db/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="/db/js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="/db/js/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="/db/js/jquery.easypiechart.min.js"></script>
    <!-- Toastr-->
    <script type="text/javascript" src="/db/js/toastr.min.js"></script>
    <!-- MomentJS-->
    <script type="text/javascript" src="/db/js/moment.min.js"></script>
    <!-- jQuery BlockUI-->
    <script type="text/javascript" src="/db/js/jquery.blockUI.js"></script>
    <!-- jQuery Counter Up-->
    <script type="text/javascript" src="/db/js/waypoints.min.js"></script>
    <script type="text/javascript" src="/db/js/jquery.counterup.min.js"></script>
    <!-- Jvector Map-->
    <script type="text/javascript" src="/db/js/jquery-jvectormap-2.0.3.min.js"></script>
    <script type="text/javascript" src="/db/js/jquery-jvectormap-world-mill.js"></script>
    <!-- Flot Charts-->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="https://raw.githubusercontent.com/flot/flot/master/excanvas.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/db/js/jquery.flot.js"></script>
    <script type="text/javascript" src="/db/js/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="/db/js/curvedLines.js"></script>
    <script type="text/javascript" src="/db/js/jquery.flot.tooltip.min.js"></script>
    <!-- Morris Chart-->
    <script type="text/javascript" src="/db/js/raphael-min.js"></script>
    <script type="text/javascript" src="/db/js/morris.min.js"></script>
    <!-- DataTables-->
    <script type="text/javascript" src="/db/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/db/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="/db/js/jszip.min.js"></script>
    <script type="text/javascript" src="/db/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/db/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/db/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/db/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/db/js/responsive.bootstrap.js"></script>
    <!-- jQuery UI-->
    <script type="text/javascript" src="/db/js/jquery-ui.min.js"></script>
    <!-- FullCalendar-->
    <script type="text/javascript" src="/db/js/fullcalendar.min.js"></script>
    <!-- jQuery MiniColors-->
    <script type="text/javascript" src="/db/js/jquery.minicolors.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="/db/js/daterangepicker.js"></script>
    <!-- Nifty Modal Window Effects-->
    <script type="text/javascript" src="/db/js/classie.js"></script>
    <script type="text/javascript" src="/db/js/modalEffects.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/index.js"></script>
    <script type="text/javascript" src="/db/js/widgets.js"></script>
@endsection
