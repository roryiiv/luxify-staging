@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Luxify Privacy Policy', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
  <meta name="keywords" content="luxify privacy policies, luxify privacy policy"> 
  <meta name="description" content=" Privacy Policy and Personal Information Collection Statement related to the usage Luxify's website.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url(/assets/images/about-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				  <div class="row">
					  <div class="col-lg-12">
						<h1>@lang('static.privacy_title1')</h1>
					   </div>
				   </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
						<ul class="privacy-list">
							<li><a class="smooth-scroll" href="#uk">UK</a></li>
							<li><a class="smooth-scroll" href="#hk">Hong Kong</a></li>
							<li><a class="smooth-scroll" href="#singapore">Singapore</a></li>
						</ul>
					   </div>
				   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- terms and condition text block -->
        <div class="content-wrapper m_privacy">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <article class="privacy-section" id="uk">
                    <h1 class="text-bold">@lang('static.privacy_title2')</h1>
                    <h3 class="space"></h3>
                    <h3 class="btm-space">@lang('static.privacy_personal')</h3>
                  <p>@lang('static.privacy_personal1')</p>

                  <p>@lang('static.privacy_personal2')</p>

                  <p>@lang('static.privacy_personal3')</p>

                    <h3 class="btm-space">@lang('static.privacy_purpose')</h3>
                  
                  <p>@lang('static.privacy_purpose1')</p>

                  <p>@lang('static.privacy_purpose2')</p>
<ul class="condition-list">
<li>@lang('static.privacy_purpose3')</li>
<li>@lang('static.privacy_purpose4')</li>
<li>@lang('static.privacy_purpose5')</li>
</ul>
                  
<p>@lang('static.privacy_purpose6')</p>

<p>@lang('static.privacy_purpose7')</p>

<ul class="condition-list">
  <li>@lang('static.privacy_purpose8')</li>
  <li>@lang('static.privacy_purpose9')</li>
  <li>@lang('static.privacy_purpose10')</li>
  <li>@lang('static.privacy_purpose11')</li>
  <li>@lang('static.privacy_purpose12')</li>
  <li>@lang('static.privacy_purpose13')</li>
  <li>@lang('static.privacy_purpose14')</li>
  <li>@lang('static.privacy_purpose15')</li>
  <li>@lang('static.privacy_purpose16')</li>
  <li>@lang('static.privacy_purpose17')</li>
  <li>@lang('static.privacy_purpose18')</li>
  <li>@lang('static.privacy_purpose19')</li>
  <li>@lang('static.privacy_purpose20')</li>
  <li>@lang('static.privacy_purpose21')</li>
  <li>@lang('static.privacy_purpose22')</li>
  <li>@lang('static.privacy_purpose23')</li>
</ul>
                    <h3 class="btm-space">@lang('static.privacy_cookies')</h3>
<p>@lang('static.privacy_cookies1')</p>

<p>@lang('static.privacy_cookies2')</p>

<p>@lang('static.privacy_cookies3')</p>

                    <h3 class="btm-space">@lang('static.privacy_marketing')</h3>
                  
<p>@lang('static.privacy_marketing1')</p>

<p>@lang('static.privacy_marketing2')</p>

                    <h3 class="btm-space">@lang('static.privacy_retention')</h3>
                  
<p>@lang('static.privacy_retention1')</p>

<p>@lang('static.privacy_retention2')</p>

<h3 class="btm-space">@lang('static.privacy_data')</h3>

<p>@lang('static.privacy_data1')</p>

<ul class="condition-list">
  <li>@lang('static.privacy_data2')</li>
  <li>@lang('static.privacy_data3')</li>
  <li>@lang('static.privacy_data4')</li>
  <li>@lang('static.privacy_data5')</li>
</ul>


<p>@lang('static.privacy_data6')</li>

<p style="text-align:center; padding: 20px  50px">Level 9, Core C, Cyberport 3, 100 Cyberport Road, Hong Kong Email: <a href="mailto:concierge@luxify.com" target="_blank">concierge@luxify.com</a></p>

<p>@lang('static.privacy_data8')</p>

<h3 class="btm-space">@lang('static.privacy_security')</h3>

<p>@lang('static.privacy_security1')</p>

<p>@lang('static.privacy_security2')</p>

<ul class="condition-list">
<li>@lang('static.privacy_security3')</li>
<li>@lang('static.privacy_security4')</li>
<li>@lang('static.privacy_security5')</li>
<li>@lang('static.privacy_security6')</li>
<li>@lang('static.privacy_security7')</li>
<li>@lang('static.privacy_security8')</li>
</ul>
<h3 class="btm-space">@lang('static.privacy_language')</h3>

<p>@lang('static.privacy_language1')</p>

                
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of terms and conditions -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
