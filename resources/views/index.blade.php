@extends('layouts.front')

@section('home-title')
  <title>Luxify.com - Asia's Leading Marketplace for Luxury</title>
@endsection
@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>

        #video_bg{
            position:relative;;
            overflow:hidden;
            width:100%;
            height:100%;
            background: transparent;
        }
        .ytplayer-player{
            position: absolute;
        }

    </style>
@endsection

@section('meta-data')
    <meta name="keywords" content="luxury,online marketplace,luxury goods,collectors">
    <meta name="description" content="We are Asia's leading online luxury marketplace for luxury enthusiasts and collectors. On Luxify you will discover one of the Internet's largest collections of luxury goods.">
@endsection

@section('content')
    <!-- main banner of the page -->
    <section class="banner">
        <!-- banner slideshow -->

        <div  class="hidden-md hidden-lg bg-img overlay">
            <img src="{{func::img_url('banners/home-main.jpg', '', '', false, true)}}" alt="image description">
        </div>
        <div class="bg-img overlay hidden-xs hidden-sm">
            <div id="video_bg"></div>
        </div>
        <!-- end of banner slideshow -->
        <div class="container">
            <div class="holder" id="search_holder">
                <h1>Luxury Within Reach</h1>
                <h2>Asia’s leading marketplace for luxury</h2>
                <!-- category search form -->
            @include('inc.search')
            <!-- end of category search form -->
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- banner navigation -->
                        <nav class="banner-nav">
                            <ul>
                                <li><a href="/category/real-estates">Real Estates</a></li>
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
                        </nav>
                        <!-- end of banner navigation -->
                        <div class="banner-image">
                            <img src="{{func::img_url('banners/home-ipad.png', '', '', false, true)}}" alt="image description">
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- client section -->
        <section class="client-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                            <div><img src="{{func::img_url('banners/home-logo-bbc-news.png', '', '', false, true)}}" alt="BBC news"></div>
                            <div><img src="{{func::img_url('banners/home-logo-cbc.png', '', '', false, true)}}" alt="CBNC"></div>
                            <div><img src="{{func::img_url('banners/home-logo-techinasia.png', '', '', false, true)}}" alt="Techinasia"></div>
                            <div><img src="{{func::img_url('banners/home-logo-wealthx.png', '', '', false, true)}}" alt="WealthX"></div>
                            <div><img src="{{func::img_url('banners/home-logo-japanese-times.png', '', '', false, true)}}" alt="Japanese Times"></div>
                            <div><img src="{{func::img_url('banners/home-logo-yahoo-news.png', '', '', false, true)}}" alt="Yahoo news"></div>
                            <div><img src="{{func::img_url('banners/home-logo-chinadaily.png', '', '', false, true)}}" alt="China Daily"></div>
                            <div><img src="{{func::img_url('banners/home-logo-forbes.png', '', '', false, true)}}" alt="Forbes"></div>
                            <div><img src="{{func::img_url('banners/home-logo-bloomberg.png', '', '', false, true)}}" alt="Boomarang"></div>
                            <div><img src="{{func::img_url('banners/home-logo-daily-mail.png', '', '', false, true)}}" alt="Daily Mail"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of client section -->
        <!-- count block starts -->
        <section class="count-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <ul class="count-list">
                            <li>
                                <span class="count counter">{{ func::countMarketValue() }}</span>
                                <span class="info">Total Market in USD</span>
                            </li>
                            <li>
                                <?php $num_listings = number_format(func::countListings(), 0); ?>
                                <span class="count counter">{{$num_listings}}</span>
                                <span class="info">Total Listings</span>
                            </li>
                            <li>
                                <?php $num_recents = number_format(func::countNewListings(), 0); ?>
                                <span class="count counter">{{$num_recents}}</span>
                                <span class="info">New Listings In The Past 30 Days</span>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </section>
        <!-- end of count block -->
        <div class="featured-block parallax" style="background-image:url({{func::img_url('banners/featured_rees_rex_1.jpg', 1920, '', false, true)}})">
            <!--<div class="featured-block parallax" style="background-image:url('img/featured_rees_rex.jpg')">-->
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="text-box">
                                    <strong class="title">FEATURED</strong>
                                    <h1 style="font-weight: 300;">“Rees Rex”</h1>
                                    <p>One of the most complete and well-preserved skulls of any Tyrannosaurus rex ever discovered, is now available <br/>for sale.</p>
                                    <a href="/listing/rees-rex-t-rex-skull" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- main text wrapper -->
        <div class="content-wrapper">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <header class="heading">
                            <h2 class="h1">We Make Luxury Shopping Easier</h2>
                            <div class="wrap">
                                <h5>Luxify is the perfect place to discover, search and browse through one of the Internet’s largest collections of new, vintage and pre-owned luxury goods in a safe and simple way.</h5>
                            </div>
                        </header>
                    </div>
                </div> <!-- end of new grid -->
            </div>
            <!-- main text wrapper -->
            <div class="content-holder">
                <div class="container">
                    <div class="left_image">
                        <img src="{{func::img_url('banners/home-laptop.jpg', 789, '', false, true)}}" alt="image description">
                    </div>
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <ol class="service-list">
                                <li>
                                    <h3>We Are A Lead Generation Platform</h3>
                                    <p>We will never ask you for your payment details. Instead we match buyers with reputable sellers who have each been carefully handpicked and vetted by us. This ensures you are matched with genuine sellers and can enjoy complete peace of mind when browsing with us</p>
                                </li>
                                <li>
                                    <h3>Compare Products From All Sellers</h3>
                                    <p>When you have found a product you are interested in, we provide an easy way for you to communicate with the seller. You can discuss transactions, arrange viewings, or discuss prices; all on a straightforward one to one basis</p>
                                </li>
                                <li>
                                    <h3>You Will Find Your Luxury Item</h3>
                                    <p>Whether you are looking for a unique timepiece, a luxury property or some fine wines for your cellar, you will find exactly what you are looking for on Luxify</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main text wrapper -->
        <!-- compare block -->
        <div class="compare-block parallax" style="background-image:url({{func::img_url('banners/home-bag.jpg', '', '', false, true)}})">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="text-box">
                                    <h1>Search &amp; Compare</h1>
                                    <p>Search and compare through one of the Internet’s largest collections of new, vintage and pre-owned luxury goods.</p>
                                    <a href="/category/handbags-accessories" class="btn btn-primary">View more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of compare block -->
        <div class="info-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1 pull-right">
                                <div class="text-hold">
                                    <strong class="title">Discover</strong>
                                    <h1>Why Luxify</h1>
                                    <p>We make online luxury shopping easier and more transparent.</p>
                                    <a href="/why-luxify" class="btn btn-primary">View more</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mob-img">
                                    <img src="{{func::img_url('banners/home-phones.png', '', '', false, true)}}" alt="image description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- information block with image -->
        <div class="imageinfo-block parallax" style="background-image:url({{func::img_url('realestate.jpg')}})">
            <div class="container">
                <div class="info-wrap heading">
                    <h2 class="h1">3D Virtual Property Tour</h2>
                    <div class="wrap">
                        <h5>Enjoy a new luxury property viewing experience</h5>
                    </div>
                    <a href="/luxify-estates" class="btn btn-primary">View more</a>
                </div>
            </div>
        </div>
        <!-- end of information block -->
        <!-- subscribe block -->
        <div class="subscribe-block content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="heading">
                            <h2>Subscribe to Luxify's ultimate luxury newsletter!</h2>
                            <div class="wrap text-center">
                                <h5>Get the latest luxury finds in your inbox</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="subscribe-form" role="form" id="mailchimp">
                    <div class="input-group flat">
                        <input class="form-control" type="email" name="subscriber-email" id="subscriber-email" placeholder="Your Email..." required />
                        <div class="input-group-addon">
                            <button class="btn btn-primary" name="submit" type="submit" value="Submit">Subscribe</button>
                        </div>
                    </div>

                    <!-- success and error messages -->
                    <div class="notifications">
                        <div class="subscription-success text-success"></div>
                        <div class="subscription-error text-danger"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end of subscribe block -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script>
      $(document).ready(function(){
        $(".banner-image img").load(function() {
            var bg = $('.bg-img:nth-child(2)');
            var w = bg.width(), h = bg.height();

            $('#video_bg').YTPlayer({
                fitToBackground: true,
                videoId: '15VwTs0nFlM',
                width: w+500,
                ratio: (w/ h),
            });
        });
      });
    </script>
@endsection
