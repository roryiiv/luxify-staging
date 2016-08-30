@extends('layouts.front')

@section('title', trim(preg_replace('/\s\s+/', ' ', $meta->title)))

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta')
  <meta name="description" content="{{ func::trimDownText($dealer->companySummary, 160)}}">
  <meta name="keyword" content="{{$meta->keyword}}">
  <meta name="author" content="{{$meta->author}}">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>
        .blocked-seller{
            background: rgba(0,0,0,.8);
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
        }
        .text-holder{
            position: absolute;
            top: 50%;
            bottom: 0;
            left: 0;
            right: 0;
            width: 50%;
            margin: auto;
            text-align: center;
        }
        .text-holder h3{
            color: #fff;
            font-size: 3em;
        }
        .text-holder p{
            font-size: 2em;
        }
    </style>
@endsection
@section('content')
    <?php $banner = !empty($dealer->coverImageUrl) ? $dealer->coverImageUrl : 'about-banner.jpg'; ?>
    @if($dealer->isSuspended == 1)
        <div class="blocked-seller">
            <div class="text-holder">
                <h3>This Account is suspended</h3>
                <p>
                    <a href="{{func::set_url('/')}}">click here to browse again.</a>
                </p>
            </div>
        </div>
    @endif
    <section class="inner-banner dealer-page parallax" style="background-image:url({{ func::img_url($banner, 1960) }});">
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            if(!empty($dealer->companyName) && ($dealer->companyName) !== null){
                              $company = json_decode($dealer->companyName);
                              if ($company === NULL) {
                                  $title = $dealer->companyName; 
                              } else if(is_array($company)){
                                  $title = $company[0]."</br>".$company[1]; 
                              } else {
                                  $title = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName); 
                                }
                            }else{
                              $title = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
                            }
                            if(!empty($dealer->companyName) && ($dealer->companyName)!= null){
                              $company = json_decode($dealer->companyName);
                              if($company === NULL) {
                                $title1 = $dealer->companyName; 
                              } else if(is_array($company)){
                                  $title1 = $company[0]."</br>".$company[1]; 
                                }else{
                                  $title1 = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
                                }
                            }else{
                              $title1 = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
                            }
                            ?>
                            <h1>{!! $title !!}</h1>
                            <p style="visibility: hidden;">Official Ferrari importer in Singapore</p>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <input type="hidden" name="_ref" value="/dealer/{{$dealer->id}}" />
                    <a class="btn btn-default" href="{{func::set_url('/listings/'.$dealer->slug)}}"><span class="glyphicon glyphicon-th-large"></span> @lang('home.dealer_viewlistings')</a>
                    <!--<a href="/dealer/contact/{{ $dealer->id }}/0" class="btn btn-primary smooth-scroll"><span class="glyphicon glyphicon-earphone"></span> Contact dealer</a>-->
                  <a href="#" data-toggle="modal" data-target="{{ Auth::user() ? '#contact-dealer-form': '#login-form'}}" class="btn btn-primary smooth-scroll"><span class="glyphicon glyphicon-earphone"></span> @lang('home.dealer_contactDealer')</a>
              </div>
          </div>
      </div>
  @include('inc/send-message')
  </section>
  <!-- end of banner -->
  <!-- main informative part of the page -->
  <main id="main">
      <div class="container">
          <div class="content-wrapper">
              <div class="row">
                  <div class="col-md-6">
                      <h1>{!! $title1 !!}</h1>
                      @if(!empty($dealer->companySummary)) 
                         <p> {!! nl2br(e($dealer->companySummary)) !!} </p>
                      @else 
                         <span>Coming soon.</span>
                      @endif
                      <ul class="social-networks">
                          @if(!empty($dealer->socialFacebook))
                              <li class="socials_item">
                                  <a href="{{ $dealer->socialFacebook }}">
                                      <span class="icon-facebook"></span>
                                  </a>
                              </li>
                          @endif
                          @if(!empty($dealer->socialTwitter))
                              <li class="socials_item">
                                  <a href="{{ $dealer->socialTwitter }}">
                                      <span class="icon-twitter"></span>
                                  </a>
                              </li>
                          @endif
                          @if(!empty($dealer->socialPinterest))
                              <li class="socials_item">
                                  <a href="{{ $dealer->socialPinterest }}">
                                      <span class="icon-pinterest"></span>
                                  </a>
                              </li>
                          @endif
                          @if(!empty($dealer->socialInstagram))
                              <li class="socials_item">
                                  <a href="{{ $dealer->socialInstagram }}">
                                      <span class="icon-instagram"></span>
                                  </a>
                              </li>
                          @endif
                          @if(!empty($dealer->latitude) && !empty($dealer->longitude))
                              <li class="socials_item">
                              <a class="lightbox fancybox.iframe" href="https://maps.google.com/maps?q={{$dealer->latitude}},{{$dealer->longitude}}&hl=es;z=14&amp;output=embed">
                                <span style="top:2px; left: -1px;" class="glyphicon glyphicon-map-marker"></span>
                              </a>
                              </li>
                          @endif
                      </ul>
                  </div>
                  <?php $logo = !empty($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                  <div class="col-md-5 col-sm-offset-1">
                      <div class="col-md-12" style="margin-bottom: 35px;">
                        <img style="width:50%; margin: 0px auto; display: block;"src="{{ func::img_url($logo, 360, '', true) }}" alt="image_link">
                      </div>
                      <div class="col-md-12">
                        @if(isset($dealer->country) && !empty($dealer->country))
                             <h4 style="text-align: center; margin-bottom: 5px;">{{$dealer->country}}</h4>
                        @endif
                        @if(!empty($dealer->website))
                        <?php 
                            $webpage = str_replace('http://', '', $dealer->website);
                            $webpage = str_replace('https://', '', $webpage);
                            function addhttp($url) {
                                if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                    $url = "http://" . $url;
                                }
                                return $url;
                            }

                        ?>
                            <h5 style="text-align: center;"><a href="{{addhttp($dealer->website)}}" target="_blank">{{$webpage}}</a></td></h5>
                        @endif
                        <table class="table" style="margin: 0 auto; max-width: 330px; text-align: center; margin-top: 20px;">
                        <?php 
                            $addresss = null;
                            if (isset($dealer->companyAddress) && !empty($dealer->companyAddress)) {
                            
                            $address= is_array(json_decode($dealer->companyAddress))? join(" ", json_decode($dealer->companyAddress)) : $dealer->companyAddress;
                            }
                        ?>
                        @if(!empty($address))
                          <tr>
                             <td>
                              <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                             </td>
                             <td>
                                 <span> {{$address}}</span>
                             </td>
                          </tr>
                        @endif 
                        @if(!empty($dealer->latitude) && !empty($dealer->longitude))
                        <tr>
                           <td>
                               <span style="top:2px; left: -1px;" class="glyphicon glyphicon-map-marker"></span>
                           </td>
                           <td>
                              <a class="lightbox fancybox.iframe" href="https://maps.google.com/maps?q={{$dealer->latitude}},{{$dealer->longitude}}&hl=es;z=14&amp;output=embed">
                                View Map                             
                               </a>
                           </td>
                        </tr>
                        @endif
                        @if(!empty(json_decode($dealer->phoneNumber)))
                        <?php 
                            $phones= is_array($dealer->phoneNumber) ? join("<br>", json_decode($dealer->phoneNumber)) : $dealer->phoneNumber ;
                        ?>
                        <tr>
                           <td>
                              <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                           </td>
                           <td>
                               <span> {!! $phones !!}</span>
                           </td>
                          </tr>
                        </div>
                        @endif
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php 
     // $feat = func::getFeatured($dealer->id); 
      $featured = json_decode($dealer->featured_item);

      ?>
      @if($featured == NULL)
        <?php $feat = func::getFeatured($dealer->id); ?>
       	@if($feat == NULL)
       	<div class="compare-block parallax">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="text-box">
                              <h1>This user has not yet list an item.</h1>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
       	@else
        <?php $mainImageUrl = !empty($feat->mainImageUrl) ? $feat->mainImageUrl : 'about-banner.jpg'; ?>
        <div class="compare-block parallax" style="background-image:url({{ func::img_url($mainImageUrl, 1920, '', true) }});">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="text-box">
                              <a href="{{func::set_url('/listing/'.$feat->slug) }}" class="ferrari_featured_link"><strong class="title">@lang('home.dealer_featured')</strong></a>
                              <h1>{{ $feat->title }}</h1>
                              <?php $description = !empty($feat->description) ? $feat->description : 'Coming soon.'; ?>
                              <p>{{ func::truncate(strip_tags($description), 130) }}</p>
                              <a href="{{func::set_url('/listing/'.$feat->slug)}}" class="btn btn-primary">@lang('home.dealer_viewmore')</a>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
        @endif
      @else

      <div  class="cycle-slideshow" style="width:auto;" data-cycle-fx="scrollHorz" data-cycle-timeout="4000" data-cycle-slides="> div.parallax"> 
        @foreach($featured as $value)
              <?php 
              $isi = DB::table('listings')->where('id',$value)->first();
              $mainImageUrl = !empty($isi->mainImageUrl) ? $isi->mainImageUrl : 'about-banner.jpg'; 
              ?>  
              <div class="compare-block parallax" style="background-image:url({{ func::img_url($mainImageUrl, 1920, '', true)}});width: 100%; background-size: 100%;">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="text-box" style="min-height: 500px">
                                  <a href="/listing/{{ $isi->slug }}" class="ferrari_featured_link"><strong class="title">@lang('home.dealer_featured')</strong></a>
                                  <h1>{{ $isi->title }}</h1>
                                  <?php $description = !empty($isi->description) ? $isi->description : 'Coming soon.'; ?>
                                  <p>{{ func::truncate(strip_tags($description), 130) }}</p>
                                  <a href="{{func::set_url('/listing/'.$isi->slug)}}" class="btn btn-primary">@lang('home.dealer_viewmore')</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
            <div class="cycle-prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></div>
            <div class="cycle-next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></div> 
      </div>
      @endif

      <div class="more_items_section">
          <div class="container">
              <div class="heading">
                  <h1 class="text-center">@lang('home.dealer_mftseller')</h1>
              </div>
              <div class="row">
               @if(!empty($listings))
                 @for($i = 0 ; $i < count($listings); $i++)
                   <?php $item = $listings[$i]; ?>
                   <div class="col-md-4 col-sm-6">
                     <div class="thumbnail">
                        <a href="{{func::set_url('/listing/'.$item->slug)}}">
                        <div class='product-img-container'>
                          <img class='product-img' src="/img/spin.gif" data-src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 300, '', true) : func::img_url('default-logo.png', 300, '', true) }}" alt="{{ $item->title }}">
                              @if(Auth::user())
                                <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                <a id="{{ $item->id }}" href="javascript:;" data-id="{{ $item->id }}" class="favourite{{ $added }}"><span class="icon-heart"></span></a>
                              @endif
                        </div>
                        </a>
                       <div class="caption">
                        <h3><a href="{{func::set_url('/listing/'.$item->slug)}}">{{ $item->title }}</a></h3>
                            <?php
                              $curr = func::getTableByID('currencies', $item->currencyId);
                              $dealer = func::getTableByID('users', $item->userId);
                              $raw_price = $item->price == 0 ? 'Price on request' : $curr->symbol . number_format($item->price, 0) .' '. $curr->code;
                              $price_format = $raw_price;
                            ?>
                        <div>
                          <span class="price">{{ $price_format }}</span>
                        </div>
                        <div class="country-container">
                          <span class="country">{{$item->country}}</span>
                        </div>
                        <div class="item-logo">
                          <img src="{{ !empty($dealer->companyLogoUrl) ? func::img_url($dealer->companyLogoUrl, 200, '', true) : func::img_url('default-logo.png', 200, '', true) }}" alt="image description">
                        </div>
                       </div>
                     </div>
                   </div>
                   @if(($i+1)%3 ===0)
                     <div class="clearfix visible-md-block"></div>
                   @endif
                   @if(($i+1)%2 ===0)
                     <div class="clearfix visible-sm-block"></div>
                   @endif
                 @endfor
               @else
                 <div class="col-md-12 col-sm-12">
                   <p>
                     No Items found
                   </p>
                 </div>
               @endif
              </div>
          </div>
      </div>
  </main>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
                              
          $("img.product-img").unveil(300, function() {
            $(this).load(function() {
               $(this).hide();
               $(this).fadeIn('slow');
            });
          });
        });
    </script>
    @if(Auth::user())
        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
        <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
        <script src="/assets/js/jquery.cycle2.min.js"></script>
        <script>
        $(document).ready(function(){
            $('a.favourite').each(function(){
                $(this).click(function(event){
                    // return false; // remove this later after database fixes.
                    // event.preventDefault();
                    if($(this).hasClass('added')){
                        var url = '/dashboard/wishlist/delete', itemID = $(this).attr('data-id'), userID = {{ $user_id }}, token = $('input[name=_token]').val();
                        // console.log(token);
                        var data = {uid: userID, lid: itemID};
                        swal({
                            title: "Delete item",
                            text: "Are you sure you want to delete item from Wishlist?",
                            type: "info",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(){
                            $.ajax({
                                type: 'POST',
                                url: url,
                                headers: {'X-CSRF-TOKEN': token},
                                data: data,
                                dataType: "html",
                                success: function(data){
                                    // console.log(data); return false;
                                    if(data == 3){
                                        swal("Item is deleted!");
                                        $('a#'+itemID).removeClass('added');
                                    }else{
                                        swal("Error!");
                                    }
                                },
                                error: function(errMsg){
                                    console.log(errMsg.responseText);
                                }
                            });
                        });
                    }else{
                        var url = '/dashboard/wishlist/add', itemID = $(this).attr('data-id'), userID = {{ $user_id }}, token = $('input[name=_token]').val();
                        // console.log(token);
                        var data = {uid: userID, lid: itemID};
                        swal({
                            title: "Add to Wishlist",
                            text: "Are you sure you want to add item to your Wishlist?",
                            type: "info",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(){
                            $.ajax({
                                type: 'POST',
                                url: url,
                                headers: {'X-CSRF-TOKEN': token},
                                data: data,
                                dataType: "html",
                                success: function(data){
                                    if(data == 1){
                                        swal("Item is added!");
                                        $('a#'+itemID).addClass('added');
                                    }else{
                                        swal("Item has been readded!");
                                        $('a#'+itemID).addClass('added');
                                    }
                                },
                                error: function(errMsg){
                                    console.log(errMsg.responseText);
                                }
                            });
                        });
                    }
                });
            });
        });
        </script>
    @endif
    @include('inc.send-message-script')
@endsection
