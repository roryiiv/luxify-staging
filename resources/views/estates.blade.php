@extends('layouts.front')

@section('title', 'Luxify - Luxify Estates')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/estates-main.jpg', '', '', false, true)}});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>3D Virtual Property tour</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>Our goal is to change the way property buyers search for and experience luxury real estate through 3D, virtual reality and video property tour</p>
					   </div>
				   </div>
				   <div class="button-wrap">
						<a class="btn btn-default lightbox fancybox.iframe" href="https://my.matterport.com/show/?m=1VXKRhH7xcd"><span class="icon-play"></span> Experience</a>
						<a href="/contact" class="btn btn-primary smooth-scroll">Free Consultation</a>
					</div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- main content wrapper -->
        <div class="content-wrap">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">

                <header class="heading" id="heading1">
                    <h1>3D Virtual Walkthrough</h1>
					<div class="wrap">
						<h5>We give you the tools to market your luxury property in a new and exciting way</h5>
					</div>
                </header>
                <!-- services wrapper -->
                <div class="service-wrap">
                    <div class="column">
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon01.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">Share and experience anywhere</strong>
                            <p>Virtual property walkthrough from your mobile device, desktop or virtual reality headset</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon02.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">Full immersive experience </strong>
                            <p>Experience a luxury property as if you are on location</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon03.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">No software required</strong>
                            <p>Automated and manual tour modes</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon04.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">Informative</strong>
                            <p>Contact information and property description</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon05.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">Easy to share</strong>
                            <p>Branded &amp; unbranded tour link</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon06.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">Powerful tools for business</strong>
                            <p>Captivate customers before they even visit</p>
                        </div>
                    </div>
                </div>
                <!-- video -->
                <div class="mobile-image">
                    <img src="{{func::img_url('banners/estates-3D-phone.png', '', '', false, true)}}" alt="image description">
                    <div class="video-wrap">
                        <div class="bg-img">
                            <img src="{{func::img_url('banners/estates-3D-poster.jpg', '', '', false, true)}}" alt="image description">
                        </div>
                    </div>
						        <a class="play lightbox fancybox.iframe" href="https://my.matterport.com/show/?m=1VXKRhH7xcd"><span class="icon-play"></span></a>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- main of main content -->
        <!-- benefit block -->
        <div class="benefit-block parallax" style="background-image:url({{func::img_url('banners/estates-benefits-main.jpg', '', '', false, true)}});">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1">
					<div class="wrap">
						<h5>Benefits</h5>
					</div>
                    <h2 class="h1">Drive more property sales</h2>
                </header>
                <!-- benefit articles -->
                <div class="row">
                    <article class="col-sm-4">
                        <div class="icon">
                            <img src="{{func::img_url('banners/estates-benefits-icon01.png', '', '', false, true)}}" alt="image description">
                        </div>
                        <h3>Reaching a larger audience</h3>
                        <p>Buyers from a wider geographic radius who typically would not be willing to travel for a viewing will physically visit or bid on a house they have toured on Luxify Estates</p>
                    </article>
                    <article class="col-sm-4">
                        <div class="icon">
                            <img src="{{func::img_url('banners/estates-benefits-icon02.png', '', '', false, true)}}" alt="image description">
                        </div>
                        <h3>Set the correct expectations</h3>
                        <p>Poor quality photos make buyers hesitate because they know intuitively the photos are not realistic, making them less likely to visit or engage on a listing</p>
                    </article>
                    <article class="col-sm-4">
                        <div class="icon">
                            <img src="{{func::img_url('banners/estates-benefits-icon03.png', '', '', false, true)}}" alt="image description">
                        </div>
                        <h3>Greater appeal of your property</h3>
                        <p>We generate higher levels of online appeal to more potential buyers because they easily find what’s important to them</p>
                    </article>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of benefit block -->
        <div class="content-wrap add">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1">
                    <h1>Easy to get started</h1>
					<div class="wrap">
						<h5>We will send a photographer to your property, then we will produce <br class="hidden-xs">the virtual walkthrough and send it to you via email and list on Luxify</h5>
					</div>
                </header>
                <!-- image column wrapper -->
                <div class="row">
                    <div class="col-sm-6">
                        <figure class="image">
                            <img src="{{func::img_url('banners/estates-get-started-01.jpg', '', '', false, true)}}" alt="image description">
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="image">
                            <img src="{{func::img_url('banners/estates-get-started-02.jpg', '', '', false, true)}}" alt="image description">
                        </figure>
                    </div>
                    <div class="col-xs-12">
                        <figure class="image">
                            <img src="{{func::img_url('banners/estates-get-started-03.jpg', '', '', false, true)}}" alt="image description">
                        </figure>
                    </div>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- schedule block -->
        <div class="create-account">
            <div class="container">
                <div class="row">
                    <!-- new grid -->
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-sm-8">
                            <h1>Our concierge is here to help</h1>
                    </div>
                    <div class="col-sm-4">
						<a href="/contact" class="btn btn-primary">Contact Us</a>
                    </div>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of schedule block -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
