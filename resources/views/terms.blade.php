@extends('layouts.front')

@section('title', 'Terms of Service')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>
@section('meta-data')
  <meta name="keywords" content="luxify terms and conditions">
  <meta name="description" content="The terms and conditions relating to the use of the services accessed through www.luxify.com.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner auto-height parallax" style="background-image:url(/assets/images/about-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				  <div class="row">
					  <div class="col-lg-12">
						<h1>@lang('static.terms_title1')</h1>
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
        <div class="content-wrapper">
            <div class="container">

                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                    	<h1 class="text-bold">@lang('static.terms_title2')</h1>
                      <p>@lang('static.terms_online')</p>

<p>@lang('static.terms_policy')</p>

                      <h3>@lang('static.terms_service')</h3>

<p>@lang('static.terms_service1')</p>

                      <h3>@lang('static.terms_listing')</h3>

<p>@lang('static.terms_listing1')</p>

<p>@lang('static.terms_listing2')</p>

<p>@lang('static.terms_listing3')</p>

<p>@lang('static.terms_listing4')</p>



                      <h3>@lang('static.terms_marketing')</h3>

<p>@lang('static.terms_marketing1')</p>

<p>@lang('static.terms_marketing2')</p>

<p>@lang('static.terms_marketing3')</p>

<p>@lang('static.terms_marketing4')</p>

                      <h3>@lang('static.terms_website')</h3>

<p>@lang('static.terms_website1')</p>

<p>@lang('static.terms_website2')</p>

<p>@lang('static.terms_website3')</p>

<p>@lang('static.terms_website4')</p>

<p>@lang('static.terms_website5')</p>

<p>@lang('static.terms_website6')</p>

                      <h3>@lang('static.terms_register')</h3>

<p>@lang('static.terms_register1')</p>

<p>@lang('static.terms_register2')</p>
<p>@lang('static.terms_register3')</p>

<p>@lang('static.terms_register4')</p>

                      <h3>@lang('static.terms_refund')</h3>

<p>@lang('static.terms_refund1')</p>

<p>@lang('static.terms_refund2')</p>

<p>@lang('static.terms_refund3')</p>

<p>@lang('static.terms_refund4')</p>

                      <h3>@lang('static.terms_liability')</h3>

<p>@lang('static.terms_liability1')</p>

<p>@lang('static.terms_liability2')</p>

<p>@lang('static.terms_liability3')</p>

<p>@lang('static.terms_liability4')</p>

<p>@lang('static.terms_liability5')</p>

<p>@lang('static.terms_liability6')</p>

                      <h3>@lang('static.terms_yourliability')</h3>

<p>@lang('static.terms_yourliability1')</p>
<p>@lang('static.terms_yourliability2')</p>
<p>@lang('static.terms_yourliability3')</p>

<p>@lang('static.terms_yourliability4')</p>

<p>@lang('static.terms_yourliability5')</p>

<p>@lang('static.terms_yourliability6')</p>

<p>@lang('static.terms_yourliability7')</p>
<p>@lang('static.terms_yourliability8')</p>

                      <h3>@lang('static.terms_general')</h3>
<p>@lang('static.terms_general1')</p>

<p>@lang('static.terms_general2')</p>

<p>@lang('static.terms_general3')</p>
<p>@lang('static.terms_general4')</p>

<p>@lang('static.terms_general5')</p>

<p>@lang('static.terms_general6')</p>
<p>@lang('static.terms_general7')</p>

<p>@lang('static.terms_general8')</p>

<p>@lang('static.terms_general9')</p>

                        
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of terms and conditions -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
