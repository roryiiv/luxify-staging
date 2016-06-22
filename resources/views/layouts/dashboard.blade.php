<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxify Admin</title>

    @yield('head')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-sidebar-color="sidebar-light" class="sidebar-light">
    <style>
     h2{
        line-height: 1.5;
    }
    </style>
    <!-- Header start-->
    <header>

        <a href="{{ url('/dashboard') }}" class="brand pull-left"><img src="/db/images/logo/logo-light.png" alt="" width="100"></a><a href="{{ url('/') }}" role="button" class="hamburger-menu pull-left"><span></span></a>

        <ul class="notification-bar list-inline pull-right">
            <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
            <li class="dropdown"><a id="dropdownMenu1" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span class="badge bg-danger">6</span></a>
                <div aria-labelle/dby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                    <h5 class="dropdown-header">You have 6 notifications</h5>
                    <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/17.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">William Carlson</h6>
                                    <p class="text-muted mb-0">Commented on your post</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">5 mins</time>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/19.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Barbara Ortega</h6>
                                    <p class="text-muted mb-0">Sent you a new email</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">8 mins</time>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/02.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Mark Barnett</h6>
                                    <p class="text-muted mb-0">Sent you a new message</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/11.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Alexander Gilbert</h6>
                                    <p class="text-muted mb-0">Sent you a new email</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/12.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Amanda Collins</h6>
                                    <p class="text-muted mb-0">You have 8 unread messages</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left avatar"><img src="/db/images/users/13.jpg" alt="" class="media-object img-circle"> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Christian Lane</h6>
                                    <p class="text-muted mb-0">Commented on your post</p>
                                </div>
                                <div class="media-right text-nowrap">
                                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-footer text-center p-10"><a href="mailbox.html" class="fw-500 text-muted">See all inquiries</a></div>
                </div>
            </li>
            <li class="dropdown visible-lg visible-md">
                @if (Auth::user())
                    <a id="dropdownMenu2" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                        <div class="media mt-0">
                            <div class="media-left avatar"><img src="/db/images/users/04.jpg" alt="" class="media-object img-circle"> </div>
                            <div class="media-right media-middle pl-0">
                                <p class="fs-12 mb-0">Hi, {{ Auth::user()->fullName }}</p>
                            </div>
                        </div>
                    </a>
                    <ul aria-labelle/dby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
                        <li><a href="{{ url('/dashboard/profile') }}"><i class="ti-user mr-5"></i> User Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="ti-power-off mr-5"></i>Logout</a></li>
                    </ul>
                @else
                    <a id="dropdownMenu2" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                        <div class="media mt-0">
                            <div class="media-left avatar"><img src="/db/images/users/04.jpg" alt="" class="media-object img-circle"> </div>
                            <div class="media-right media-middle pl-0">
                                <p class="fs-12 mb-0">Hi, Guest</p>
                            </div>
                        </div>
                    </a>
                    <ul aria-labelle/dby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
                        <li><a href="profile.html"><i class="ti-user mr-5"></i> User Profile</a></li>
                        <li><a href="login.html"><i class="ti-power-off mr-5"></i>Logout</a></li>
                    </ul>
                @endif
            </li>
        </ul>
    </header>
    <!-- Header end-->

    <div class="main-container">
        @yield('sidebar')

        @yield('content')
    </div>

    @yield('scripts')
    
</body>

</html>
