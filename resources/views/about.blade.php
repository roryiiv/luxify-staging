@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('About Us', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
<meta name="keywords" content="online marketplace,luxury goods,luxury">
<meta name="description" content="Luxify is Asia’s leading online marketplace for luxury. On Luxify you will discover one of the Internet's largest collections of luxury goods.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/about-us-main.jpg', '', '', false, true)}});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>@lang('static.about_aboutus')</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>@lang('static.about_asialeading')</p>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
							<ul class="banner-social">
                <li><a class="btn btn-primary lightbox fancybox.iframe" href="https://www.youtube.com/embed/52cRWj9Rmxw"><span class="icon-play"></span> @lang('static.about_watchvideo')</a></li>
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
        <div class="about-block parallax" style="background-image:url({{func::img_url('banners/about-us-ipad.png', '', '', false, true)}});">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-offset-1 col-sm-5 col-xs-10 col-xs-offset-1">
						<h1>@lang('static.about_whatluxify')</h1>
						<p>@lang('static.about_luxifyasia')</p>
						<p>@lang('static.about_onluxify')</p>
						<a href="{{func::set_url('/why-luxify')}}" class="btn btn-primary">@lang('static.about_itworks')</a>
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
                    <h1>@lang('static.about_luxify_cofounders')</h1>
					<div class="wrap">
                            </div>
                </header>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="founder-box">
                            <figure class="figure">
                                <img src="{{func::img_url('banners/about-us-florian.png', '', '', false, true)}}" alt="image description">
                            </figure>
                            <p>@lang('static.about_florian_desc')</p>
                            <span class="founder">
								<span class="name">@lang('static.about_florian')</span>
                            <span class="post">@lang('static.about_cofounder_1')</span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="founder-box">
                            <figure class="figure">
                                <img src="{{func::img_url('banners/about-us-alexis.png', '', '', false, true)}}" alt="image description">
                            </figure>
                            <p>@lang('static.about_alexis_desc')</p>
                            <span class="founder">
								<span class="name">@lang('static.about_alexis')</span>
                            <span class="post">@lang('static.about_cofounder2')</span>
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
                    <h1>@lang('static.about_joinus')</h1>
                    <div class="wrap add">
                        <p>@lang('static.about_looking') <a href="mailto:careers@luxify.com" target="_blank">@lang('static.about_careers')</a>.</p>
                    </div>
                </header>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">@lang('static.about_business')</strong>
                            <p>@lang('static.about_talented')</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">@lang('static.about_analyst')</strong>
                            <p>@lang('static.about_dynamic')</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="holder">
                            <strong class="title">@lang('static.about_senior_designer')</strong>
                            <p>@lang('static.about_marketing')</p>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <a href="mailto:careers@luxify.com" target="_blank" class="btn btn-primary">@lang('static.about_apply')</a>
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
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="col-sm-8 col-xs-12 col-md-8">
							<h2>@lang('static.about_create_account')</h2>
						</div>
                    	<div class="col-sm-4">
							<a href="{{func::set_url('/register')}}" class="btn btn-primary">@lang('static.about_started')</a>
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
  jQuery('#jarallax-container-0 > div').css('top', '-218px');
});
    </script>
@endsection
