@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Contact us at Luxify now', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>
@section('meta-data')
<meta name="keywords" content="luxify, luxify concierge,luxify contact information, luxify contact, luxify phone, luxify support">
<meta name="description" content="Asia's leading marketplace for luxury. Contact our concierge team for support.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/contact-us-main.jpg', '', '', false, true)}});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>@lang('static.contact_us')</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>@lang('static.contact_welcome')</p>
						   </div>
					   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- about block -->
        <div class="about-block">
            <div class="container">
				<div class="row">
					<div class="col-lg-7">
						<h1>@lang('static.contact_global')</h1>
						<p>@lang('static.contact_sell')</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<h5>Hong Kong</h5>
						<p>Level 9, Core C, Cyberport 3<br>100 Cyberport Road<br>Hong Kong<br>Email: <a href="mailto:concierge@luxify.com">concierge@luxify.com</a></p>
					</div>
					<div class="col-sm-4">
						<h5>Singapore</h5>
            <p>22 Sing Ming Lane<br />06-76 Midview City <br />Singapore 573969<br>Email: <a href="mailto:concierge@luxify.com">concierge@luxify.com</a></p>
					</div>
					<div class="col-sm-4">
						<h5>United Kingdom</h5>
            <p>3/F, 207 Regent Street,<br />London, W1B 3HH<br>Email: <a href="mailto:concierge@luxify.com">concierge@luxify.com</a></p>
					</div>
				</div>
            </div>
        </div>
        <!-- end of about block -->
        <!-- create account block -->
        <div class="create-account">
            <div class="container">
                <div class="row">
                    <!-- new grid -->
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-sm-8">
                            <h1>@lang('static.contact_account')</h1>
                    </div>
                    <div class="col-sm-4">
						<a href="{{func::set_url('/register')}}" class="btn btn-primary">@lang('static.contact_start')</a>
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
    <script>
jQuery(document).ready(function() {
  jQuery('#jarallax-container-0 > div').css('top', '-43px');
});
    </script>
@endsection
