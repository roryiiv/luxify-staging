<header id="header">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- menu opener and logo -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Menu<span></span></button>
                <!-- logo of the page -->
                <a class="navbar-brand" href="/">
                    <img src="{{func::img_url('luxify-logo.png', '', '', false, true)}}" alt="Luxify" class="normal">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('home.header_menu_shop')</a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="/luxify-estates/3d-estates">@lang('home.header_menu_luxifyEstate3d')</a></li>
                                <li><a href="/category/real-estates">@lang('home.header_menu_realEstates')</a></li>
                                <li><a href="/category/jewellery-watches">@lang('home.header_menu_whatches&Jewelry')</a></li>
                                <li><a href="/category/motors">@lang('home.header_menu_motors')</a></li>
                                <li><a href="/category/handbags-accessories">@lang('home.header_menu_handbags&Accessories')</a></li>
                                <li><a href="/category/experiences">@lang('home.header_menu_experiences')</a></li>
                                <li><a href="/category/collectibles-furnitures">@lang('home.header_menu_collectibles&Furnitures')</a></li>
                                <li><a href="/category/yachts">@lang('home.header_menu_yachts')</a></li>
                                <li><a href="/category/aircrafts">@lang('home.header_menu_aircrafts')</a></li>
                                <li><a href="/category/art-antiques">@lang('home.header_menu_art&Antiques')</a></li>
                                <li><a href="/category/fine-wines-spirits">@lang('home.header_menu_fineWines&Spirits')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="/why-luxify">@lang('home.header_menu_whyLuxify')</a></li>
                    <li><a target="_blank" href="/blog">@lang('home.header_menu_blog')</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('home.header_menu_more')</a>
                        <div class="dropdown-menu sm">
                            <ul>
                                <li><a href="/about">@lang('home.header_more_aboutLuxify')</a></li>
                                <li><a href="/pricing">@lang('home.header_more_pricing')</a></li>
                                <li><a href="/dealer-application">@lang('home.header_more_dealerApplication')</a></li>
                                <li><a href="/luxify-estates">@lang('home.header_more_luxifyEstates')</a></li>
                                <li><a href="/contact">@lang('home.header_more_contactUs')</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <?php
                    $languages = func::build_lang();
                    $sess_lang = func::get_lang();
                    $currencies = func::build_curr();
                    $sess_currency = null !==  session('currency') ? session('currency') : 'USD'; ?>
                @if(Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="currency-selector-container">
                            <select id="langSelect" class="language-selector">
                                @foreach($languages as $language)
                                    <option value="{{$language['val']}}"{{func::selected($language['code'], $sess_lang)}}>{{$language['label']}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="currency-selector-container">
                            <select id="currSelect" class="currency-selector">
                                @foreach($currencies as $currency)
                                    <option value="{{$currency['code']}}"{{func::selected($currency['code'], $sess_currency)}}>{{$currency['code']}} {{$currency['symbol']}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('home.header_menu_welcome') {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a>
                          <div class="dropdown-menu" id="user-menu">
                              <ul>
                                  @if(Auth::user()->role == 'admin')
                                    <li><a href="/panel">@lang('home.header_menu_adminPanel')</a></li>
                                  @else
                                    <li><a href="/dashboard">@lang('home.header_menu_dashboard')</a></li>
                                  @endif
                                  <li><a href="/logout">@lang('home.header_menu_logout')</a></li>
                              </ul>
                          </div>
                        </li>
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
                        <li class="currency-selector-container">
                           <select id="currSelect" class="currency-selector">
                             @foreach($currencies as $currency)
                               <option value="{{$currency['code']}}"{{func::selected($currency['code'], $sess_currency)}}>{{$currency['code']}} {{$currency['symbol']}}</option>
                             @endforeach
                           </select>
                        </li>
                        <li><a href="/register">Sign Up</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                @endif
            </div>
            <!-- end of navbar collapse -->
        </nav>
    </div>
</header>
