@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Virtual Reality Property Tour', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
    <meta name="keywords" content="real estate investment,luxury real estate,virtual reality">
    <meta name="description" content="Partner with us for real estate investment in the US. Our goal is to change the way property buyers experience luxury real estate through 3D virtual reality tour.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
    <style>
        .banner-center h2 {
            font-family: 'roboto';
            color: white;
            font-weight: 200;
        }
    </style>
@endsection
@section('content')
    <!-- main banner of the page -->
    <section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/estates-main.jpg', '', '', false, true)}});">
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                    <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 3rem;">
                            <h1>@lang('static.estates_luxify')</h1>
                            <h2>@lang('static.estates_partner')</h2>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 4.5rem;">
                        <div class="col-lg-12">
                            <div class="button-wrap">
                                <a class="btn btn-default lightbox fancybox.iframe" href="https://my.matterport.com/show/?m=uRGXgoiYk9f"><span class="icon-play"></span> @lang('static.estates_experience')</a>
                                <a href="{{func::set_url('/category/real-estates')}}" class="btn btn-primary smooth-scroll">@lang('static.estates_listings')</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                            <p>@lang('static.estates_goal')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <section>
        <div id="Latest-Estates" class="carousel-block" style="padding-bottom: 0px;border-bottom:0px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 style="text-align: center;">@lang('static.estates_virtual')</h1>
                        <div class="slider estates">
                            @if(!empty($mores))
                                @foreach($mores as $more)
                                    <div class="slide">
                                        <div class="thumbnail borderless">
                                            <a href="{{func::set_url('/listing/'.$more->slug)}}">
                                                <div class='product-img-container'>
                                                    <?php $more_img = !empty($more->mainImageUrl) ? $more->mainImageUrl : 'default-logo.png'; ?>
                                                    <img class='product-img' src="{{ func::img_url($more_img, 300, '', true) }}" alt="image description">
                                                    @if(Auth::user())
                                                        <?php $madded = func::is_wishlist(Auth::user()->id, $more->id) == 1 ? ' added' : ''; ?>
                                                        <a id="{{ $more->id }}" href="javascript:;" data-id="{{ $more->id }}" class="slide-favourite favourite{{ $madded }}"><span class="icon-heart"></span></a>
                                                    @else
                                                        <a data-toggle="modal" data-listing="{{$more->id}}" data-target="#login-form" class="slide-favourite favourite" href="#"><span class="icon icon-heart"></span></a>
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="caption">
                                                <h3><a href="/listing/{{ $more->slug }}">{{ $more->title }}</a></h3>
                                                <?php
                                                $msess_currency = null !==  session('currency') ? session('currency') : 'USD';
                                                $mprice_format = func::formatPrice($more->currencyId, $msess_currency, $more->price);
                                                $mlogo = $more->companyLogoUrl && !empty($more->companyLogoUrl) ? $more->companyLogoUrl : 'default-logo.png';
                                                ?>
                                                <div>
                                                    <span class="price">{{ $mprice_format }}</span>
                                                </div>
                                                <div class="country-container">
                                                    <span class="country">{{$more->country}}</span>
                                                </div>
                                                <div class="item-logo">
                                                    <img src="{{ func::img_url($mlogo, 90, '', true) }}" alt="{{ $more->fullName}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-12" style="text-align: center; margin-bottom: 30px;">
                            <a href="/luxify-estates/3d-estates" class="btn btn-primary smooth-scroll">View More</a>
                        </div>
                    </div>
                </div>
    </section>
    <hr style="width: 80%; border-width: 2px;">
    <!-- main informative part of the page -->
    <main id="main">
        <!-- main content wrapper -->
        <div class="content-wrap" style="padding-bottom: 0px;">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-lg-12">

                <header class="heading" id="heading1">
                    <h1>@lang('static.estates_walk')</h1>
					<div class="wrap">
						<h5>@lang('static.estates_tools')</h5>
					</div>
                </header>
                <!-- services wrapper -->
                <div class="service-wrap">
                    <div class="column">
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon01.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">@lang('static.estates_share')</strong>
                            <p>@lang('static.estates_mobile')</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon02.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">@lang('static.estates_immersive')</strong>
                            <p>@lang('static.estates_luxury')</p>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <img src="{{func::img_url('banners/estates-3D-icon03.png', '', '', false, true)}}" alt="image description">
                            </div>
                            <strong class="title">@lang('static.estates_software')</strong>
                            <p>@lang('static.estates_tour')</p>
                        </div>
                            </div>
                            <div class="column">
                                <div class="row">
                                    <div class="icon">
                                        <img src="{{func::img_url('banners/estates-3D-icon04.png', '', '', false, true)}}" alt="image description">
                                    </div>
                                    <strong class="title">@lang('static.estates_informative')</strong>
                                    <p>@lang('static.estates_desc')</p>
                                </div>
                                <div class="row">
                                    <div class="icon">
                                        <img src="{{func::img_url('banners/estates-3D-icon05.png', '', '', false, true)}}" alt="image description">
                                    </div>
                                    <strong class="title">@lang('static.estates_easy')</strong>
                                    <p>@lang('static.estates_brand')</p>
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
                            <a class="play lightbox fancybox.iframe" href="https://my.matterport.com/show/?m=uRGXgoiYk9f"><span class="icon-play"></span></a>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- main of main content -->
        <!-- benefit block -->
        <div id="Benefits" class="benefit-block parallax" style="background-image:url({{func::img_url('banners/estates-benefits-main.jpg', '', '', false, true)}});">
            <div class="container" style="z-index: 4;">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                		<header class="heading" id="heading1">
							<div class="wrap">
								<h5 style="color:white; font-size: 2rem;">@lang('static.estates_benefit')</h5>
							</div>
                    		<h2 class="h1">@lang('static.estates_drive')</h2>
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
                            <h1>@lang('static.estates_start')</h1>
                            <div class="wrap">
                                <h5>@lang('static.estates_produce') <br class="hidden-xs">@lang('static.estates_email')</h5>
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
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="col-sm-8 col-xs-12 col-md-8">
                            <h2>@lang('static.estates_concierge')</h2>
                        </div>
                        <div class="col-sm-4 col-xs-12 col-md-4" style="text-align: center;">
						                <a href="/register" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of schedule block -->
    </main>
    @include('inc.send-message')
    <!-- end of main part -->
@endsection
@section('scripts')
    <script type="text/javascript" src="/assets/js/ajaxchimp.js"></script>
    <script type="text/javascript" src="/assets/js/carousel.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.slick.js"></script>

    <script>
        $(document).ready(function() {

            initSlick();
            initBackgroundImage();
        });
    </script>
    @include('inc.send-message-script')
@endsection