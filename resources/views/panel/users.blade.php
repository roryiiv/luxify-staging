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
                        <h4 class="mt-0 mb-5">Customer List</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">Powerful Admint to see everyone</a></li>
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
                        <h3 class="widget-title">Customer List</h3>
                    </div>
                    <div class="widget-body">
                        <form id="users" name="users" method="get" action="/panel/users">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtCustomerName">Customer Name</label>
                                        <input id="txtCustomerName" name="txtCustomerName" type="text" class="form-control" value="{{isset($filters['txtCustomerName']) ? ucfirst($filters['txtCustomerName']) : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtCompanyName">Company Name</label>
                                        <input id="txtCompanyName" name="txtCompanyName" type="text" class="form-control" value="{{isset($filters['txtCompanyName']) ? ucfirst($filters['txtCompanyName']) : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlCustomerGroup">Customer Group</label>
                                        <select id="ddlCustomerGroup" name="ddlCustomerGroup" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="user"{{isset($filters['ddlCustomerGroup']) ? func::selected($filters['ddlCustomerGroup'],'user') : ''}}>User</option>
                                            <option value="seller"{{isset($filters['ddlCustomerGroup']) ? func::selected($filters['ddlCustomerGroup'],'seller') : ''}}>Seller</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input id="txtEmail" name="txtEmail" type="text" class="form-control" value="{{isset($filters['txtEmail']) ? ucfirst($filters['txtEmail']) : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlStatus">Status</label>
                                        <select id="ddlStatus" name="ddlStatus" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="0"{{isset($filters['ddlStatus']) ? func::selected($filters['ddlStatus'],0) : ''}}>Enabled</option>
                                            <option value="1"{{isset($filters['ddlStatus']) ? func::selected($filters['ddlStatus'],1) : ''}}>Suspended</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlApproved">Dealer Status</label>
                                        <select id="ddlApproved" name="ddlApproved" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="approved"{{isset($filters['ddlApproved']) ? func::selected($filters['ddlApproved'], 'approved') : ''}}>Approved</option>
                                            <option value="pending"{{isset($filters['ddlApproved']) ? func::selected($filters['ddlApproved'],'pending') : ''}}>Pending</option>
                                            <option value="rejected"{{isset($filters['ddlApproved']) ? func::selected($filters['ddlApproved'],'rejected') : ''}}>Rejected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15 p-10 text-right">
                                <button type="submit" class="btn btn-raised btn-success btn-lg">Filter</button>
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
                                            entries
                                            </label>
                                        </form>
                                        </br>
                                        <td>Showing {{ $users->count() }} of {{ $users->total() }} entries</td>
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
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                @if(Auth::user()->role != 'editor')
                                                <th>Customer Group</th>
                                                @endif
                                                <th>Account Status</th>
                                                @if(Auth::user()->role == 'editor')
                                                <th class="text-right">Last Edited By</th>
                                                @endif
                                                @if(Auth::user()->role != 'editor')
                                                <th>Date Added</th>
                                                @endif
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="user-{{$user->id}}" name="selectedIds[]" type="checkbox" value="{{$user->id}}">
                                                            <label for="user-{{$user->id}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <?php
                                                        
                                                        $customerName = '';
                                                        if (!empty($user->companyName) && ($user->companyName) !=null) {
                                                            $company = json_decode($user->companyName);
                                                            if(is_array($company)){
                                                                $customerName = $company[0]."</br>". $company[1];
                                                            }else{
                                                                $customerName = ucfirst($user->firstName) . ' ' . ucfirst($user->lastName); 
                                                            }

                                                       }else{
                                                            if (!empty($user->firstName) && !empty($user->lastName)) {
                                                                $customerName = ucfirst($user->firstName) . ' ' . ucfirst($user->lastName);
                                                            }elseif (isset($user->fullName) && !empty($user->fullName)) {
                                                                $customerName = $user->fullName; 
                                                            }else{
                                                                $customerName = $user->username;
                                                            }
                                                        }                                                       
                                                    ?>
                                                    <td>
                                                        {!! $customerName !!}
                                                        @if (Cache::get($user->id) == 'edited') 
                                                            {{-- true expr --}}
                                                            <br/><span class="text-warning pull-right"><i class="ti-alert"></i> Edited</span>
                                                        @endif
                                                    </td>

                                                    <td>{{$user->email}}</td>
                                                    @if(Auth::user()->role != 'editor')
                                                    <td>{{ucfirst($user->role)}}</td>
                                                    @endif
                                                    <td>
                                                        @if($user->dealer_status === 'approved')
                                                            <span class="label label-success">Approved</span>
                                                        @elseif($user->dealer_status === 'rejected')
                                                            <span class="label label-danger">Rejected</span>
                                                        @else
                                                         <div role="group" aria-label="approveAndRejectButton" class="btn-group btn-group-sm">
                                                            <button onclick="changeDealerStatus(this, {{$user->id}}, 'approved')" class="btn btn-outline btn-success">APPROVE</button>
                                                            <button onclick="changeDealerStatus(this, {{$user->id}}, 'rejected')" class="btn btn-outline btn-danger">REJECT</button>
                                                         </div>
                                                        @endif
                                                    </td>
                                                     @if(Auth::user()->role == 'editor' && $user->edited_by != 0)
                                                        <?php $editor = func::getTableByID('users', $user->edited_by)?>
                                                        <td class="text-right">{{$editor->email}}</br>edited at {{date("d-m-Y H:m", strtotime($user->updated_at))}}</td>
                                                    @else
                                                        <td class="text-right">-</td>
                                                    @endif
                                                    @if(Auth::user()->role != 'editor')
                                                    <td>{{date("m/d/Y", strtotime($user->created_at))}}</td>
                                                    @endif
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <?php $slug = $user->slug != '' ? $user->slug : strtolower($user->firstName).'-'.strtolower($user->lastName); ?>
                                                            <a href="{{ $user->role != 'seller' ? 'javascript:;' : url('/dealer') . '/' . $user->id . '/' . $slug }}" target="_blank" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                            <a href="/panel/user/edit/{{$user->id}}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                            @if(Auth::user()->role == 'admin')
                                                                @if($user->isSuspended == 0)
                                                                    <a href="/panel/user/delete/{{$user->id}}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
                                                                @else
                                                                    <a href="/panel/user/revoke/{{$user->id}}" class="btn btn-outline btn-success"><i class="ti-power-off"></i></a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                <form id="bulkActionForm" action="/api/bulkActions" method="POST">
                                   {!! csrf_field() !!}
                                   <input type="hidden" name="table" value="users">
                                   <select class="form-control" id="bulkAction" name="bulkAction">
                                      <option value=''>--Bulk Action--</option>
                                      <option value='delete'>Delete</option>
                                      <!-- <option value='approve'>Approve</option>-->
                                      <!--<option value='reject'>Reject</option>-->
                                   </select> 
                                   <button class="form-control" id="btnBulkAction">Apply</button>
                                </form>
                                </div>
                                <div class="col-sm-3">
                                    <div class="dataTables_info" id="product-list_info" role="status" aria-live="polite">
                                        Showing {{ $users->count() }} of {{ $users->total() }} entries
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="product-list_paginate">
                                        {{ $users->links() }}
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
    function changeDealerStatus(ele, userId, status) {
        if (userId && status) {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val()
                },
                url: '/api/dealer/setStatus',
                dataType: 'json',
                data: {
                    userId: userId,
                    status: status
                },
                method: 'POST',
                success: function(res) {
                    if (res.result === 1) {
                        var parent = $(ele).parent().parent();
                        $(parent).fadeOut("fast", function(){
                            $(ele).parent().parent().html('<span style="text-transform:capitalize;" class="label label-'+ (res.status === 'approved' ? 'success': 'danger') +'">'+ res.status +'</span>');
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

        $('#btnBulkAction').click(function(e) {
          e.preventDefault(); 
          var form = $('#bulkActionForm');
          $('[name="selectedIds[]"]:checked').map(function() {
            var id = $(this).val();
            form.append('<input type="hidden" name="selectedIds[]" value="'+id+'">');
          });
          form.append('<input type="hidden" name="ref" value="'+window.location.href+'">');
          form.submit();
        });
    });
    </script>
@endsection
