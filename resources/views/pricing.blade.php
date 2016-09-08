@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Pricing', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
<meta name="title" content"Buy & Sell Luxury on Luxify">
<meta name="keywords" content="luxury goods,worthy, luxury items, authentic luxury goods, luxify, luxury websites, luxury market, buy luxury, sell luxury">
<meta name="description" content="Asia’s leading online marketplace for luxury. Become a Luxify dealer.">
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
							<h1>@lang('static.pricing_price')</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>@lang('static.pricing_business')</p>
					   </div>
				   </div>
				   <div class="button-wrap">
						<a href="{{func::set_url('/contact')}}" class="btn btn-primary smooth-scroll">@lang('static.pricing_contact')</a>
					</div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <div class="info-block" id="Value-Proposition">
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
                                   <h1>@lang('static.pricing_value')</h1>
                                   <p>@lang('static.pricing_business_level')</p>
                                   <ul class="checklist">
                                      <li>@lang('static.pricing_asia')</li> 
                                      <li>@lang('static.pricing_tailor')</li> 
                                      <li>@lang('static.pricing_obligation')</li> 
                                      <li>@lang('static.pricing_support')</li> 
                                      <li>@lang('static.pricing_control')</li> 
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
        <div id="Technology" class="benefit-block parallax" style="background-image:url(assets/images/banner-technology.jpg);">
            <div class="container" style="z-index:4;">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <header class="heading" id="heading1" style="margin-bottom: 45px;">
                    <h2 class="h1">@lang('static.pricing_technology')</h2>
                </header>
                <!-- benefit articles -->
                <div class="row">
                    <article class="col-sm-12">
                        <p style="font-size: 16px;">@lang('static.pricing_integrate')</p>
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
                    <h2>@lang('static.pricing_suit')</h2>
					<div class="wrap">
						<h5>@lang('static.pricing_package')</h5>
					</div>
                </header>
				   <div class="button-wrap" style="text-align: center;">
						<a href="{{func::set_url('/dealer-application')}}" class="btn btn-primary smooth-scroll">@lang('static.pricing_dealer')</a>
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
