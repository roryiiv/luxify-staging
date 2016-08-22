@extends('layouts.front')


@section('meta-data')
  <meta name="keywords" content="luxury,online marketplace,luxury goods,collectors">
  <meta name="description" content="We are Asia's leading online marketplace for luxury enthusiasts and collectors. On Luxify you will discover one of the Internet's largest collections of luxury goods.">
@endsection

@section('page-title')
  <title>Luxify - Asia&#39;s leading marketplace for Luxury.</title>
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection

@section('content')
        <!-- main banner of the page -->
        <section class="banner">
            <!-- banner slideshow -->
            <div class="bg-img overlay">
                <img src="assets/images/home-banner.jpg" alt="image description">
            </div>
            <!-- end of banner slideshow -->
            <div class="container">
                <div class="holder" id="search_holder">

                    <h1>Asia’s leading marketplace for Luxury</h1>
                    <h2>We simply connect you with the world’s best brands, finest shops, galleries and dealers</h2>

                    <!-- category search form -->
                    @include('inc.search')
                    <!-- end of category search form -->
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- banner navigation -->
                        <nav class="banner-nav">
                            <ul>
                                <li><a href="/category/bags">Bags</a></li>
                                <li><a href="/category/jewellery-watches">Jewllery &amp; Watches</a></li>
                                <li><a href="/category/collectibles-art">Collectibles &amp; Arts</a></li>
                                <li><a href="/category/wines-spirits">Wines &amp; Spirits</a></li>
                                <li><a href="/category/homes-living">Homes &amp; Living</a></li>
                                <li><a href="/category/motors-yachts">Motors &amp; Yachts</a></li>
                                <li><a href="/category/experience">Experience</a></li>
                            </ul>
                        </nav>
                        <!-- end of banner navigation -->
                        <div class="banner-image">
                            <img src="assets/images/banner-ipad.png" alt="image description">
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
								<div><img src="assets/images/logo-bbc-news.png" alt="BBC news"></div>
								<div><img src="assets/images/logo-techinasia.png" alt="Techinasia"></div>
								<div><img src="assets/images/logo-wealthx.png" alt="WealthX"></div>
								<div><img src="assets/images/logo-japanese-times.png" alt="Japanese Times"></div>
								<div><img src="assets/images/logo-yahoo-news.png" alt="Yahoo news"></div>
								<div><img src="assets/images/logo-chinadaily.png" alt="China Daily"></div>
								<div><img src="assets/images/logo-forbes.png" alt="Forbes"></div>
								<div><img src="assets/images/logo-bloomberg.png" alt="Boomarang"></div>
								<div><img src="assets/images/logo-daily-mail.png" alt="Daily Mail"></div>
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
                                    <span class="count counter">10.7B</span>
                                    <span class="info">Total Market in USD</span>
                                </li>
                                <li>
                                    <span class="count counter">{{ func::count_listings() }}</span>
                                    <span class="info">Total Listings</span>
                                </li>
                                <li>
                                    <span class="count counter">{{ func::count_listings(30) > 0 ? func::count_listings(30) : '1,319' }}</span>
                                    <span class="info">New Listings in 30 Days</span>
                                </li>
                            </ul>
                        </div> :
                     </div> <!-- end of new grid -->
                </div>
            </section>
            <!-- end of count block -->
            <!-- main text wrapper -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- new grid -->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <header class="heading">
                                <h2 class="h1">We Make Luxury Shopping Easier</h2>
                                <div class="wrap">
                                    <h5>Luxify is the perfect place to discover, search and browse through a whole host of the very finest new, vintage and pre-owned luxury goods in a safe and simple way.</h5>
                                </div>
                            </header>
                         </div>
                     </div> <!-- end of new grid -->
                </div>
                <!-- main text wrapper -->
                <div class="content-holder">
                    <div class="container">
					  <div class="left_image">
							<img src="assets/images/image.jpg" alt="image description">
					   </div>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-5 col-sm-offset-1">
								<ol class="service-list">
									<li>
										<h3>We are not an eCommerce Platform</h3>
										<p>We will never ask you for your payment details. Instead we match buyers with reputable sellers who have each been carefully handpicked and vetted by us. This ensures you are matched with genuine sellers and can enjoy complete peace of mind when browsing with us</p>
									</li>
									<li>
										<h3>Compare Products From All Sellers</h3>
										<p>When you have found a product you are interested in, we provide an easy way for you to communicate with the seller. You can discuss transactions, arrange viewings, or discuss prices; all on a straightforward one to one basis.</p>
									</li>
									<li>
										<h3>You Will Find Your Item</h3>
										<p>Whether you are looking for the most expensive watch, a vintage designer piece or fine wines for your cellar, you will find exactly what you are looking for a Luxify</p>
									</li>
								</ol>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- main text wrapper -->
            <!-- compare block -->
            <div class="compare-block parallax" style="background-image:url(assets/images/bag.jpg)">
                <div class="container">
                    <!-- new grid -->
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-box">
                                        <h1>Search &amp; Compare</h1>
                                        <p>So you have your new digital camera and clicking away to glory anything and everything in sight. Now you want to print them and you need.</p>
                                        <a href="/category/bags" class="btn btn-primary">View more</a>
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
                                            <p>We make online luxury shopping easier for buyers and sellers.We make online luxury shopping easier for buyers and sellers.</p>
                                            <a href="/why-luxify" class="btn btn-primary">View more</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mob-img">
                                            <img src="assets/images/phones.png" alt="image description">
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
							<h5>Enjoy a new house viewing experience you never had before</h5>
						</div>
                        <a href="/estate" class="btn btn-primary">View more</a>
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

    })
    </script>
@endsection
