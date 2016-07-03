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
                        <h4 class="mt-0 mb-5">Product List</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">All your products</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="display: none;">
                        <div class="btn-group mt-5">
                            <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Product List</h3>
                    </div>
                    <div class="widget-body">
                        <form id="wishlist" name="wishlist" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="txtProductName">Product Name</label>
                                        <input id="txtProductName" name="txtProductName" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtPrice">Price</label>
                                        <input id="txtPrice" name="txtPrice" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter-startDate">Date</label>
                                        <input id="filter-startDate" name="startDate" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlStatus">Status</label>
                                        <select id="ddlStatus" name="status" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="APPROVED">Approved</option>
                                            <option value="SOLD">Sold</option>
                                            <option value="EXPIRED">Expired</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mb-20">
                                <button type="submit" class="btn btn-lg btn-raised btn-success">Filter</button>
                            </div>
                        </form>
                        <div id="product-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="product-list_length">
                                        <form id="sorter" name="sorter" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                                            <label>Show
                                            <select id="view" name="view-perpage" aria-controls="product-list" class="form-control input-sm">
                                                <option value="10"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],10) : ''}}>10</option>
                                                <option value="20"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],20) : ''}}>20</option>
                                                <option value="50"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],50) : ''}}>50</option>
                                                {{-- <option value="-1"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],-1) : ''}}>All</option> --}}
                                            </select>
                                            entries</label>
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
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th class="text-right">Price</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0; $i < count($products); $i++)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="product-{{$i}}" type="checkbox" value="{{$i}}">
                                                            <label for="product-{{$i}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><img src="{{func::img_url($products[$i]->mainImageUrl, 50, 50)}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                                                    <td style="width: 25%;">{{$products[$i]->title}}</td>
                                                    {{--<td>{{date("Y-m-d H:i:s", strtotime($products[$i]->created_at))}}</td>--}}
                                                 @if($products[$i]->price)
                                                    <td class="text-right">{{$products[$i]->code}} ${{number_format($products[$i]->price)}}</td>
                                                 @else
                                                    <td class="text-right">ON REQUEST - {{$products[$i]->code}}</td>
                                                 @endif
                                                    {{-- <td class="text-right">320</td> --}}
                                                    <td class="text-center">
                                                       @if ($products[$i]->status == 'APROVED')
                                                         <div role="group" aria-label="soldExpiredButton" class="btn-group btn-group-sm">
                                                            <button onclick="changeListingStatus(this, {{$products[$i]->id}}, 'SOLD')" class="btn btn-outline btn-primary">SOLD</button>
                                                            <button onclick="changeListingStatus(this, {{$products[$i]->id}}, 'EXPIRED')" class="btn btn-outline btn-warning">EXPIRE</button>
                                                         </div>
                                                       @elseif ($products[$i]->status == 'PENDING')
<div class='statusCol'>
                                                         <div role="group" aria-label="approveAndRejectButton" class="btn-group btn-group-sm">
                                                            <button onclick="changeListingStatus(this, {{$products[$i]->id}}, 'APPROVED')" class="btn btn-outline btn-success">APPROVE</button>
                                                            <button onclick="changeListingStatus(this, {{$products[$i]->id}}, 'REJECTED')" class="btn btn-outline btn-danger">REJECT</button>
                                                         </div>
</div>
                                                       @else
                                                         <span class="label label-default">{{$products[$i]->status}}</span>
                                                       @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <a target='_blank' href="/listing/{{ $products[$i]->slug }}" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                            <a href="/panel/product/edit/{{ $products[$i]->id }}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                            <a href="/panel/product/delete/{{ $products[$i]->id }}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
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
                                        Showing {{ $products->firstItem() }} to {{ $products->count() }} of {{ $products->total() }} entries
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="product-list_paginate">
                                        {{ $products->links() }}
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
    <script type="text/javascript">
    function changeListingStatus(ele, listingId, status) {
        if (listingId && status) {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val()
                },
                url: '/api/product/setStatus',
                dataType: 'json',
                data: {
                    itemId: listingId,
                    status: status
                },
                method: 'POST',
                success: function(res) {
                    if (res.result === 1) {
                        var parent = $(ele).parent().parent();
                        $(parent).fadeOut("fast", function(){
                            $(ele).parent().parent().html('<span class="label label-default">'+ res.status +'</span>');
                            $(parent).fadeIn("fast");
                        });
                    }
                }
            });
        }
    }
      $(document).ready(function(){
          $('#view').change(function(){
              $('form#sorter').submit();
          });

          //TODO: to check for the daterangepicker api to see whether can set the val empty
          $("#filter-startDate").on('click', function() {
            if ($(this).val() === '') {
              $(this).daterangepicker({
              locale: {
                format: "YYYY-MM-DD"
              },
              singleDatePicker: !0,
              endDate: moment()
              });

            }
          });
      });
    </script>
@endsection
