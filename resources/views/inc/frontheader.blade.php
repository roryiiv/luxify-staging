<header id="header">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- menu opener and logo -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Menu<span></span></button>
                <!-- logo of the page -->
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/logo.png" alt="Luxify" class="normal">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
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
                                <li><a href="/pricing">Pricing</a></li>
                                <li><a href="/dealer-application">Dealer Application</a></li>
                                <li><a href="/estates">Luxify Estates</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <?php $currencies = func::build_curr(); ?>
                <?php $sess_currency = null !==  session('currency') ? session('currency') : 'USD'; ?>
                @if(Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="currency-selector-container">
                            <select id="currSelect" class="currency-selector">
                                @foreach($currencies as $currency)
                                    <option value="{{$currency['code']}}"{{func::selected($currency['code'], $sess_currency)}}>{{$currency['code']}} {{$currency['symbol']}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a>
                          <div class="dropdown-menu" id="user-menu">
                              <ul>
                                  @if(Auth::user()->role == 'admin')
                                    <li><a href="/panel">Admin Panel</a></li>
                                  @else
                                    <li><a href="/dashboard">Dashboard</a></li>
                                  @endif
                                  <li><a href="/logout">Logout</a></li>
                              </ul>
                          </div>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="currency-selector-container">
                           <select id="currSelect" class="currency-selector">
                             @foreach($currencies as $currency)
                               <option value="{{$currency['code']}}"{{func::selected($currency['code'], $sess_currency)}}>{{$currency['code']}} {{$currency['symbol']}}</option>
                             @endforeach
                           </select>
                        </li>
                        <li><a href="/register">Sign up</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                @endif
            </div>
            <!-- end of navbar collapse -->
        </nav>
    </div>
</header>
