<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('/db/images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    @include('inc.sidebar-header')
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">Main</li>
        <li class="panel"><a href="{{func::set_url('/panel/users')}}"><i class="ti-user"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_user_list')</span></a></li>

        <li class="panel"><a href="{{func::set_url('/panel/products')}}"><i class="ti-shopping-cart"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_item_list')</span></a></li>
        <li class="sidebar-category">@lang('panel.sb_panel_menu_coming_soon')</li>
        <li><a href="" class="non-clickable"><i class="ti-comment"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_crm') </span><span class="label label-outline label-default">@lang('panel.sb_panel_menu_coming_soon')</span></a></li>
        <li><a href="" class="non-clickable"><i class="ti-heart" ></i><span class="sidebar-title">@lang('panel.sb_panel_menu_chat')  </span><span class="label label-outline label-default">@lang('panel.sb_panel_menu_coming_soon')</span></a></li>
        <li class="sidebar-category">@lang('panel.sb_panel_menu_setting')</li>
        <li><a href="{{func::set_url('/logout')}}" class="bubble"><i class="ti-power-off"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_logout')</span></a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal" class="bubble"><i class="ti-support"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_support')</span></a></li>
    </ul>
</aside>
@include('inc.sidebar-footer')
<!-- Main Sidebar end-->
