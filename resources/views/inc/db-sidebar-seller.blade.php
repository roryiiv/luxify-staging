<?php
$notifs = func::get_notif();
$num_notif = count($notifs);
?>
<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('/db/images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    @include('inc.sidebar-header')
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">@lang('dashboard.sb_db_main')</li>
        <li><a href="{{func::set_url('/dashboard')}}" class="bubble"><i class="ti-home"></i><span class="sidebar-title">@lang('dashboard.sb_db_dashboard')</span></li>
        <li><a href="{{func::set_url('/dashboard/profile')}}" class="bubble"><i class="ti-user"></i><span class="sidebar-title">@lang('dashboard.sb_db_profile')</span></a></li>
        <li><a href="{{func::set_url('/dashboard/mailbox')}}" class="bubble"><i class="ti-email"></i><span class="sidebar-title">@lang('dashboard.sb_db_inquiries')</span><span class="badge bg-danger">{{$num_notif}}</span></a></li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse18" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">@lang('dashboard.sb_db_items')</span></a>
            <ul id="collapse18" class="list-unstyled collapse">
                <li><a href="{{func::set_url('/dashboard/products')}}">@lang('dashboard.sb_db_items_list')</a></li>
                <li><a href="{{func::set_url('/dashboard/products/add')}}">@lang('dashboard.sb_db_items_add')</a></li>
            </ul>
        </li>
        <li class="sidebar-category">@lang('dashboard.sb_db_comingsoon')</li>
        <li><a href="" class="non-clickable"><i class="ti-comment"></i><span class="sidebar-title">@lang('dashboard.sb_db_chat') </span><span class="label label-outline label-default">@lang('dashboard.sb_db_comingsoon')</span></a></li>
        <li><a href="" class="non-clickable"><i class="ti-heart" ></i><span class="sidebar-title">@lang('dashboard.sb_db_crm')  </span><span class="label label-outline label-default">@lang('dashboard.sb_db_comingsoon')</span></a></li>
        <li class="sidebar-category">@lang('dashboard.sb_db_settings')</li>
        <li><a href="{{func::set_url('/logout')}}" class="bubble"><i class="ti-power-off"></i><span class="sidebar-title">@lang('dashboard.sb_db_logout')</span></a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal" class="bubble"><i class="ti-support"></i><span class="sidebar-title">@lang('dashboard.sb_db_support')</span></a></li>
    </ul>
</aside>
@include('inc.sidebar-footer')
<!-- Main Sidebar end-->
