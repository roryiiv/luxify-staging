<?php
$notifs = func::get_notif();
$num_notif = count($notifs);
?>
<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('/db/images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    @include('inc.sidebar-header')
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">Main</li>
        <li><a href="{{func::set_url('/dashboard/profile')}}" class="bubble active"><i class="ti-user"></i><span class="sidebar-title">My Profile</span></a></li>
        <li><a href="{{func::set_url('/dashboard/mailbox')}}" class="bubble"><i class="ti-email"></i><span class="sidebar-title">Inquires</span><span class="badge bg-danger">{{$num_notif}}</span></a></li>
        <li><a href="{{func::set_url('/dashboard/wishlist')}}" class="bubble"><i class="ti-heart"></i><span class="sidebar-title">Wishlist</span></a></li>
        <li class="sidebar-category">Coming Soon</li>
        <li><a href="" class="non-clickable"><i class="ti-comment"></i><span class="sidebar-title">Chat </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li><a href="" class="non-clickable"><i class="ti-heart" ></i><span class="sidebar-title">CRM  </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li class="sidebar-category">Settings</li>
        <li><a href="{{func::set_url('/logout')}}" class="bubble"><i class="ti-power-off"></i><span class="sidebar-title">Log Out</span></a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal" class="bubble"><i class="ti-support"></i><span class="sidebar-title">Support</span></a></li>
    </ul>
</aside>
@include('inc.sidebar-footer')
<!-- Main Sidebar end-->
