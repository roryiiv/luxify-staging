@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Something when wrong', false)}}</title>
@endsection

@section('content')
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/about-us-main.jpg', '', '', false, true)}});">
		<div class="container">
      <div class="banner-text">
        <div class="banner-center">
          <div class="row">
            <div class="col-lg-12">
              <h1>500</h1>
              <h4>Sorry, there is an error when requesting `{{$url}}`</h4>
              <h4>If the problem persists, please contact <a href="mailto:tech@luxify.com">tech@luxify.com</a> for further assistance.</h4>
						</div>
					</div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="carousel-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="text-center">Latest Luxuries</h1>
            <div class="slider">
              @if(!empty($mores))
                @foreach($mores as $more)
                  <div class="slide">
                    <div class="thumbnail borderless">
                      <a href="/listing/{{ $more->slug }}">
                        <div class='product-img-container'>
                        <?php $more_img = !empty($more->mainImageUrl) ? $more->mainImageUrl : 'default-logo.png'; ?>
                          <img class='product-img' src="{{ func::img_url($more_img, 300, '', true) }}" alt="image description">
                            @if(Auth::user())
                              <?php $madded = func::is_wishlist(Auth::user()->id, $more->id) == 1 ? ' added' : ''; ?>
                          <a id="{{ $more->id }}" href="javascript:;" data-id="{{ $more->id }}" class="favourite{{ $madded }}"><span class="icon-heart"></span></a>
                            @else
                          <a data-toggle="modal" data-listing="{{$more->id}}" data-target="#login-form" class="favourite" href="#"><span class="icon icon-heart"></span></a>
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
      </div>
    </div>
  </div>
</div>
@include('inc.send-message')
</section>
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css"> 
@endsection
@section('script')
  @include('inc.send-message-script')
  <script type="text/javascript" src="/assets/js/jquery.unveil.js"></script>
  <script type="text/javascript" src="/assets/js/jquery.slick.js"></script>
  <script>
      $(document).ready(function() {
          initSlick();
      });
  </script>
@endsection
