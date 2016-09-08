@extends('layouts.panel')

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
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="/db/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/responsive.bootstrap.min.css">
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
                        <h4 class="mt-0 mb-5">@lang('panel.optional_list')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">@lang('panel.optional_list_admin')</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        @include('inc.set-lang-dashboard-panel')
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">@lang('panel.optional_list1')</h3>
                    </div>
                    <div class="widget-body">
                      <form id="categories" name="categories" method="get" action="{{func::set_url('/panel/categories')}}">
                        <div id="product-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="product-list_length">
                                        <form id="sorter" name="sorter" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                                            <label>@lang('panel.optional_list_show')
                                            <select id="view" name="view-perpage" aria-controls="category-list" class="form-control input-sm">
                                                <option value="10"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],10) : ''}}>10</option>
                                                <option value="20"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],20) : ''}}>20</option>
                                                <option value="50"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],50) : ''}}>50</option>
                                                {{-- <option value="-1"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],-1) : ''}}>All</option> --}}
                                            </select>
                                            @lang('panel.optional_list_entries')
                                            </label>
                                        </form>
                                        </br>
                                        <td>@lang('panel.optional_list_showing') {{ $optionfields->count() }} @lang('panel.optional_list_of') {{ $optionfields->total() }} @lang('panel.optional_list_entries1')</td>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="api-customer-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="checkbox-custom">
                                                        <input id="checkAll" type="checkbox" value="option1">
                                                        <label for="checkAll" class="pl-0">&nbsp;</label>
                                                    </div>
                                                </th>
                                                
                                                <th>@lang('panel.optional_list_title')</th>
                                                <th>@lang('panel.optional_list_name')</th>
                                                <th>@lang('panel.optional_list_label')</th>
                                                <th>@lang('panel.optional_list_type')</th>
                                                <!-- <th>Values</th> -->
                                                <th>Placeholder</th>
                                                <th class="text-center">@lang('panel.optional_list_action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($optionfields as $option)
                                                <tr>
                                                
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="optional-{{$option->id}}" name="selectedIds[]" type="checkbox" value="{{$option->id}}">
                                                            <label for="optional-{{$option->id}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>{{$option->title}}</td>
                                                    <td>{{$option->name}}</td>
                                                    <td>{{$option->label}}</td>
                                                    <td>{{$option->meta_type}}</td>
                                                    <!-- <td>{{$option->optionValues}}</td> -->
                                                    <td>{{$option->placeholder}}</td>
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <a href="{{func::set_url('/panel/optional-fields/edit/'.$option->id)}}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                            <a href="{{func::set_url('/panel/optional-fields/delete/'.$option->id)}}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
                                                        </div>
                                                    </td>   
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                
                                <div class="col-sm-3">
                                    <div class="dataTables_info" id="category-list_info" role="status" aria-live="polite">
                                        @lang('panel.optional_list_showing1') {{ $optionfields->count() }} @lang('panel.optional_list_of1') {{ $optionfields->total() }} @lang('panel.optional_list_entries2')
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="category-list_paginate">
                                        {{ $optionfields->links() }}
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
    <!-- MomentJS-->
    <script type="text/javascript" src="/db/js/moment.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="/db/js/daterangepicker.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/customer-list.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#view').change(function(){
            $('form').submit();
        });
    });
    </script>
   
@endsection
