<?php
$notifs = func::get_notif();
$num_notif = count($notifs);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxify Panel</title>

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
            <li class="dropdown"><a id="dropdownMenu1" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span id="num_notif" class="badge bg-danger">{{ $num_notif == 0 ? '' : $num_notif }}</span></a>
                <div aria-labelle/dby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                    <h5 class="dropdown-header">You have {{ $num_notif == 0 ? 'no' : $num_notif }} notifications</h5>
                    <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                        @foreach($notifs as $notif)
                            <?php $profile = func::get_profile($notif->fromUserId); ?>
                            <li class="media">
                                <a href="/dashboard/mailbox?id={{ $notif->id }}">
                                    <div class="media-left avatar">
                                        <img src="{{ !empty($profile->companyLogoUrl) ? func::img_url($profile->companyLogoUrl, 50,'') : func::img_url('placeholder.png', 50,'') }}" alt="" class="media-object img-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">{{ $profile->firstName . ' ' . $profile->lastName }}</h6>
                                        <p class="text-muted mb-0">Send a message</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="{{ $notif->sentAt }}" class="fs-11">{{ func::time_ago($notif->sentAt) }}</time>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="dropdown-footer text-center p-10"><a href="/dashboard/mailbox" class="fw-500 text-muted">See all inquiries</a></div>
                </div>
            </li>
            <li class="dropdown visible-lg visible-md">
                @if (Auth::user())
                    <a id="dropdownMenu2" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                        <div class="media mt-0">
                            <div class="media-left avatar"><img src="{{ !empty(Auth::user()->companyLogoUrl) ? func::img_url(Auth::user()->companyLogoUrl, 50) : func::img_url('placeholder.png', 50) }}" alt="" class="media-object img-circle"> </div>
                            <div class="media-right media-middle pl-0">
                                <p class="fs-12 mb-0" style="text-transform: capitalize;">Hi, {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</p>
                            </div>
                        </div>
                    </a>
                    <ul aria-labelle/dby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
                        <li><a href="{{ url('/dashboard/profile') }}"><i class="ti-user mr-5"></i> User Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="ti-power-off mr-5"></i>Logout</a></li>
                    </ul>
                @endif
            </li>
        </ul>
    </header>
    <!-- Header end-->

    <div class="main-container">
        @if(Auth::user()->role == 'user')
            @include('inc.db-sidebar-user')
        @elseif(Auth::user()->role == 'seller')
            @include('inc.db-sidebar-seller')
        @elseif(Auth::user()->role == 'admin')
            @include('inc.db-sidebar-admin')
        @else
            @include('inc.db-sidebar-user')
        @endif

        @yield('content')
    </div>

    @yield('scripts')

</body>

</html>
