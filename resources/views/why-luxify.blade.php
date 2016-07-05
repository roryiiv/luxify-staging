@extends('layouts.front')

@section('title', 'Luxify - Why Luxify?')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <!-- main banner of the page -->
    <section class="inner-banner auto-height parallax" style="background-image:url(/assets/images/banner-whyluxify.jpg);">
        <!-- end of banner image -->
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>Why Shop at Luxify</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>On Luxify you will discover one of the Internet’s largest collections of luxury products and experiences</p>
						   </div>
					   </div>
                      <div class="row connect-socials" style="display: none;">
					  	<div class="col-lg-3 col-lg-offset-3">
							<a href="javascript:;" class="btn-facebook"><i class="icon-facebook"></i>Sign up with Facebook</a>
						</div>
					  	<div class="col-lg-3">
							<a href="javascript:;" class="btn-twitter"><i class="icon-twitter"></i>Sign up with Twitter</a>
						</div>
                     </div>
					 <div class="row">
					 	<div class="col-sm-6 col-sm-offset-3">
							<a href="/register" class="btn btn-primary btn-block" title="Register for Free">Register Now</a>
						</div>
					 </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
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
                    <!-- </header>-->
                    </div>
                </div> <!-- end of new grid -->
        <!-- main text wrapper -->
            <div class="content-holder">
                <div class="container">
                      <div class="left_image">
                            <img src="/assets/images/image.jpg" alt="image description">
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
									<h3>You Will Find Your Luxury Item</h3>
									<p>Whether you are looking for a unique timepiece, a luxury property or some fine wines for your cellar, you will find exactly what you are looking for a Luxify</p>
								</li>
							</ol>
						</div>
                            </div>
                        </div>

            </div>
        </div>
        <!-- main text wrapper -->
        <!-- main text wrapper -->
        <div class="content-wrapper grey-bg">
            <div class="container">
                <!-- new grid -->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
						<header class="heading" id="heading1">
							<h1 class="header2">How it works?</h1>
							<div class="wrap">
                                <h5>Luxify simply connects reputable luxury dealers with luxury buyers in Asia
								<br class="hidden-xs"> who need a reliable source of luxury goods around the world</h5>
                            </div>
						</header>
						<div class="work-image">
							<img src="/assets/images/work-img.jpg" alt="image description">
						</div>
						<!-- three columns -->
						<div class="row work-column">
							<div class="col-sm-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-discover.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>Discover</h3>
									<p class="w">Browse and find your desired item accordingly</p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-compare.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>Compare</h3>
									<p>Compare brand, price, and where the item is based</p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-contact.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>Contact Seller Directly</h3>
									<p>Communicate directly with the seller</p>
								</div>
							</div>
						</div>
					</div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- create account block -->
        <div class="create-account">
            <div class="container">
                <div class="row">
                    <!-- new grid -->
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-sm-8">
                            <h1>Create your account for free</h1>
                    </div>
                    <div class="col-sm-4">
						<a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of create account block -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
