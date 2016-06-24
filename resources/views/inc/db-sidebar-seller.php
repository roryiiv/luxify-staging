<!-- Main Sidebar start-->
<aside data-mcs-theme="minimal-dark" style="background-image: url('../images/backgrounds/diamond.jpg')" class="main-sidebar mCustomScrollbar">
    <div class="user">
        <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart"><img src="../images/users/fm.jpg" alt="" class="avatar img-circle"> </div>
        <h4 class="fs-16 text-muted mt-15 mb-5 fw-300">Florian Martigny</h4>
        <p class="mb-0 text-muted">Luxify Dealer</p>
    </div>
    <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-category pt-0">Main</li>
        <li><a href="/dashboard/index" class="bubble"><i class="ti-home"></i><span class="sidebar-title">Dashboard</span></li>
        <li><a href="/dashboard/profile" class="bubble"><i class="ti-user"></i><span class="sidebar-title">My Profile</span></a></li>

        <li><a href="/dashboard/mailbox" class="bubble"><i class="ti-email"></i><span class="sidebar-title">Inquires</span><span class="badge bg-danger">9</span></a></li>
        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="index.html#collapse18" aria-expanded="false" aria-controls="collapse18" class="collapsed"><i class="ti-shopping-cart"></i><span class="sidebar-title">Products</span></a>
            <ul id="collapse18" class="list-unstyled collapse">
                <li><a href="/dashboard/products">Product list</a></li>
                <li><a href="/dashboard/products/add">Add product</a></li>
            </ul>
        </li>
        <li class="sidebar-category">Coming Soon</li>
        <li><a href="" class="non-clickable"><i class="ti-comment"></i><span class="sidebar-title">Chat </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li><a href="" class="non-clickable"><i class="ti-heart" ></i><span class="sidebar-title">CRM  </span><span class="label label-outline label-default">Coming Soon</span></a></li>
        <li class="sidebar-category">Settings</li>
        <li><a href="login.html" class="bubble"><i class="ti-power-off"></i><span class="sidebar-title">Log Out</span></a></li>
        <li>
            <a href="" data-toggle="modal" data-target=".bs-example-modal" class="bubble"><i class="ti-support"></i><span class="sidebar-title">Support</span></a>
        </li>
    </ul>
</aside>
<div tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade bs-example-modal">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Send Message for Support</h4>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <label for="supportSubject">Subject</label>
                        <input type="text" id="supportSubject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="supportMessage">Message</label>
                        <textarea name="supportMessage" id="supportMessage" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success btn-lg btn-raised">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Main Sidebar end-->
