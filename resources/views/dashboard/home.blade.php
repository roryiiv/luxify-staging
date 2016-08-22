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
                                <div id="flot-visitor" style="height: 300px"></div>
                                <div class="row row-0 mt-10 text-center">
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600 visitorget">{{$visitor_m}}</div>
                                        <h5 class="m-0">Overall Visitors {!!$pr_visitor!!}</h5>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600">15:32</div>
                                        <h5 class="m-0">Avg. Visit Duration <span class="text-success"><i class="ti-arrow-up fs-13"></i> 12.54%</span></h5>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="fs-30 fw-600 itempervisit">{{ $total_product !== 0 ? $visitor_m/$total_product: 0}}</div>
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
                                        <div class="fs-36 fw-600 counter">{{$visitor_all}}</div>
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
                                        <div class="fs-36 fw-600"><span class="counter">{{$wishlists}}</span></div>
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
                                        <div class="fs-36 fw-600 counter">{{$total_product  }}</div>
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
    <!--
    disable index.js
    <script type="text/javascript" src="/db/js/index.js"></script>-->
    <script>
        $(document).ready(function() {
            //ajax first load for flotchart 12month
            loadajaxflotchart();

            function loadajaxflotchart(){
            d = [[0, 0]],
           /* m =data_ticks,*/
            h = [{
                label: "New/Old visitors",
                data: d,
                color: "#988866",
                lines: {
                    show: !0,
                    fill: .9,
                    lineWidth: 0
                },
                curvedLines: {
                    apply: !0,
                    monotonicFit: !0
                }
            }],
            g = {
                series: {
                    curvedLines: {
                        active: !0
                    },
                    shadowSize: 0
                },
                grid: {
                    borderWidth: 0,
                    hoverable: !0,
                    labelMargin: 15
                },
                yaxis: {
                    tickLength: 0,
                    font: {
                        color: "#9a9a9a",
                        size: 11
                    }
                },
                tooltip: {
                    show: !1
                },
                legend: {
                    show: !0,
                    container: $("#flot-visitor-legend"),
                    noColumns: 4,
                    labelBoxBorderColor: "#FFF",
                    margin: 0
                }
            };
                $.plot($("#flot-visitor"), h, g), $("#flot-visitor").bind("plothover", function(e, t, a) {
                    a ? $(".flotTip").text(a.datapoint[1].toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " visitors").css({
                        top: a.pageY + 15,
                        left: a.pageX + 10
                    }).show() : $(".flotTip").hide()
                });


           $("#flot-visitor").append('<span style="position: absolute; width: 100%; height: 100%; text-align: center; font-size: 18px; background: rgba(255, 255, 255, 0.6) none repeat scroll 0% 0%; padding-top: 10%;" class="flot_loading"><img style="width: 110px;" src="{{url("/img/spin.gif")}}"><span style="position: relative; margin-left: -35px;">Loading...</span></span>'),
        $('.flot_loading').show();
        year = moment().year();
            $.ajax({
                url:'{{route("get_json_flot_year")}}/'+year,
                async : false,
                cache : false,
                success : function(html){
                    $('.flot_loading').hide();
                    if(checkjson(html)){
                        redrawflotchart(html)
                    }else{
                        errorflotchart(html)
                    }
                },
                error: function(xhr, status, html) {
                    $('.flot_loading').hide();
                    if(checkjson(html)){
                        redrawflotchart(html)
                    }else{
                        errorflotchart(html)
                    }
                }
            });
            }
            //check is_json for flotchart
            function checkjson(html) {
                try {
                    JSON.parse(html);
                } catch (e) {
                    return false;
                }
                return true;
            }            
            function redrawflotchart(html) {
                var json_data = JSON.parse(html);
                status = json_data.status;
                if(status!='true'){
                    alert('error');
                }else{
                    d = JSON.parse(json_data.data);
                var h = [{
                    label: "New/Old visitors",
                    data: d,
                    color: "#988866",
                    lines: {
                        show: !0,
                        fill: .9,
                        lineWidth: 0
                    },
                    curvedLines: {
                        apply: !0,
                        monotonicFit: !0
                    }
                }],
                g = {
                    series: {
                        curvedLines: {
                            active: !0
                        },
                        shadowSize: 0
                    },
                    grid: {
                        borderWidth: 0,
                        hoverable: !0,
                        labelMargin: 15
                    },
                    xaxis: {
                            ticks: JSON.parse(json_data.tick),
                            tickLength: 0,
                            font: {
                                color: "#9a9a9a",
                                size: 11
                            }
                    },
                    yaxis: {
                        tickLength: 0,
                        // tickSize: 1e6,
                        font: {
                            color: "#9a9a9a",
                            size: 11
                        }
                        /* ,
                        tickFormatter: function(e, t) {
                            return e > 0 ? (e / 1e6).toFixed(t.tickDecimals) + " M" : (e / 1e6).toFixed(t.tickDecimals)
                        } */                
                    },
                    tooltip: {
                        show: !1
                    },
                    legend: {
                        show: !0,
                        container: $("#flot-visitor-legend"),
                        noColumns: 4,
                        labelBoxBorderColor: "#FFF",
                        margin: 0
                    }
                }
                $.plot($("#flot-visitor"), h, g);
                $(".visitorget").html(json_data.total);
                $(".itempervisit").html(json_data.itempervisit);
                }

            }
            function e() {
                $("#addNewEvent").modal("hide"), $("#fullcalendar").fullCalendar("renderEvent", {
                    title: $("#inputTitleEvent").val(),
                    start: new Date($("#start").val()),
                    end: new Date($("#end").val()),
                    color: $("#inputBackgroundEvent").val()
                }, !0)
            }
            var n = [{!!$get_vm!!}],
                o = [{
                    label: "Visitors",
                    data: n,
                    color: "#988866"
                }],
                r = {
                    series: {
                        lines: {
                            show: !0,
                            lineWidth: 1
                        },
                        points: {
                            show: !0,
                            lineWidth: 0,
                            fill: !0,
                            fillColor: "#988866"
                        },
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: !0,
                        borderWidth: 0
                    },
                    xaxis: {
                        ticks: 0
                    },
                    yaxis: {
                        ticks: 0
                    },
                    tooltip: {
                        show: !0,
                        content: "%s: %y",
                        defaultTheme: !1
                    },
                    legend: {
                        show: !1
                    }
                };
            $.plot($("#flot-order"), o, r);
            var i = [{!!$get_ws!!}
                ],
                l = [{
                    label: "Inquiries",
                    data: i,
                    color: "#988866"
                }],
                s = {
                    series: {
                        lines: {
                            show: !0,
                            lineWidth: 1
                        },
                        points: {
                            show: !0,
                            lineWidth: 0,
                            fill: !0,
                            fillColor: "#988866"
                        },
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: !0,
                        borderWidth: 0
                    },
                    xaxis: {
                        ticks: 0
                    },
                    yaxis: {
                        ticks: 0
                    },
                    tooltip: {
                        show: !0,
                        content: "%s: %y",
                        defaultTheme: !1
                    },
                    legend: {
                        show: !1
                    }
                };
                $.plot($("#flot-revenue"), l, s);
            $("#daterangepicker").daterangepicker({
        ranges: {
            'Last 3 Days': [moment().subtract("days", 2), moment()],
            "Last 7 Days": [moment().subtract("days", 6), moment()],
            "Last 30 Days": [moment().subtract("days", 29), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
        },
        opens: "left",
        //startDate: moment().subtract(29, "days"),
        startDate: moment().startOf('year'),
        endDate: moment().endOf('year'),
        applyClass: "btn-raised btn-black",
        cancelClass: "btn-raised btn-default"
    },
    function(e, t, a) {
        //additional check date
        $("#flot-visitor").append('<span style="position: absolute; width: 100%; height: 100%; text-align: center; font-size: 18px; background: rgba(255, 255, 255, 0.6) none repeat scroll 0% 0%; padding-top: 10%;" class="flot_loading"><img style="width: 110px;" src="{{url("/img/spin.gif")}}"><span style="position: relative; margin-left: -35px;">Loading...</span></span>'),
        $('.flot_loading').show();
        d_start = e.format("YYYY-MM-D"),
        d_end = t.format("YYYY-MM-D"),
            $.ajax({
                url:'{{route("get_json_flot")}}/'+d_start+'/'+d_end,
                async : false,
                cache : false,
                success : function(html){
                    $('.flot_loading').hide();
                    if(checkjson(html)){
                        redrawflotchart(html)
                    }else{
                        errorflotchart(html)
                    }
                },
                error: function(xhr, status, html) {
                    $('.flot_loading').hide();
                    if(checkjson(html)){
                        redrawflotchart(html)
                    }else{
                        errorflotchart(html)
                    }
                }
            });
        $("#daterangepicker span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
    }), $("#daterangepicker span").html('This Year'), Morris.Donut({
        element: "morris-browser",
        data: [{
            label: "Chrome",
            value: 40
        }, {
            label: "Firefox",
            value: 35
        }, {
            label: "IE",
            value: 25
        }],
        resize: !0,
        colors: ["#1F364F", "#0667D6", "#E6E6E6"],
        formatter: function(e) {
            return e + "%"
        }
    }), $("#esp-comment").easyPieChart({
        barColor: "#8E23E0",
        trackColor: "#E6E6E6",
        scaleColor: !1,
        scaleLength: 0,
        lineCap: "round",
        lineWidth: 10,
        size: 140,
        animate: {
            duration: 2e3,
            enabled: !0
        }
    }), $("#esp-photo").easyPieChart({
        barColor: "#0667D6",
        trackColor: "#E6E6E6",
        scaleColor: !1,
        scaleLength: 0,
        lineCap: "round",
        lineWidth: 10,
        size: 140,
        animate: {
            duration: 2e3,
            enabled: !0
        }
    }), $("#esp-user").easyPieChart({
        barColor: "#17A88B",
        trackColor: "#E6E6E6",
        scaleColor: !1,
        scaleLength: 0,
        lineCap: "round",
        lineWidth: 10,
        size: 140,
        animate: {
            duration: 2e3,
            enabled: !0
        }
    }), $("#esp-feedback").easyPieChart({
        barColor: "#E5343D",
        trackColor: "#E6E6E6",
        scaleColor: !1,
        scaleLength: 0,
        lineCap: "round",
        lineWidth: 10,
        size: 140,
        animate: {
            duration: 2e3,
            enabled: !0
        }
    });
    var u = $("#order-table").DataTable({
        lengthChange: !1,
        pageLength: 5,
        colReorder: !0,
        buttons: ["copy", "excel", "pdf", "print"],
        language: {
            search: "",
            searchPlaceholder: "Search records"
        }
    });
    u.buttons().container().appendTo("#order-table_wrapper .col-sm-6:eq(0)"), $(".draggable li").each(function() {
        $(this).data("event", {
            title: $.trim($(this).text()),
            stick: !0
        }), $(this).draggable({
            zIndex: 999,
            revert: !0,
            revertDuration: 0
        })
    }), $("#fullcalendar").fullCalendar({
        header: {
            left: "prev,next",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        buttonIcons: {
            prev: " ti-angle-left",
            next: " ti-angle-right"
        },
        defaultDate: "2016-03-15",
        editable: !0,
        droppable: !0,
        selectable: !0,
        select: function(e, t, a) {
            $("#start").val(moment(e).format("YYYY/MM/DD hh:mm a")), $("#end").val(moment(t).format("YYYY/MM/DD hh:mm a")), $("#inputTitleEvent").val(""), $("#addNewEvent").modal("show")
        },
        eventColor: "#0667D6",
        eventLimit: !0,
        events: [{
            title: "All Day Event",
            start: "2016-03-18",
            color: "#8E23E0"
        }, {
            title: "Long Event",
            start: "2016-03-07",
            end: "2016-03-10",
            color: "#E5343D"
        }, {
            id: 999,
            title: "Repeating Event",
            start: "2016-03-28T16:00:00",
            color: "#FFB61E"
        }, {
            id: 999,
            title: "Repeating Event",
            start: "2016-03-16T16:00:00",
            color: "#FFB61E"
        }, {
            title: "Conference",
            start: "2016-03-11",
            end: "2016-03-13",
            color: "#17A88B"
        }, {
            title: "Meeting",
            start: "2016-03-12T10:30:00",
            end: "2016-03-12T12:30:00",
            color: "#0667D6"
        }, {
            title: "Lunch",
            start: "2016-03-12T12:00:00",
            color: "#1F364F"
        }, {
            title: "Meeting",
            start: "2016-03-12T14:30:00",
            color: "#E5343D"
        }, {
            title: "Happy Hour",
            start: "2016-03-12T17:30:00",
            color: "#888888"
        }, {
            title: "Dinner",
            start: "2016-03-12T20:00:00",
            color: "#0667D6"
        }, {
            title: "Birthday Party",
            start: "2016-03-13T07:00:00",
            color: "#8E23E0"
        }, {
            title: "Click for Google",
            url: "http://google.com/",
            start: "2016-03-28",
            color: "#0667D6"
        }],
        drop: function() {
            $("#drop-remove").is(":checked") && $(this).remove()
        }
    }), $("#btnAddNewEvent").on("click", function(t) {
        t.preventDefault(), e()
    }), $("#inputBackgroundEvent").minicolors({
        theme: "bootstrap"
    });
    var p = [
            [0, 75],
            [1, 69],
            [2, 64],
            [3, 65],
            [4, 78],
            [5, 77],
            [6, 75],
            [7, 68],
            [8, 64],
            [9, 62],
            [10, 67],
            [11, 75],
            [12, 73],
            [13, 68],
            [14, 75],
            [15, 72],
            [16, 73],
            [17, 62],
            [18, 76],
            [19, 74],
            [20, 64],
            [21, 77],
            [22, 80],
            [23, 71]
        ],
        f = [{
            label: "F",
            data: p,
            color: "#fff"
        }],
        v = {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 2
                },
                points: {
                    show: !0,
                    lineWidth: 4
                },
                shadowSize: 0
            },
            grid: {
                hoverable: !0,
                borderWidth: 0
            },
            xaxis: {
                ticks: 0
            },
            yaxis: {
                ticks: 0
            },
            tooltip: {
                show: !0,
                content: "%y %s",
                defaultTheme: !1
            },
            legend: {
                show: !1
            }
        };
    $.plot($("#flot-weather"), f, v)
});

    </script>

    <script type="text/javascript" src="/db/js/widgets.js"></script>

@endsection
