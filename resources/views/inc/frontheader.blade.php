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
                                <li><a href="/category/art-antiuques">Art & Antiques</a></li>
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
                </ul>
                <?php $currencies = func::build_curr(); ?>
                @if(Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="currency-selector-container">
                           <select class="currency-selector">
                             @foreach($currencies as $currency)
                               <option value="{{$currency['code']}}">{{$currency['code']}} {{$currency['symbol']}}</option> 
                             @endforeach
                           </select>
                        </li>
                        <li><a href="/dashboard">Welcome {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="currency-selector-container">
                           <select>
                             @foreach($currencies as $currency)
                               <option value="{{$currency['code']}}">{{$currency['code']}}</option> 
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
<style>
  .currency-selector-container {
    margin-right: 2.4rem;
  }
  .navbar .navbar-right li:after {
    display: none;
  }

  .currency-selector-container  .jcf-select {
    background-color: transparent;
    height: 36px;
    border: 1px solid white;
    border-radius: 0;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    cursor: default;
    display: block;
    font-size: 14px;
  }
  .currency-selector-container  .jcf-select {
    font-weight: 200;
  }
  .currency-selector-container  .jcf-select .jcf-select-opener{
    color: white;
  }
  .currency-selector-container  .jcf-select .jcf-select-opener:before{
    top: 46%;
    right: 0.8rem;
    color: white;
  }
  .currency-selector-container  .jcf-select .jcf-select-text {
    color: white;
    line-height: 35px;
  }
  
</style>
</header>
