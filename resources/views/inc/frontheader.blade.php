<header id="header">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
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
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('header.shop')</a>
                        <div class="dropdown-menu">
                        <?php $categories = DB::table('category_2')->where('parent',0)->get(); ?>

                            <ul>
                                <li><a href="{{func::set_url('/luxify-estates/3d-estates')}}">@lang('header.shop_luxifyEstate3d')</a></li>
                                @foreach($categories as $value)
                                    <li><a href="{{func::set_url('/category/'.$value->slug)}}">@lang('categories.'.$value->slug)</a></li>    
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{func::set_url('/why-luxify')}}">@lang('header.whyLuxify')</a></li>
                    <li><a target="_blank" href="{{func::set_url('/blog')}}">@lang('header.blog')</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('header.more')</a>
                        <div class="dropdown-menu sm">
                            <ul>
                                <li><a href="{{func::set_url('/about')}}">@lang('header.more_aboutLuxify')</a></li>
                                <li><a href="{{func::set_url('/pricing')}}">@lang('header.more_pricing')</a></li>
                                <li><a href="{{func::set_url('/dealer-application')}}">@lang('header.more_dealerApplication')</a></li>
                                <li><a href="{{func::set_url('/luxify-estates')}}">@lang('header.more_luxifyEstates')</a></li>
                                <li><a href="{{func::set_url('/contact')}}">@lang('header.more_contactUs')</a></li>
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
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('header.welcome') {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a>
                          <div class="dropdown-menu" id="user-menu">
                              <ul>
                                  @if(Auth::user()->role == 'admin')
                                    <li><a href="{{func::set_url('/panel')}}">@lang('header.adminPanel')</a></li>
                                  @else
                                    <li><a href="{{func::set_url('/dashboard')}}">@lang('header.dashboard')</a></li>
                                  @endif
                                  <li><a href="{{func::set_url('/logout')}}">@lang('header.logout')</a></li>
                              </ul>
                          </div>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
<!--                         <li class="currency-selector-container">
                            <select id="langSelect" class="language-selector">
                                @foreach($languages as $language)
                                    <option value="{{$language['val']}}"{{func::selected($language['code'], $sess_lang)}}>{{$language['label']}}</option>
                                @endforeach
                            </select>
                        </li> -->
                        <li class="currency-selector-container">
                           <select id="currSelect" class="currency-selector">
                             @foreach($currencies as $currency)
                               <option value="{{$currency['code']}}"{{func::selected($currency['code'], $sess_currency)}}>{{$currency['code']}} {{$currency['symbol']}}</option>
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
    </div>
</header>
