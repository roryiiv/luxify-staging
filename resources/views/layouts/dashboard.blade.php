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
    <title>Luxify Dashboard - {{ucfirst(Auth::user()->role)}}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png?v=2">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png?v=2">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png?v=2">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png?v=2">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png?v=2">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png?v=2">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png?v=2">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="192x192"  href="/img/android-icon-192x192.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="32x32" href="/img/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="96x96" href="/img/favicon-96x96.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="16x16" href="/img/favicon-16x16.png?v=2">
    <link rel="manifest" href="/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png?v=2">
    <meta name="theme-color" content="#ffffff">

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

        <a href="{{ url('/') }}" class="brand pull-left"><img src="/db/images/logo/logo-light.png" alt="" width="100"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>

        <ul class="notification-bar list-inline pull-right">
            <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
            @if(Auth::user()->role == 'seller' || Auth::user()->role == 'user')
                <li class="dropdown"><a id="dropdownMenu1" href="profile.html#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i>

                        <span id="num_notif" class="badge bg-danger">{{ $num_notif == 0 ? '0' : $num_notif }}</span>

                    </a>
                    <div aria-labelle/dby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                        <h5 class="dropdown-header">You have {{ $num_notif == 0 ? 'no' : $num_notif }} notifications</h5>
                        <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                            @foreach($notifs as $notif)
                                <?php $profile = func::get_profile($notif->fromUserId); ?>
                                <li class="media">
                                    <a href="/dashboard/mailbox?id={{ $notif->id }}">
                                        <div class="media-left avatar">
                                            <img src="{{ !empty($profile->companyLogoUrl) ? func::img_url($profile->companyLogoUrl, 30) : func::img_url('placeholder.png', 30) }}" alt="" class="media-object img-circle">
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
            @endif
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
                    <ul aria-labelle/dby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown dropdown-menu-right" >
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
        @elseif(Auth::user()->role == 'seller' && Auth::user()->dealer_status === 'approved')
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
