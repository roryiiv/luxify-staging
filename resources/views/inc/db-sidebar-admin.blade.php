<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('/db/images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    @include('inc.sidebar-header')
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">Main</li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="index.html#collapse18" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-user"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_user')</span></a>
            <ul id="collapse18" class="list-unstyled collapse">
                <li><a href="{{func::set_url('/panel/users')}}">@lang('panel.sb_panel_menu_user_list')</a></li>
                <li><a href="{{func::set_url('/panel/user/add/user')}}">@lang('panel.sb_panel_menu_user_add_user')</a></li>
                <li><a href="{{func::set_url('/panel/user/add/seller')}}">@lang('panel.sb_panel_menu_user_add_seller')</a></li>
            </ul>
        </li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse20" aria-expanded="false" aria-controls="collapse20" class="collapsed"><i class="ti-view-list-alt"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_cat')</span></a>
            <ul id="collapse20" class="list-unstyled collapse">
                <li><a href="{{func::set_url('/panel/categories')}}">@lang('panel.sb_panel_menu_cat_list')</a></li>
                <li><a href="{{func::set_url('/panel/categories/add')}}">@lang('panel.sb_panel_menu_cat_add')</a></li>
            </ul>
        </li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse21" aria-expanded="false" aria-controls="collapse21" class="collapsed"><i class="ti-clipboard"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_fields')</span></a>
            <ul id="collapse21" class="list-unstyled collapse">
                <li><a href="{{func::set_url('/panel/optional-fields')}}">@lang('panel.sb_panel_menu_fields_list')</a></li>
                <li><a href="{{func::set_url('/panel/optional-fields/add')}}">@lang('panel.sb_panel_menu_fields_add')</a></li>
            </ul>
        </li>

        

        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse19" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">@lang('panel.sb_panel_menu_item')</span></a>
            <ul id="collapse19" class="list-unstyled collapse">
                <li><a href="{{func::set_url('/panel/products')}}">@lang('panel.sb_panel_menu_item_list')</a></li>
                <!--<li><a href="/panel/products/add">Add product</a></li>-->
            </ul>
        </li>
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
