<style>
/*   Where mobile css define */
  a.editListing, a.deleteListing {
    border-radius: 40px;
    background-color: rgba(0,0,0,0.1);
    padding: 7px;
    position: absolute;
  }
  a.editListing {
    top: 0;
    right: 50px;
  }
  a.deleteListing {
    top: 0;
    right: 10px;
  }
  a.editListing > span, a.deleteListing > span {

    width: 17px;
  }

  .modal-content {
    border-radius: 0px;
  }
  .modal-body {
    padding: 25px;
  }
  #login-form h2, #login-form h5 {
    text-align: center;
  } 
  #login-form .right {
    margin-top: 10px; 
  }
  #login-form .right a {
    padding-top: 8px; 
  }
  #login-form .right input {
    width: 100%; 
    border: 1px solid #d0c8b8;
    color: #998967;
    margin-bottom: 10px;
    height: 30px;
    font-size: 1.2rem
  }
  #contact-dealer-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #contact-dealer-form .modal-content {
    height: 100%;
  } 
  
  #contact-dealer-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
  }
  #added-to-wishlist  .modal-content .modal-header > h5,
  #message-sent-form  .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
  }
  #added-to-wishlist .modal-content .action-box,
  #message-sent-form .modal-content .action-box {
    display: flex;
    flex-direction: row;
    justify-content: space-around;  
  }
  #added-to-wishlist .modal-content .action-box a,
  #message-sent-form .modal-content .action-box a {
    padding-top: 9px; 
  }
  #added-to-wishlist .modal-content .action-box a,
  #message-sent-form .modal-content .action-box a,
  #added-to-wishlist .modal-content .action-box button,
  #message-sent-form .modal-content .action-box button {
    background-color: #998967;
    text-transform: uppercase;
    text-align: center;
    font-weight: 400;
    color: white;
    width: 130px;
    height: 33px;
    border: 0;
    box-shadow: none;
    font-size: 1.2rem; 
  }
/*  mobile css end */
  @media (min-width: 768px) {
    #login-form .modal-dialog {
      width: 800px;
      height: 50%;
      min-height: 500px
    }

    #contact-dealer-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #added-to-wishlist .modal-dialog {
      width: 640px;
      height: 29%;
      min-height: 258px
    }

    #message-sent-form .modal-dialog {
      width: 640px;
      height: 37%;
      min-height: 258px
    }
    #login-form .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 100%;
    /*    width: 800px; */
        border: 2px solid #998967;
        border-radius: 0px;
    }
    #contact-dealer-form .modal-header {
        padding: 0px;
    } 
    
    #contact-dealer-form .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 100%;
    /*    width: 800px; */
        border: 2px solid #998967;
        border-radius: 0px;
    }
    #added-to-wishlist .modal-content ,
    #message-sent-form .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 100%;
    /*    width: 800px; */
        border: 2px solid #998967;
        border-radius: 0px;
    }
    .modal-content .modal-header {
      border-bottom: 0px solid #fff;
    }
    .modal-content .modal-body {
      padding: 0px!important;
    }
    #login-form h2 {
       color: #5E6977;
       text-align: center;
       font-weight: 400;
       margin-bottom: 0px;
       font-size: 36px;
       text-transform: capitalize;
    }
    #login-form h5 {
       margin-top: 5px;
       font-size: 15px;
       font-weight: 300;
       text-align: center;
    }
    #login-form .split-box { 
        box-shadow: 1px 1px 5px rgba(0,0,0,0.5); 
        height: 320px;
        width: 100%; 
        margin: 0px!important;
    }
    #login-form .split-box > div {
        height: 100%; 
        padding: 0;
    }
    #login-form .split-box .left,.right { 
        height: 100%;
        display: block;
        float: left;
        padding: 35px 40px;
    }
    #login-form .split-box .left { 
        background-color: #5E6977;
    }
    #login-form .split-box .left a.button { 
        text-decoration: none;
        padding-top: 7px;
        font-weight: 500;
        font-size: 13px;
    }
    #login-form .button {
        display: block;
        margin: 0 auto!important; 
        float: none!important;
    }

    #login-form .split-box .left h4 {
        text-align: center;
        font-weight: 400;
        font-size: 18px;
        color: white;
    }
    #login-form .split-box .left p {
        font-weight: 300;
        font-size: 1.4rem;
        color: #BDC6CF;
        text-align: center;
        margin-bottom: 60px;
        padding: 0px 20px;
        line-height: 28px;
    }
    #login-form .split-box .right h4 {
        text-align: center;
        font-weight: 400;
        font-size: 18px;
        color: #43484D;
         
    }
    #login-form .split-box  .right p {
        font-weight: 300;
        font-size: 1.4rem;
        color: #86939E;
        text-align: center;
        margin-bottom: 25px;
        line-height: 28px;
    }
    #login-form .split-box .right input {
        border: 1px solid #d0c8b8;
        padding: 5px;
        width: 100%;  
        color: #998967;
        margin-bottom: 15px;
        height: 30px;
        font-size: 1.2rem
    }
    #login-form .split-box .right button {
        margin-top: 20px!important;
        font-weight: 500;
    }
   /* Login form css end */
    #message-sent-form .modal-content {
        background-image: url('/assets/images/compass.png');
        background-position-x: 100%;
        background-position-y: 50%;
        background-repeat: no-repeat;
        background-color: white;
    }
    #added-to-wishlist h5,
    #message-sent-form h5 {
        text-align: center;
        color: #56616F;
        font-size: 15px; 
        font-weight: 400;
    }
    #added-to-wishlist .action-box,
    #message-sent-form .action-box {
        display: flex;
        flex-direction: row;
        justify-content: space-around; 
        padding-top: 20px;
    }
    #added-to-wishlist button, #added-to-wishlist a,
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
       font-size: 1.2rem
    }
    #added-to-wishlist a,
    #message-sent-form a {
       padding-top: 8px;
       text-decoration: none;
       cursor: pointer;
    }

  }

  .modal-content .modal-header > h2,h5 {
     color: #56616F;
  }
  #login-form-ajax .error {
    color: #b33a3a!important;  
    font-size: 12.rem;
  }
  #login-form-ajax button:disabled, #message-form button:disabled {
    background-color: grey; 
  } 
  #message-form h5 {
    font-weight: 300;
    font-size: 15px;
  }
  #contact-dealer-form .container {
      background-color: white;
      /* height: 348px; */
      height: auto;
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
  #contact-dealer-form h2, #message-sent-form h2, #added-to-wishlist h2{
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
     height: 30px;
     float: right;
     border: 0;
     box-shadow: none;
     margin-top: 5px;
     font-size: 10px;
     padding-top: 4px;
  }
  #added-to-wishlist .modal-content{
      background-image: url('/assets/images/favorite_64x64.png');
      background-position-x: 100%;
      background-position-y: 50%;
      background-repeat: no-repeat;
      background-color: white;
  } 
  
</style>
{!! csrf_field() !!}
@if(Auth::user()) 
<div class="modal fade" id="contact-dealer-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h2>@lang('home.sm_sendMessege')</h2>
      </div>
      <div class="modal-body"> 
        <form id="message-form">
           <textarea id='content' required rows="8" name="content" placeholder="Let the dealer know why you are interested. A copy of the mesage will be included in your dashboard as well."></textarea>
           <input type="hidden" id="listing-id" value="{{ isset($listing->id) ? $listing->id : 0 }}" />
           <button id="message-send-btn">@lang('home.sm_send')</button>
           <div class='ajax-loading' style="display:none; margin-top:10px; text-align: center; width:100%">
               <img src="/assets/images/ajax-loader_2.gif" />
           </div>
           <p style="display:none;" class="error login-error"></p>
        </form>
      </div> 
    </div>
  </div>
</div>
@else
<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby='contactDealerForm'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h2>@lang('home.sm_welcome')</h2>
        <h5>@lang('home.sm_description')</h5>
      </div>
      <div class="modal-body"> 
        <div class="row split-box" >
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div class="left">
               <h4>@lang('home.sm_newhere')</h4>
               <p>@lang('home.sm_messegeLeft')</p>
               <a class="button" href="/register">@lang('auth.signUp')</a>
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div class="right">
               <form id="login-form-ajax">
                 <h4>@lang('home.sm_existinguser')</h4>
                 <p>@lang('home.sm_pleaselogin')</p>
                 <input name="email" id="email" type="text" placeholder="@lang('auth.email')" />
                 <input name="password" id="password" type="password"  placeholder="@lang('auth.password')" />
            
<?php if(!isset($dealer) || empty($dealer)) {
  $dealer = (object) ['id' => 0];
} 
?>
                 <button class="button" id="sign-in-btn">@lang('home.sm_login')</button>
                 <div class='ajax-loading' style="display:none; margin-top:10px; text-align: center; width:100%">
                     <img src="/assets/images/ajax-loader_2.gif" />
                 </div>
                 <p style="display:none;" class="error login-error"></p>
               </form>
             </div>
           </div>
        </div>
      </div>
    </div>
  </div> 
</div>
@endif
<div class="modal fade" id="message-sent-form" tabindex="-1" role="dialog" aria-labelledby="messageSentForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h2>@lang('home.sm_messageSent')</h2>
        <h5>@lang('home.sm_stayTuned')</h5>
      </div>
      <div class="modal-body"> 
        <div class="action-box">
          <a href="/dashboard/mailbox" class='button'>@lang('home.sm_viewInbox')</a>
          <button data-dismiss="modal">@lang('home.sm_returnItem')</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="added-to-wishlist" tabindex="-1" role="dialog" aria-labelledby="addToWishlist">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h2>@lang('home.sm_addedWishlist')</h2>
        <h5>@lang('home.sm_checkWishlist')</h5>
      </div>
      <div class="modal-body"> 
        <div class="action-box">
          <a href="/dashboard/wishlist" class='button'>@lang('home.sm_viewWishlist')</a>
          <button data-dismiss="modal">@lang('home.sm_returnItem')</button>
        </div>
      </div>
    </div>
  </div>
</div>
