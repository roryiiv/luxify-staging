@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Why Shop At Luxify', false)}}</title>
@endsection

@section('meta-data')
<meta name="keywords" content="online shopping,luxury goods,pre owned,vintage">
<meta name="description" content="we make online shopping easier and more transparent. luxify is the perfect place to explore a large collection of new, vintage and pre-owned luxury goods.">
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
    <section class="inner-banner auto-height parallax" style="background-image:url({{func::img_url('banners/why-luxify-main.jpg', '' , '' , false, true)}});">
        <!-- end of banner image -->
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>@lang('static.why_luxify_shop')</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>@lang('static.why_luxify_discover')</p>
						   </div>
					   </div>
                      <div class="row connect-socials" style="display: none;">
					  	<div class="col-lg-3 col-lg-offset-3">
							<a href="javascript:;" class="btn-facebook"><i class="icon-facebook"></i>@lang('static.why_luxify_facebook')</a>
						</div>
					  	<div class="col-lg-3">
							<a href="javascript:;" class="btn-twitter"><i class="icon-twitter"></i>@lang('static.why_luxify_twitter')</a>
						</div>
                     </div>
					 <div class="row">
					 	<div class="col-sm-6 col-sm-offset-3">
							<a href="{{func::set_url('/register')}}" class="btn btn-primary btn-block" title="Register for Free">@lang('static.why_luxify_register')</a>
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
                            <h2 class="h1">@lang('static.why_luxify_shopping')</h2>
                            <div class="wrap">
                                <h5>@lang('static.why_luxify_perfect')</h5>
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
                            <img src="{{func::img_url('banners/why-luxify-laptop.jpg', 789, '',false, true)}}" alt="image description">
                       </div>

                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-5 col-sm-offset-1">
							<ol class="service-list">
								<li>
									<h3>@lang('static.why_luxify_lead')</h3>
									<p>@lang('static.why_luxify_payment')</p>
								</li>
								<li>
									<h3>@lang('static.why_luxify_compare')</h3>
									<p>@lang('static.why_luxify_interest')</p>
								</li>
								<li>
									<h3>@lang('static.why_luxify_find')</h3>
									<p>@lang('static.why_luxify_unique')</p>
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
							<h1 class="header2">@lang('static.why_luxify_how')</h1>
							<div class="wrap">
                                <h5>@lang('static.why_luxify_simply')
								<br class="hidden-xs"> @lang('static.why_luxify_reliable')</h5>
                            </div>
						</header>
						<div class="work-image">
              <img src="{{func::img_url('banners/why-luxify-workspace.jpg', '', '' , false, true)}}" alt="image description">
						</div>
						<!-- three columns -->
						<div class="row work-column">
							<div class="col-sm-6 col-xs-12 col-lg-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-discover.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>@lang('static.why_luxify_discover1')</h3>
									<p class="w">@lang('static.why_luxify_browse')</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12 col-lg-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-compare.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>@lang('static.why_luxify_compare1')</h3>
									<p>@lang('static.why_luxify_brand')</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12 col-lg-4">
								<div class="icon" id="icon1">
									<img src="/assets/images/ico-contact.png" alt="image description">
								</div>
								<div class="text" id="text1">
									<h3>@lang('static.why_luxify_seller')</h3>
									<p>@lang('static.why_luxify_communicate')</p>
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
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="col-sm-8 col-xs-12 col-md-8">
                            <h2>@lang('static.why_luxify_create')</h2>
                        </div>
                        <div class="col-sm-4 col-xs-12 col-md-4" style="text-align: center;">
						                <a href="/register" class="btn btn-primary">Get Started</a>
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
  jarallax(document.querySelectorAll('.jarallax'), {
    onInit: function() {
      console.log('hihi'); 
    } 
  });
 //      jQuery('#jarallax-container-0 > div').css('top', '-99px');
     });
    </script>
@endsection
