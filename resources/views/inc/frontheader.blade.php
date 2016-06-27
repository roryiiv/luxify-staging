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
                @if(Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/dashboard">Welcome {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/register">Sign up</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                @endif

            </div>
            <!-- end of navbar collapse -->
        </nav>
    </div>
</header>
