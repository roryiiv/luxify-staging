<style>
    body {
        font-family: "Roboto", "Arial", "Helvetica Neue", "Helvetica", sans-serif;
    }
    .navbar {
        border-radius:0px; 
        position: absolute; 
        width: 100%; 
        min-height: 67px;
        background-color: rgba(0,0,0, 0.2); 
        top:0; 
        left:0;
    }
    .navbar-header {
        margin-left: 15px;
        margin-right: 40px;
    }
    .navbar-header > .navbar-brand {
        padding: 20px 15px;
    }
    .navbar-header > .navbar-brand img {
        height: 26px;
    }
    .nav > li {
        margin-top: 8px
    }
    .nav > li > a:hover, .nav > li.open > a{
        background-color: transparent;
        color: #e4c679!important;
    }
    .nav>li>a:focus, .nav>li>a:hover {
        background-color: transparent;
    }
    .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
        background-color: transparent;
    }
    .nav > li > a, .nav-toggle, .dropdown-menu ul li a {
        color: white;
        text-transform: uppercase;
        font-weight: 800;
        font-size: 13px;
    }
    .dropdown-menu > ul > li > a {
        font-weight: 500;
    } 
    .dropdown-menu {
        padding: 13px 15px;
        width: 236px;
        margin-top: 4px!important;
    }
    .dropdown-menu ul li {
        list-style-type: none!important;
        margin-left: -24px;
        font-weight: 500;
        margin-bottom: 8px;
    }
    .dropdown-menu ul li a {
        color: #777;
    }
    .dropdown-menu ul li a:hover {
        color: #e4c679!important;
    }
    .open > .dropdown-menu {
        animation-name: slidenavAnimation;
        animation-duration:.5s;
        animation-iteration-count: 1;
        animation-timing-function: ease;
        animation-fill-mode: forwards;

        -webkit-animation-name: slidenavAnimation;
        -webkit-animation-duration:.5s;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: ease;
        -webkit-animation-fill-mode: forwards;

        -moz-animation-name: slidenavAnimation;
        -moz-animation-duration:.5s;
        -moz-animation-iteration-count: 1;
        -moz-animation-timing-function: ease;
        -moz-animation-fill-mode: forwards;
    }
    @keyframes slidenavAnimation {
        from {
            opacity: 0;
        }
        to {
           opacity: 1;
        }
    }
    @-webkit-keyframes slidenavAnimation {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

</style>
<nav class="navbar">
    <div class="navbar-header">
        <!-- menu opener and logo -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Menu<span></span></button>
        <!-- logo of the page -->
        <a class="navbar-brand" href="{{func::set_url('/')}}">
            <img src="{{func::img_url('luxify-logo.png', '', '', false, true)}}" alt="Luxify" class="normal">
        </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
        <!--<ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="/category/real-estate">Real Estate</a></li>
                        <li><a href="/category/jewellery-watches">Watches & Jewelry</a></li>
                        <li><a href="/category/motors">Motors</a></li>
                        <li><a href="/category/handbags-accessories">Handbags & Accessories</a></li>
                        <li><a href="/category/experiences">Experiences</a></li>
                        <li><a href="/category/collectibles-furnitures">Collectibles & Furnitures</a></li>
                        <li><a href="/category/yachts">Yachts</a></li>
                        <li><a href="/category/aircrafts">Aircrafts</a></li>
                        <li><a href="/category/art-antiques">Art & Antiques</a></li>
                        <li><a href="/category/fine-wines-spirits">Fine Wines & Spirits</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="/why-luxify">Why luxify</a></li>
            <li><a target="_blank" href="http://blog.luxify.com">BLog</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More</a>
                <div class="dropdown-menu sm">
                    <ul>
                        <li><a href="/about">About Luxify</a></li>
                        <li><a href="/estate">Luxify Estate</a></li>
                        <li><a href="/dealer-application">Dealer Application</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
            </li>
        </ul>-->
        <?php
            $languages = func::build_lang();
            $sess_lang = func::get_lang();
        ?>
        @if(Auth::user())
            <ul class="nav navbar-nav navbar-right">
                <li class="currency-selector-container">
                    <select id="langSelect" class="language-selector">
                    @foreach($languages as $language)
                        <option value="{{$language['val']}}"{{func::selected($language['code'], $sess_lang)}}>{{$language['label']}}</option>
                    @endforeach
                    </select>
                </li>
                <li><a href="{{func::set_url('/dashboard')}}">@lang('home.header_menu_welcome') {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a></li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li class="currency-selector-container">
                    <select id="langSelect" class="language-selector">
                    @foreach($languages as $language)
                        <option value="{{$language['val']}}"{{func::selected($language['code'], $sess_lang)}}>{{$language['label']}}</option>
                    @endforeach
                    </select>
                </li>
                <li><a href="{{func::set_url('/register')}}">@lang('header.signUp')</a></li>
                <li><a href="{{func::set_url('/login')}}">@lang('header.login')</a></li>
            </ul>
        @endif

    </div>
    <!-- end of navbar collapse -->
</nav>
