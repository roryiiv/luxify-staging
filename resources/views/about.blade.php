@extends('layouts.front')

@section('title', 'Luxify - Why Luxify?')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url(/assets/images/about-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>About Us</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>Luxify is the leading online marketplace for luxury</p>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
							<ul class="banner-social">
								<li><a class="btn btn-primary lightbox fancybox.iframe" href="http://player.vimeo.com/video/120660363?autoplay=true"><span class="icon-play"></span> Watch video</a></li>
							</ul>
						</div>
                     </div> <!-- end of new grid -->
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- about block -->
        <div class="about-block parallax" style="background-image:url(/assets/images/what-is-luxify.jpg);">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-offset-1 col-sm-5 col-xs-10 col-xs-offset-1">
					<h1>What's Luxify</h1>
					<p>Luxify is the leading online marketplace for luxury. Our website is the go-to destination for luxury enthusiasts and collectors around the world, providing easy, safe and reliable market access to the luxury market</p>
					<p>On Luxify you will discover one of the Internet's largest collections of luxury products. Our website is the perfect place to discover, search and browse through a whole host of the very finest new, vintage and pre-owned luxury goods.</p>
					<a href="why_luxify.html" class="btn btn-primary">How it works?</a>
			</div>
			</div>
            </div>
        </div>
        <!-- end of about block -->
        <!-- founder block -->
        <div class="founder-block grey-bg">
            <div class="container">
                <!-- new grid -->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1">
                    <h1>Luxify Co-Founders</h1>
					<div class="wrap">
                                <h5>People driven to change an industry for the better</h5>
                            </div>
                </header>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="founder-box">
                            <figure class="figure">
                                <img src="/assets/images/person01.png" alt="image description">
                            </figure>
                            <p>Florian Martigny was born in Paris and started his career in New York with large European investment bank. After 7 years in the banking industry, Martigny managed and sold his own company cosmetic import and distribution business in the US. Upon selling his company, he went on to enjoy a successful part 2 career in investment banking in Hong Kong where he has been based for the past 9 years. Martigny is an avid kite surfer and yachting enthusiast.</p>
                            <span class="founder">
								<span class="name">Florian Martigny</span>
                            <span class="post">Co-Founder</span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="founder-box">
                            <figure class="figure">
                                <img src="/assets/images/person02.png" alt="image description">
                            </figure>
                            <p>Alexis Zirah was born in Paris, educated in Australia and based in Hong Kong since 2008. His career has taken him from Paris to Sydney to Hong Kong. Seoul and Shanghai. He is an ex-management consultant with a top international consulting company and has a successful background in investing and developing internet companies in Asia. Alexis holds a private pilot license and enjoys car racing and triathlon.</p>
                            <span class="founder">
								<span class="name">Alexis Zirah</span>
                            <span class="post">Co-Founder</span>
                            </span>
                        </div>
                    </div>
                </div>
                </div>
            </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of founder block -->
        <!-- join block -->
        <div class="join-block">
            <div class="container">
                <!-- new grid -->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1">
                    <h1>Join us</h1>
                    <div class="wrap add">
                        <p>Luxify is always looking for smart, passionate individuals to join our team in Hong Kong, Singapore and London. If you have an interested or experience in the luxury industry, click the button to apply</p>
                    </div>
                </header>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">Business Developer</strong>
                            <p>Are you a talented, dynamic sales professional with a proven track record of success? Join Luxify as a Business Developer and help take a high-growth company to the next level. You'll work in Hong Kong to both prospect and grow your own sales pipeline.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">SEM Analyst</strong>
                            <p>Are you a dynamic, analytical SEM professional with a passion for challenges? Join Luxify as an SEM Associate! In this critical role, you'll help us increase that number exponentially by planning, designing, and building highly- scaled search campaigns across multiple engines.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">Senior Designer</strong>
                            <p>As a member of our Marketing team in Hong Kong, you will be responsible for creating both new design and executing against current brand standards in all channels, with a focus on web and social.</p>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <a href="/contact" class="btn btn-primary">Apply now</a>
                </div>
                </div>
            </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of create account block -->
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
