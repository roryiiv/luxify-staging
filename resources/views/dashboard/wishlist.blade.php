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
    <link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="/db/css/daterangepicker.css">
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="/db/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/responsive.bootstrap.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-markdown.min.css">
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@lang('dashboard.wishlist_list')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">@lang('dashboard.wishlist_saved')</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6" >
                        @include('inc.set-lang-dashboard-panel')
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">@lang('dashboard.wishlist_list1')</h3>
                    </div>
                    <div class="widget-body">
                        <form id="wishlist" name="wishlist" method="get">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="txtProductName">@lang('dashboard.wishlist_name')</label>
                                        <input id="txtProductName" name="txtProductName" type="text" class="form-control" value="{{isset($_GET['txtProductName']) ? $_GET['txtProductName'] : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtPrice">@lang('dashboard.wishlist_price')</label>
                                        <input id="txtPrice" name="txtPrice" type="text" class="form-control" value="{{isset($_GET['txtPrice']) ? $_GET['txtPrice'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="startDate">@lang('dashboard.wishlist_date')</label>
                                        <input id="startDate" name="startDate" type="text" class="form-control" value="{{isset($_GET['startDate']) ? $_GET['startDate'] : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlStatus">@lang('dashboard.wishlist_status')</label>
                                        <select id="ddlStatus" name="status" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="ACTIVE">Active</option>
                                            <option value="SOLD">Sold</option>
                                            <option value="EXPIRED">Expired</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mb-20">
                                <button type="submit" class="btn btn-lg btn-raised btn-success">@lang('dashboard.wishlist_filter')</button>
                            </div>
                        </form>
                        <div id="product-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="product-list_length">
                                        <form id="sorter" name="sorter" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                                            <label>@lang('dashboard.wishlist_show')
                                            <select id="view" name="view-perpage" aria-controls="product-list" class="form-control input-sm">
                                                <option value="10"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],10) : ''}}>10</option>
                                                <option value="20"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],20) : ''}}>20</option>
                                                <option value="50"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],50) : ''}}>50</option>
                                                {{-- <option value="-1"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],-1) : ''}}>All</option> --}}
                                            </select>
                                            @lang('dashboard.wishlist_entries')</label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="wish-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="checkbox-custom">
                                                        <input id="checkAll" type="checkbox" value="option1">
                                                        <label for="checkAll" class="pl-0">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>@lang('dashboard.wishlist_image')</th>
                                                <th>@lang('dashboard.wishlist_proname')</th>
                                                <th>@lang('dashboard.wishlist_date1')</th>
                                                <th class="text-right">Price</th>
                                                {{-- <th class="text-right">@lang('dashboard.wishlist_quantity')</th> --}}
                                                <th style="display: block;">@lang('dashboard.wishlist_status')</th>
                                                <th class="text-center">@lang('dashboard.wishlist_action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0; $i < count($wishes); $i++)
                                                <tr id="{{ $wishes[$i]->id }}">
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="product-{{$i}}" type="checkbox" value="{{$i}}">
                                                            <label for="product-{{$i}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><img src="{{func::img_url($wishes[$i]->mainImageUrl, 50, 50)}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                                                    <td style="width: 25%;">{{$wishes[$i]->title}}</td>
                                                    <td>{{date("Y-m-d H:i:s", strtotime($wishes[$i]->createdAt))}}</td>
                                                    <td class="text-right">${{number_format($wishes[$i]->price, 2)}}</td>
                                                    {{-- <td class="text-right">320</td> --}}
                                                    <td><span class="label label-default">{{$wishes[$i]->status}}</span></td>
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <a target="_blank" href="/listing/{{ $wishes[$i]->slug }}" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                            <a href="javascript:;" data-id="{{ $wishes[$i]->id }}" class="btn btn-outline btn-danger remove-wishlist"><i class="ti-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="product-list_info" role="status" aria-live="polite">
                                        @lang('dashboard.wishlist_showing') {{ $wishes->firstItem() }} @lang('dashboard.wishlist_to') {{ $wishes->count() }} @lang('dashboard.wishlist_of') {{ $wishes->total() }} @lang('dashboard.wishlist_entries1')
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="product-list_paginate">
                                        {{ $wishes->links() }}
                                    </div>
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
    <!-- MomentJS-->
    <script type="text/javascript" src="/db/js/moment.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="/db/js/daterangepicker.js"></script>
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
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/product-list.js"></script>
    <script type="text/javascript" src="/db/js/date-range-picker.js"></script>
    {{ csrf_field() }}
    <link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
    <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
    <script>
    $(document).ready(function(){
        $('a.remove-wishlist').each(function(){
            $('#startDate').val('');
            $(this).click(function(event){
                // return false; // remove this later after database fixes.
                // event.preventDefault();
                var url = '/dashboard/wishlist/delete', itemID = $(this).attr('data-id'), userID = {{ Auth::user()->id }}, token = $('input[name=_token]').val();
                // console.log(token);
                var data = {uid: userID, lid: itemID};
                swal({
                    title: "Delete item",
                    text: "Are you sure you want to delete item from Wishlist?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                },
                function(){
                    $.ajax({
                        type: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': token},
                        data: data,
                        dataType: "html",
                        success: function(data){
                            // console.log(data); return false;
                            if(data == 3){
                                swal("Item is deleted!");
                                $('tr#'+itemID).remove();
                            }else{
                                swal("Error!");
                            }
                        },
                        error: function(errMsg){
                            console.log(errMsg.responseText);
                        }
                    });
                });
            });
        });
    });
    </script>
@endsection
