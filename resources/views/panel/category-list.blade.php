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
                        <h4 class="mt-0 mb-5">@lang('panel.category_list')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">@lang('panel.category_list_admin')</a></li>
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
                        <h3 class="widget-title">@lang('panel.category_list1')</h3>
                    </div>
                    <div class="widget-body">
                      <form id="categories" name="categories" method="get" action="/panel/categories">
                        <div id="product-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="product-list_length">
                                        <form id="sorter" name="sorter" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                                            <label>@lang('panel.category_list_show')
                                            <select id="view" name="view-perpage" aria-controls="category-list" class="form-control input-sm">
                                                <option value="10"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],10) : ''}}>10</option>
                                                <option value="20"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],20) : ''}}>20</option>
                                                <option value="50"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],50) : ''}}>50</option>
                                                {{-- <option value="-1"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],-1) : ''}}>All</option> --}}
                                            </select>
                                            @lang('panel.category_list_entries')
                                            </label>
                                        </form>
                                        </br>
                                        <td>@lang('panel.category_list_showing') {{ $categories->count() }} @lang('panel.category_list_of') {{ $categories->total() }} @lang('panel.category_list_entries1')</td>
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
                                                <th>@lang('panel.category_list_name')</th>
                                                <th>@lang('panel.category_list_slug')</th>
                                                <th>@lang('panel.category_list_desc')</th>
                                                <th class="text-center">@lang('panel.category_list_action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lists as $cat)
                                                <tr>
                                                
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="user-{{$cat->id}}" name="selectedIds[]" type="checkbox" value="{{$cat->id}}">
                                                            <label for="user-{{$cat->id}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>{{$cat->name}}</td>
                                                    <td>{{$cat->slug}}</td>
                                                    <td>{{$cat->description}}</td>
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <a target="_blank" href="{{func::set_url('/category/'.$cat->slug) }}" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                            <a href="{{func::set_url('/panel/categories/edit/'.$cat->id)}}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                            <a href="{{func::set_url('/panel/categories/delete/'.$cat->id)}}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
                                                        </div>
                                                    </td>   
                                                </tr>
                                                @if (count($cat->children) > 0)
                                                    @foreach ($cat->children as $elem)
                                                        <?php $child = func::getTableByID('category_2', $elem); ?>
                                                        <tr style="background-color: #fafafa;">
                                                            <td class="text-center">
                                                                <div class="checkbox-custom">
                                                                    <input id="user-{{$child->id}}" name="selectedIds[]" type="checkbox" value="{{$child->id}}">
                                                                    <label for="user-{{$child->id}}" class="pl-0">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>- {{$child->name}}</td>
                                                            <td>{{$child->slug}}</td>
                                                            <td>{{$child->description}}</td>
                                                            <td class="text-center">
                                                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                                    <a target="_blank" href="/category/{{ $child->slug }}" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                                    <a href="{{func::set_url('/panel/categories/edit/'.$child->id) }}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                                    <a href="{{func::set_url('/panel/categories/delete/'.$child->id)}}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
                                                                </div>
                                                            </td>   
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                
                                <div class="col-sm-3">
                                    <div class="dataTables_info" id="category-list_info" role="status" aria-live="polite">
                                        @lang('panel.category_list_showing1') {{ $categories->count() }} @lang('panel.category_list_of1') {{ $categories->total() }} @lang('panel.category_list_entries2')
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="category-list_paginate">
                                        {{ $categories->links() }}
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
