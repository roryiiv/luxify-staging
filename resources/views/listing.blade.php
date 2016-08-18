@inject('s_meta', 'App\Meta')
@extends('layouts.front')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>
@section('title', trim(preg_replace('/\s\s+/', ' ', $meta->title)))

@section('meta')

<meta name="description" content="{{ func::trimDownText($listing->description, 160)}}">
<meta name="keyword" content="{{$meta->keyword}}">
<meta name="author" content="{{$meta->author}}">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main2.css">

    <style>
     .added span {
       color: red;
     }
     img.listing-img {
       width: 40px!important;
       height: 40px!important;
       margin: 140px!important;
        //opacity: 0;
        //transition: opacity .3s ease-in;
      }
     .Tour3DCTA {
       color: white;
       font-size: 46px;
       text-align: center;
       width: 214px;
       position: relative;
       top: 6rem;
       left: 14rem;
       text-transform: UPPERCASE;
       font-family: 'Roboto';
       font-weight: 100;
     }
    </style>
@endsection
@section('content')
    <!-- main banner of the page -->
    <div class="inner-banner">
        <!-- banner image -->
        <section class="images">
            <?php
                $otherImages = json_decode($listing->images);
                //check if the mainImage is exist on images
                $check_mainImage = array();
                $check_mainImage[] = $listing->mainImageUrl;
                $checking = array_intersect($otherImages, $check_mainImage);
                if(count($checking)===0){
               $images = json_decode($listing->images);
               if (!empty($listing->mainImageUrl)) {
                 // prepend main image to the images array
                 array_unshift($images, $listing->mainImageUrl);
                   }                    
                }else{
                    $images = json_decode($listing->images);
               }

            ?>
            <ul>
                @if($listing->aerialLook3DUrl)
                  <li>
                    <a style="position: relative;" rel="lightbox_3D" class="3DTour fancybox fancybox.iframe" href="{{$listing->aerialLook3DUrl}}">
                      <div style="width:48rem; height: 33rem; position: absolute;" >
                         <h2 class='Tour3DCTA' style="z-index: 2;">3D Virtual Tour
                           <br />
                           <span style="margin-top: 20px; z-index:2" class="glyphicon glyphicon-play-circle"></span>
                         </h2>
                         <div style="width: 100%;height: 100%;background-color:rgba(0,0,0, 0.3);position: absolute; z-index: 1;top: 0;"></div>
                      </div>
                      <img style="width: 48rem; height:33rem;z-index:1;"src="/assets/images/3DTour_sample_2.gif">

                    </a>
                  </li>
                @endif
                @if(is_array($images))
                    @foreach($images as $image)
                    <?php
                    $ori = $s_meta::get_slug_img($image);
                    if($ori!=''){
                        $alt = $s_meta::get_slug_img($image);
                    }else{
                        $alt = 'luxify';
                    }
                    ?>
                        <li>
                          <a rel="fancybox-thumb" href="{{func::img_url($image, 800, '')}}" class="fancybox-thumb">
                            <img class="listing-img" src="/img/ring.gif" data-src="{{ func::img_url($image,'' ,396) }}" />
                          </a>
                        </li>
                    @endforeach
                @else
                    <li><img class="listing-img" src="/img/ring.gif" data-src="{{ func::img_url($listing->mainImageUrl, '', 396) }}" /></li>
                @endif
            </ul>

        </section>
        <div class="bg-img overlay">
        <!--<img src="assets/images/banner-itempage.jpg" alt="image description">-->
        </div>
        <!-- end of banner image -->
    </div>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main" {{schema::itemScope()}}>
        <!-- item description -->
        <div class="item-description">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <aside class="sidebar">
                            <?php
                            $curr = func::getTableByID('currencies', $listing->currencyId);
                            $dealer = func::getTableByID('users', $listing->userId);

                            if(!empty($listing->countryId)) {
                              $country = func::getTableByID('countries', $listing->countryId);
                            }
                            $url = 'http://' . $_SERVER['HTTP_HOST'];
                            $sess_currency = null !==  session('currency') ? session('currency') : 'USD';
                            $price_format = func::formatPrice($listing->currencyId, $sess_currency, $listing->price);
                            ?>
                            <ul class="detail">
                                <li><span class="icon icon-tag"></span><span class="text" itemprop="price" {{schema::itemType('Integer')}}>{{ $price_format }}</span></li>
                                <li><span class="icon icon-globe"></span><span class="text">{{ isset($country) ? $country->name : '' }}</span></li>
                            </ul>
                            <ul class="social-links">
                               <?php $added = func::is_wishlist($user_id, $listing->id) == 1 ? ' added' : ''; ?>
                            @if (Auth::user()) 
                              @if($added !== '')
                                  <li><a {{schema::itemType('URL')}} class="favourite {{$added}}" data-id="{{$listing->id}}" data-toggle='tooltip' data-placement='bottom' title="Remove from your wishlist" href="#"><span class="icon icon-heart"></span></a></li>
                              @else
                                  <li><a {{schema::itemType('URL')}} class="favourite" data-id="{{$listing->id}}" title="{{ $listing->title }}" href="#"><span class="icon icon-heart"></span></a></li>
                              @endif
                            @else
                              <li><a data-toggle="modal" data-listing="{{$listing->id}}" data-target="#login-form" class="" title="{{ $listing->title }}" href="#"><span class="icon icon-heart"></span></a></li>
                            @endif
                                <li>
                                    <a {{schema::itemType('URL')}} class="social-link" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=1100408396697613&amp;display=popup&amp;caption={{urlencode($listing->description)}} &amp;link={{ $url . '/listing/' . $listing->slug}}&amp;redirect_uri={{ $url . '/listing/' . $listing->slug}}">
                                        <span class="icon icon-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a {{schema::itemType('URL')}} class="social-link" target="_blank" href="https://twitter.com/share?url={{ urlencode($url . '/listing/' . $listing->slug) }}&text={{urlencode($listing->description)}}">
                                        <span class="icon icon-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a {{schema::itemType('URL')}} class="social-link" target="_blank" href="https://pinterest.com/pin/create/button/?url={{ $url }}/listing/{{ $listing->slug }}&media=https://s3-ap-southeast-1.amazonaws.com/luxify/images/{{$listing->mainImageUrl}}&description={{ urlencode($listing->description) }}">
                                        <span class="icon icon-pinterest"></span>
                                    </a>
                                </li>
                                {{--Hide this for now as no back end information made for this (faulty by design)  --}}
                                {{-- <li><a href="#"><span class="icon icon-wechat"></span></a></li>
                                <li><a href="#"><span class="icon icon-social"></span></a></li> --}}
                            </ul>
                            @if ($dealer)
                            <?php $slug = $dealer->slug != '' ? $dealer->slug : strtolower($dealer->firstName).'-'.strtolower($dealer->lastName); ?>
                            <div class="link-btn">
                                <div class="logo-aside">
                                    <?php $dealer_img = (isset($dealer->companyLogoUrl) && !empty ($dealer->companyLogoUrl)) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                                    <a href="/dealer/{{$dealer->id}}/{{$slug}}">
                                        <img src="{{ func::img_url($dealer_img, 235) }}" alt="image description" width="233" height="29">
                                    </a>
                                </div>

                                <span class="small-text">Luxify dealer since {{ date("Y", strtotime($dealer->created_at)) }}</span>
                                <div class="btn-holder">
                                    <input type="hidden" name="_ref" value="/listing/{{$listing->slug}}" />
                                    <a {{schema::itemType('URL')}} href="/dealer/{{ $dealer->id }}/{{ $slug }}" class="btn btn-primary">Dealer page</a>
                                    <a {{schema::itemType('URL')}} href="#" id="contact-dealer-btn" data-toggle="modal" data-listing="{{$listing->id}}" data-listing-title='{{$listing->title}}'  data-target="{{ Auth::user() ? '#contact-dealer-form': '#login-form'}}" class="btn btn-primary trans"><span class="glyphicon glyphicon-earphone"></span> Contact dealer</a>
                                    @if($listing->buyNowUrl)
                                    <a {{schema::itemType('URL')}} target="_blank" href="{{$listing->buyNowUrl}}" class="btn btn-primary trans"><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                        </aside>

                        <article class="block-content">
                            <?php $cat = func::getTableByID('categories', $listing->categoryId); ?>
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                @if($category && $category != '')
                                    <li><a  {{schema::itemProp('category')}} {{schema::itemType("URL")}} href="/category/{{ $category['slug'] }}">{{ $category['title'] }}</a></li>
                                @endif
                                <li class="active">{{ $cat && !empty($cat) ? $cat->title : $listing->title }}</li>
                            </ol>
                            <header class="block-header">
                                <h1 {{schema::itemProp('name')}} {{ schema::itemType('Text') }} class="item-title">{{ $listing->title }}</h1>
                                @if(!empty($listing->aerialLook3DUrl))
                                    <a href="{{ $listing->aerialLook3DUrl }}" rel="lightbox_3d_video" data-fancybox-type="iframe" class="btn btn-primary lightbox">3D Virtual Tour &nbsp;<span class="glyphicon glyphicon-play"></span></a>
                                @endif
                                @if(!empty($listing->aerialLookUrl))
                                    <a href="{{ $listing->aerialLookUrl }}" rel="lightbox_video" data-fancybox-type="iframe" class="btn btn-primary lightbox btn-left" >Promotion Video &nbsp;<span class="glyphicon glyphicon-play"></span></a>
                                @endif
                            </header>
                            <div class="description">
                                <h5>Description</h5>
                                <p {{schema::itemProp('description')}} {{schema::itemType('Text')}}>
                                    {!! nl2br(e($listing->description)) !!}
                                </p>
                                @if(!empty($infos))
                                    <h5 style="margin-top:45px;">Specifications</h5>
                                    <table class="table item-description" {{schema::itemProp('additionalProperty')}} {{schema::itemType('PropertyValue')}}>
                                        <thead>
                                        </thead>
                                        <tbody>
                                        @foreach($infos as $info)
                                          <tr>
                                            <th scope="row" style="padding: 8px 0px;" {{schema::itemProp('propertyID')}} {{schema::itemType('Text')}}>{{$info->label}}</th>
                                            <td class='text-center' {{schema::itemProp('value')}} {{schema::itemType('Text')}}>{{$info->value}}</td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif
                            </div>
                        </article>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of item description -->
        <!-- carousel block -->
        <div class="carousel-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h1 class="text-center">More from this seller</h1>
                        <div class="slider">
                            @if(!empty($mores))
                                @foreach($mores as $more)
                                    <div class="slide">
                                        <div class="thumbnail borderless">
                                            <a href="/listing/{{ $more->slug }}">
                                                <div class='product-img-container'>
                                                    <?php $more_img = !empty($more->mainImageUrl) ? $more->mainImageUrl : 'default-logo.png'; ?>
                                                    <img class='product-img' src="/img/spin.gif" data-src="{{ func::img_url($more_img, 300, '', true) }}" alt="image description">
                                                    @if(Auth::user())
                                                        <?php $madded = func::is_wishlist($user_id, $more->id) == 1 ? ' added' : ''; ?>
                                                        <a id="{{ $more->id }}" href="javascript:;" data-id="{{ $more->id }}" class="favourite{{ $madded }}"><span class="icon-heart"></span></a>
                                                    @else
                                                        <a data-toggle="modal" data-listing="{{$more->id}}" data-target="#login-form" class="favourite" href="#"><span class="icon icon-heart"></span></a>

                                                    @endif
                                                </div>
                                            </a>
                                            @if ($dealer)
                                            <div class="caption">
                                                <h3><a href="/listing/{{ $more->slug }}">{{ $more->title }}</a></h3>
                                                <?php
                                                $mseller = func::getTableByID('users', $more->userId);
                                                $msellerImg = !empty($mseller->companyLogoUrl) ? $mseller->companyLogoUrl : 'default-logo.png';
                                                $msess_currency = null !==  session('currency') ? session('currency') : 'USD';
                                                $mprice_format = func::formatPrice($more->currencyId, $msess_currency, $more->price);
                                                ?>
                                                <div>
                                                  <span class="price">{{ $mprice_format }}</span>
                                                </div>
                                                <div class="country-container">
                                                  <span class="country">{{$more->country}}</span>
                                                </div>
                                                <div class="item-logo">
                                                    <img src="{{ func::img_url($msellerImg, 90, '', true) }}" alt="{{ $mseller->fullName }}">
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of carousel block -->
        <!-- carousel block -->
        <div class="carousel-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h1 class="text-center">You may also like</h1>
                        <div class="slider">
                            @if(!empty($relates))
                                @foreach($relates as $rel)
                                    <div class="slide">
                                        <div class="thumbnail borderless">
                                            <a href="/listing/{{ $rel->slug }}">
                                                <div class='product-img-container'>
                                                    <?php $rel_img = !empty($rel->mainImageUrl) ? $rel->mainImageUrl : 'default-logo.png'; ?>
                                                    <img class='product-img' src="/img/spin.gif" data-src="{{ func::img_url($rel_img, 300, '', true) }}" alt="image description">
                                                    @if(Auth::user())
                                                        <?php $rel_added = func::is_wishlist($user_id, $rel->id) == 1 ? ' added' : ''; ?>
                                                        <a id="{{ $rel->id }}" href="javascript:;" data-id="{{ $rel->id }}" class="favourite{{ $rel_added }}"><span class="icon-heart"></span></a>
                                                    @else
                                                        <a data-toggle="modal" data-listing="{{$rel->id}}" data-target="#login-form" class="favourite" href="#"><span class="icon icon-heart"></span></a>
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="caption">
                                                <h3><a href="/listing/{{ $rel->slug }}">{{ $rel->title }}</a></h3>
                                                <?php
                                                  $rel_seller = func::getTableByID('users', $rel->userId);
                                                  $rel_sellerImg = !empty($rel_seller->companyLogoUrl) ? $rel_seller->companyLogoUrl : 'default-logo.png';
                                                  $rel_sess_currency = null !==  session('currency') ? session('currency') : 'USD';
                                                  $rel_price_format = func::formatPrice($rel->currencyId, $rel_sess_currency, $rel->price);
                                                ?>
                                                <div>
                                                </div>
                                                <div class="country-container">
                                                  <span class="country">{{$rel->country}}</span>
                                                </div>
                                                <div class="item-logo">
                                                    <img src="{{ func::img_url($rel_sellerImg, 90, '', true) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of carousel block -->
    </main>
    @include('inc.send-message')
@endsection
@section('scripts')
    <link rel="stylesheet" href="/assets/css/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/assets/js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script>

        var popupSize = {
            width: 780,
            height: 450
        };

        $('.social-links > li > a.social-link').on('click', function(e){
            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
    @if($user_id)
        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
        <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
    @endif
    {{ csrf_field() }}
    <script>
      $(document).ready(function(){
          $(".3DTour").fancybox({
              fitToView	: true,
              width		: '90%',
              height		: '90%',
              autoSize	: true,
              closeClick	: false,
              openEffect	: 'none',
              closeEffect	: 'none',
              arrows: false,
              mouseWheel: false,
          });

          $(".fancybox-thumb").fancybox({
              padding: 2,
              fitToView	: false,
              width		: '70%',
              height		: '70%',
              autoSize	: false,
              closeClick	: false,
              openEffect	: 'none',
              closeEffect	: 'none',
              helpers : {
                  thumbs  : {
                      width : 50,
                      height  : 50
                  }
              }
          });
          $('[data-toggle="tooltip"]').tooltip();

          $("img.listing-img, img.product-img").unveil(300, function() {
            $(this).load(function() {
               $(this).removeClass('listing-img');
               $(this).hide();
               $(this).fadeIn('slow');
            });
          });
      });
    </script>
    @include('inc.send-message-script')
@endsection
