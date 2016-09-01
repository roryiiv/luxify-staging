@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Pricing', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
<meta name="keywords" content="marketing campaign,asian market,tailored">
<meta name="description" content="We have one of the world’s finest luxury dealer networks and we offer tailored marketing campaign to reach the asian market.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/pricing-main.jpg', '', '', false, true)}});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>Pricing</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>Take your luxury business to the next level with Luxify</p>
					   </div>
				   </div>
				   <div class="button-wrap">
						<a href="/contact" class="btn btn-primary smooth-scroll">Contact Us</a>
					</div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <div class="info-block">
        <!-- main content wrapper -->
        <div class="container">
            <div class="row">
                 <div class="col-sm-11 col-sm-offset-1">
                      <div class="row">
                          <div class="col-sm-5 pull-right">
                              <div class="mob-img">
                                  <img style="position: relative; bottom: 1px;"src="{{func::img_url('banners/pricing-phones.png', 372, '', false, true)}}" alt="image description">
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="text-top">
                                   <h1>Our Value Proposition</h1>
                                   <p>Take your business to the next level with Luxify. We have one of the world’s finest luxury dealer networks and we deliver results.</p>
                                   <ul class="checklist">
                                      <li>Connect with luxury enthusiasts in Asia</li> 
                                      <li>Tailored marketing campaigns to reach Asian buyers</li> 
                                      <li>No obligation and lock-in period</li> 
                                      <li>Personalized customer support</li> 
                                      <li>Full control of your listings including prices and communication with potential buyers</li> 
                                   </ul>
                                </div>
                           </div>
                       </div>
                   </div>
               </div> <!-- end of new grid -->
          </div>
      </div>
        <!-- main of main content -->
        <!-- benefit block -->
        <div class="benefit-block parallax" style="background-image:url(assets/images/banner-technology.jpg);">
            <div class="container" style="z-index:4;">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1" style="margin-bottom: 45px;">
                    <h2 class="h1">Our Technology</h2>
                </header>
                <!-- benefit articles -->
                <div class="row">
                    <article class="col-sm-12">
                        <p style="font-size: 16px;">Our technology allows us to integrate with most platforms making the uploading of your inventory effortless with the possibility of automatically updating your listings. As a Luxify dealer we can provide you detailed analytical reports on the performances of your listings including monthly traffic reports. Our dealer support team will help you get the most of your Luxify membership.</p>
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
                    <h2>Luxify offers tailored packages to suit your particular company needs.</h2>
					<div class="wrap">
						<h5>Learn more about our dealer packages</h5>
					</div>
                </header>
				   <div class="button-wrap" style="text-align: center;">
						<a href="/dealer-application" class="btn btn-primary smooth-scroll">Dealer Application</a>
					</div>
                <!-- image column wrapper -->
          </div>
          </div> <!-- end of new grid -->
          </div>
      </div>
  </main>
  <!-- end of main part -->
@endsection
@section('scripts')
@endsection
