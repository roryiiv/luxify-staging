<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('/db/images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    @include('inc.sidebar-header')
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">Main</li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="index.html#collapse18" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-user"></i><span class="sidebar-title">User Management</span></a>
            <ul id="collapse18" class="list-unstyled collapse">
                <li><a href="/panel/users">User list</a></li>
                <li><a href="/panel/user/add/user">Add User</a></li>
                <li><a href="/panel/user/add/seller">Add Dealer</a></li>
            </ul>
        </li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse20" aria-expanded="false" aria-controls="collapse20" class="collapsed"><i class="ti-user"></i><span class="sidebar-title">Category</span></a>
            <ul id="collapse20" class="list-unstyled collapse">
                <li><a href="/panel/categories">Category list</a></li>
                <li><a href="/panel/categories/add">Add Category</a></li>
            </ul>
        </li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse21" aria-expanded="false" aria-controls="collapse21" class="collapsed"><i class="ti-clipboard"></i><span class="sidebar-title">Optional Field</span></a>
            <ul id="collapse21" class="list-unstyled collapse">
                <li><a href="/panel/optional-fields">Optional Field list</a></li>
                <li><a href="/panel/optional-fields/add">Add Optional Field</a></li>
            </ul>
        </li>

        

        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse19" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">Product Management</span></a>
            <ul id="collapse19" class="list-unstyled collapse">
                <li><a href="/panel/products">Product list</a></li>
                <!--<li><a href="/panel/products/add">Add product</a></li>-->
            </ul>
        </li>
        <li class="sidebar-category">Coming Soon</li>
        <li><a href="" class="non-clickable"><i class="ti-comment"></i><span class="sidebar-title">Chat </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li><a href="" class="non-clickable"><i class="ti-heart" ></i><span class="sidebar-title">CRM  </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li class="sidebar-category">Settings</li>
        <li><a href="/logout" class="bubble"><i class="ti-power-off"></i><span class="sidebar-title">Log Out</span></a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal" class="bubble"><i class="ti-support"></i><span class="sidebar-title">Support</span></a></li>
    </ul>
</aside>
@include('inc.sidebar-footer')
<!-- Main Sidebar end-->
