@extends('layouts.front')

@section('title', 'Luxify - ' . $dealer->fullName)

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>
      #login-form .container {
          background-color: white;
          height: 400px;
          margin: 15% auto;
          padding: 36px 36px;
          max-width: 600px;
          width: 1000px;
          border: 2px solid #998967;
      }
      #login-form .container > h2,h5 {
         color: #56616F;
      }
      #login-form h2 {
         color: #5E6977;
         text-align: center;
         font-weight: 400;
         margin-bottom: 0px;
         font-size: 36px;
      }
      #login-form h5 {
         margin-top: 5px;
         font-size: 14px;
         font-weight: 300;
         text-align: center;
      }
      #login-form .split-box { 
          margin-top: 20px;
          box-shadow: 1px 1px 5px rgba(0,0,0,0.5); 
          height: 250px;
          width: 100%; 
      }
      #login-form .split-box > .left,.right { 
          width: 50%;
          height: 100%;
          display: block;
          float: left;
          padding: 20px;
      }
      #login-form .split-box > .left { 
          background-color: #5E6977;
      }

      #login-form button {
          display: block;
          margin: 0 auto!important; 
          float: none!important;
      }

      #login-form .split-box > .left h4 {
          text-align: center;
          font-weight: 200;
          font-size: 16px;
      }
      #login-form .split-box > .left p {
          font-weight: 100;
          font-size: 10px;
          color: #BDC6CF;
          text-align: center;
      }
      #login-form .split-box > .right h4 {
          text-align: center;
          font-weight: 200;
          font-size: 16px;
          color: #43484D;
           
      }
      #login-form .split-box > .right p {
          font-weight: 100;
          font-size: 10px;
          color: #86939E;
      }
      #contact-dealer-form .container {
          background-color: white;
          height: 336px;
          margin: 15% auto;
          padding: 36px 85px;
          max-width: 600px;
          width: 600px;
          border: 2px solid #998967;
      }
      #contact-dealer-form textarea {
        width: 100%;
        border: 2px solid #E1E8EE;
        padding: 20px;
        color: #86939E;
        font-size: 14px; 
        resize: none;
      }
      #contact-dealer-form h2 {
         text-align: center;
         font-weight: 400;
         color: #56616F;
      }
      #contact-dealer-form button, #login-form button {
         background-color: #998967;
         text-transform: uppercase;
         text-align: center;
         font-weight: 200;
         color: white;
         width: 139px;
         height: 26px;
         float: right;
         border: 0;
         box-shadow: none;
         margin-top: 5px;
         font-size: 10px;
      }
    </style>

@endsection
@section('content')
    <?php $banner = !empty($dealer->coverImageUrl) ? $dealer->coverImageUrl : 'about-banner.jpg'; ?>
    <section class="inner-banner parallax" style="background-image:url({{ func::img_url($banner, 1960) }});">
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $title = !empty($dealer->companyName) ? $dealer->companyName :  $dealer->firstName . ' ' . $dealer->lastName; ?>
                            <h1>{{ $title }}</h1>
                            <p style="visibility: hidden;">Official Ferrari importer in Singapore</p>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <a class="btn btn-default" href="/search?search=&user_id={{$dealer->id}}"><span class="glyphicon glyphicon-th-large"></span> View listings</a>
                    <!--<a href="/dealer/contact/{{ $dealer->id }}/0" class="btn btn-primary smooth-scroll"><span class="glyphicon glyphicon-earphone"></span> Contact dealer</a>-->
                    <a href="#" data-toggle="modal" data-target="{{ Auth::user() ? '#contact-dealer-form': '#login-form'}}" class="btn btn-primary smooth-scroll"><span class="glyphicon glyphicon-earphone"></span> Contact dealer</a>
                </div>
            </div>
        </div>
        @if(Auth::user()) 
        <div class="modal fade" id="contact-dealer-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
          <div class='container modal-dialog' role='document'>
             <form>
                <h2>Send a message</h2>
                <textarea rows="8" name="content" placeholder="Let the dealer know why you are interested. A copy of the mesage will be included in your dashboard as well."></textarea>
                <button>Send</button> 
             </form>
          </div>
        </div>
        @else
        <div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
          <div class='container'>
             <form>
                <h2>Welcome to Luxify</h2>
                <h5>Asia’s leading marketplace for Luxury</h5>
                <div class='split-box'>
                    <div class='left'>
                       <h4>I'm New Here</h4>
                       <p>Creating an account quick and easy. You can also have your own wishlist, contact our dealers,  edit your profile, and much more.</p>
                       <button>Sign Up</button>
                    </div>
                    <div class='right'>
                       <form>
                         <h4>I'm Ready</h4>
                         <p>PLease login to your account</p>
                         <input name="email" type="text" placeholder="Email" />
                         <input name="password" type="password"  placeholder="Password" />
                         <button>Sign In</button>
                       </form> 
                    </div>
                </div>
             </form>
          </div>
        </div>
        @endif

    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <div class="container">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ $title }}</h1>
                        <p>{{ !empty($dealer->companySummary) ? $dealer->companySummary : 'Coming soon.' }}</p>
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
                            @if(!empty($dealer->socialInstagram))
                                <li class="socials_item">
                                    <a href="{{ $dealer->socialInstagram }}">
                                        <span class="icon-instagram"></span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <?php $logo = !empty($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                    <div class="col-md-5 col-sm-offset-1">
                        <img src="{{ func::img_url($logo, 360) }}" alt="image_link">
                    </div>
                </div>
            </div>
        </div>
        <?php $feat = func::getFeatured($dealer->id); ?>
        @if(!empty($feat))
            <?php $mainImageUrl = !empty($feat->mainImageUrl) ? $feat->mainImageUrl : 'about-banner.jpg'; ?>
            <div class="compare-block parallax" style="background-image:url({{ func::img_url($mainImageUrl, 1920) }});">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-box">
                                <a href="/listing/{{ $feat->slug }}" class="ferrari_featured_link"><strong class="title">Featured</strong></a>
                                <h1>{{ $feat->title }}</h1>
                                <?php $description = !empty($feat->description) ? $feat->description : 'Coming soon.'; ?>
                                <p>{{ func::truncate(strip_tags($description), 130) }}</p>
                                <a href="/listing/{{ $feat->slug }}" class="btn btn-primary">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="more_items_section">
            <div class="container">
                <div class="heading">
                    <h1 class="text-center">More From This Seller</h1>
                </div>
                <div class="row">
                 @if(!empty($listings))
                   @for($i = 0 ; $i < count($listings); $i++)
                     <?php $item = $listings[$i]; ?>
                     <div class="col-md-4 col-sm-6">
        				   	   <div class="thumbnail">
                          <a href="/listing/{{ $item->slug }}">
            		   	   		<div class='product-img-container'>
            		   	   			<img class='product-img' src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 400) : func::img_url('default-logo.png', 400) }}" alt="{{ $item->title }}">
                                @if(Auth::user())
                                  <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                  <a id="{{ $item->id }}" href="javascript:;" data-id="{{ $item->id }}" class="favourite{{ $added }}"><span class="icon-heart"></span></a>
                                @endif
            		   	   		</div>
                          </a>
        				   	     <div class="caption">
        				   	   	  <h3><a href="/listing/{{ $item->slug }}">{{ $item->title }}</a></h3>
                              <?php
                                $curr = func::getTableByID('currencies', $item->currencyId);
                                $dealer = func::getTableByID('users', $item->userId);
                                $raw_price = $item->price == 0 ? 'Price on request' : $curr->symbol . number_format($item->price, 0) .' '. $curr->code;
                                $price_format = $raw_price;
                              ?>
        				   	   	  <span class="price">{{ $price_format }}</span>
        				   	   	  <div class="item-logo">
        				   	   	   	<img src="{{ !empty($dealer->companyLogoUrl) ? func::img_url($dealer->companyLogoUrl, 300) : func::img_url('default-logo.png', 300) }}" alt="image description">
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
    {{ csrf_field() }}
    <script>
    $(document).ready(function(){
        $('a.favourite').each(function(){
            $(this).click(function(event){
                // return false; // remove this later after database fixes.
                // event.preventDefault();
                var url = '/wishlist/add', itemID = $(this).attr('data-id'), userID = {{ $user_id }}, token = $('input[name=_token]').val();
                console.log(token);
                var data = {uid: itemID, lid: itemID};

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    dataType: "html",
                    success: function(data){
                        console.log(data);
                        if(data == 0){
                            alert('Duplicated item, please contact Admin.');
                        }else{
                            alert('Added to your Wishlist.');
                            $('a#'+itemID).addClass('added');
                        }
                    },
                    error: function(errMsg){
                        console.log(errMsg.responseText);
                    }
                });
            });
        });
    });
    </script>
@endsection
