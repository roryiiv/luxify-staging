@extends('layouts.front')

@section('title', 'Luxify - ' . $dealer->fullName)

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>
      #login-form-ajax .error {
        color: #b33a3a!important;  
      }
      #login-form-ajax button:disabled, #message-form button:disabled {
        background-color: grey; 
      } 
      #login-form .container {
          background-color: white;
          height: 510px;
          margin: 10% auto;
          padding: 36px 73px;
          max-width: 800px;
          width: 800px;
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
          margin-top: 35px;
          box-shadow: 1px 1px 5px rgba(0,0,0,0.5); 
          height: 320px;
          width: 100%; 
      }
      #login-form .split-box > .left,.right { 
          width: 50%;
          height: 100%;
          display: block;
          float: left;
          padding: 35px 40px;
      }
      #login-form .split-box > .left { 
          background-color: #5E6977;
      }
      #login-form .split-box > .left a.button { 
          text-decoration: none;
          padding-top: 5px;
      }
      #login-form .button {
          display: block;
          margin: 0 auto!important; 
          float: none!important;
      }

      #login-form .split-box > .left h4 {
          text-align: center;
          font-weight: 400;
          font-size: 18px;
      }
      #login-form .split-box > .left p {
          font-weight: 100;
          font-size: 14px;
          color: #BDC6CF;
          text-align: center;
          margin-bottom: 34px;
          padding: 0px 20px;
          line-height: 28px;
      }
      #login-form .split-box > .right h4 {
          text-align: center;
          font-weight: 400;
          font-size: 18px;
          color: #43484D;
           
      }
      #login-form .split-box > .right p {
          font-weight: 100;
          font-size: 14px;
          color: #86939E;
          text-align: center;
          margin-bottom: 20px;
          line-height: 28px;
      }
      #login-form .split-box > .right input {
          border: 1px solid #d0c8b8;
          padding: 5px;
          width: 100%;  
          color: #998967;
          margin-bottom: 10px;
      }
      #login-form .split-box > .right button {
          margin-top: 21px!important;
      }
      #contact-dealer-form .container {
          background-color: white;
          height: 348px;
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
      #contact-dealer-form h2, #message-sent-form h2{
         text-align: center;
         font-weight: 400;
         color: #56616F;
      }
      #contact-dealer-form button, #login-form button, #login-form a {
         background-color: #998967;
         text-transform: uppercase;
         text-align: center;
         font-weight: 400;
         color: white;
         width: 139px;
         height: 26px;
         float: right;
         border: 0;
         box-shadow: none;
         margin-top: 5px;
         font-size: 10px;
      }
      #message-sent-form .container {
          background-image: url('/assets/images/compass.png');
          background-position-x: 100%;
          background-repeat: no-repeat;
          background-color: white;
          height: 220px;
          margin: 15% auto;
          padding: 36px 85px;
          max-width: 600px;
          width: 600px;
          border: 2px solid #998967;
      }
      #message-sent-form h5 {
          text-align: center;
          color: #56616F;
          font-size: 14px; 
          font-weight: 400;
      }
      #message-sent-form .action-box {
          display: flex;
          flex-direction: row;
          justify-content: space-around; 
          padding-top: 20px;
      }
      #message-sent-form button, #message-sent-form a{
         background-color: #998967;
         text-transform: uppercase;
         text-align: center;
         font-weight: 400;
         color: white;
         width: 165px;
         height: 33px;
         border: 0;
         box-shadow: none;
      }
      #message-sent-form a {
         padding-top: 8px;
         text-decoration: none;
         cursor: pointer;
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
        {!! csrf_field() !!}
        @if(Auth::user()) 
        <div class="modal fade" id="contact-dealer-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
          <div class='container modal-dialog' role='document'>
             <form id="message-form">
                <h2>Send a message</h2>
                <textarea id='content' required rows="8" name="content" placeholder="Let the dealer know why you are interested. A copy of the mesage will be included in your dashboard as well."></textarea>
                <button id="message-send-btn">Send</button> 
                <div class='ajax-loading' style="display:none; margin-top:10px; text-align: center; width:100%">
                    <img src="/assets/images/ajax-loader_2.gif" />
                </div>
                <p style="display:none;" class="error login-error"></p>
             </form>
          </div>
        </div>
        @else
        <div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
          <div class='container'>
             <h2>Welcome to Luxify</h2>
             <h5>Asia’s leading marketplace for Luxury</h5>
             <div class='split-box'>
                 <div class='left'>
                    <h4>I'm New Here</h4>
                    <p>Creating an account quick and easy. You can also have your own wishlist, contact our dealers,  edit your profile, and much more.</p>
                    <a class="button" href="/register">Sign Up</a>
                 </div>
                 <div class='right'>
                    <form id="login-form-ajax" action="login_ajax">
                      <h4>Existing User</h4>
                      <p>Please login to your account</p>
                      <input name="email" id="email" type="text" placeholder="Email" />
                      <input name="password" id="password" type="password"  placeholder="Password" />
                      <input name="_ref" type="hidden" value="/dealer/{{$dealer->id}}" />
                      <button class="button" id="sign-in-btn">Login</button>
                      <div class='ajax-loading' style="display:none; margin-top:10px; text-align: center; width:100%">
                          <img src="/assets/images/ajax-loader_2.gif" />
                      </div>
                      <p style="display:none;" class="error login-error"></p>

                    </form> 
                 </div>
             </div>
          </div>
        </div>
        @endif
        <div class="modal fade" id="message-sent-form" tabindex="-1" role="dialog" aria-labelledby="messageSentForm">
            <div class='container'>
               <h2>Message Sent</h2>
               <h5>Stay tuned! You will receive email notification when the seller reply.</h5>
               <div class="action-box">
                  <a href="/dashboard/mailbox" class='button'>View Inbox</a>
                  <button data-dismiss="modal">Return To Item</button>
               </div>
            </div>
        </div>
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
                        <img src="{{ func::img_url($logo, 360, '', true) }}" alt="image_link">
                    </div>
                </div>
            </div>
        </div>
        <?php $feat = func::getFeatured($dealer->id); ?>
        @if(!empty($feat))
            <?php $mainImageUrl = !empty($feat->mainImageUrl) ? $feat->mainImageUrl : 'about-banner.jpg'; ?>
            <div class="compare-block parallax" style="background-image:url({{ func::img_url($mainImageUrl, 1920, '', true) }});">
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
            		   	   			<img class='product-img' src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 300, '', true) : func::img_url('default-logo.png', 300, '', true) }}" alt="{{ $item->title }}">
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
    <script src="/db/js/jquery.validate.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script>
    $(document).ready(function(){
        $('a.favourite').each(function(){
            $(this).click(function(event){
                // return false; // remove this later after database fixes.
                // event.preventDefault();
                var url = '/wishlist/add', itemID = $(this).attr('data-id'), userID = '{{ $user_id }}', token = $('input[name=_token]').val();
                var data = {uid: itemID, lid: itemID};

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    dataType: "html",
                    success: function(data){
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
        $('#message-form').validate({
          rules: {
            content: {
              required: true
            }
          } 
        });

        $('#login-form-ajax').validate({
          rules: {
            email: {
              required: true,
              email: true 
            },
            password: {
              required: true 
            }
          } 
        });

        $('#sign-in-btn').click(function(e){
          e.preventDefault(); 
          var email = $('input#email').val(), pass = $('input#password').val();
          var token = $('input[name=_token]').val();
          var dataA = {email: email, action: 'get_email'};

          if ($('#login-form-ajax').valid() && !$('#sign-in-btn').prop('disabled')){
            $('#sign-in-btn').prop('disabled', true);
            $('div.ajax-loading').show();
            $.ajax({
                type: "POST",
                url: "/login",
                headers: {'X-CSRF-TOKEN': token},
                data: dataA,
                dataType: "json",
                success: function(data){
                    if (data.result === 1) {
                        var hashed = encrypt.password(pass, data.salt);
                        var salt = data.salt;
                        var _ref = $('input[name=_ref]').val();
                        $.ajax({
                          type: "POST",
                          url: "/login",
                          headers: {'X-CSRF-TOKEN': token},
                          data: {
                            action: 'login_ajax',
                            email: email,
                            salt: salt,
                            hashed: hashed,
                            _ref: _ref     
                          },
                          dataType: 'json',
                          success: function(res) {
                            $('#sign-in-btn').prop('disabled', false);
                            $('div.ajax-loading').hide();
                            if (res.result === 0) {
                              $("p.login-error").html(res.message).slideDown('fast');
                              $('#login-form-ajax input[name=password]').select();
                              setTimeout(function(){
                                $("p.login-error").slideUp('fast'); 
                              }, 5000);
                            } else {
                              window.location = _ref; 
                            }
                          }
                        });
                    }else{
                        $('#sign-in-btn').prop('disabled', false);
                        $('div.ajax-loading').hide();
                        $('p.login-error').html(data.message).show().slideDown('fast');
                        $('#login-form-ajax input[name=email]').select();
                        setTimeout(function() {
                          $("p.login-error").slideUp('fast'); 
                        }, 5000);
                    }
                },
                failure: function(errMsg){
                    alert(errMsg);
                }
            });
            return false;
          }
        });

        $('#message-send-btn').click(function(e){
          e.preventDefault();
          var token = $('input[name=_token]').val();
          if($('#message-form').valid() && !$('#message-send-btn').prop('disabled')) {
            $('#message-send-btn').prop('disabled', true);
            $('#message-form textarea').prop('disabled', true);
            $('div.ajax-loading').show();
            $.ajax({
              type: 'POST',
              url: '/contact/dealer/{{$dealer->id}}',
              headers: {'X-CSRF-TOKEN': token},
              dataType: 'json',
              data: {
                message: $('textarea[name=content]').val()
              },
              success: function(res) {
                if (res.result === 1) {
                  $('#message-send-btn').prop('disabled', false);
                  $('div.ajax-loading').hide();
                  $('#message-form textarea').val('').prop('disabled', false);
                  $('#contact-dealer-form').modal('toggle'); 
                  $('#message-sent-form').modal('toggle');
                } else {
                  $('#message-send-btn').prop('disabled', false);
                  $('div.ajax-loading').hide();
                  $('p.login-error').html(res.message).show().slideDown('fast');
                  $('textarea').select();
                  setTimeout(function() {
                    $("p.login-error").slideUp('fast'); 
                  }, 5000);
                }
              }
            }); 
          }
        });

    });
    </script>
@endsection
