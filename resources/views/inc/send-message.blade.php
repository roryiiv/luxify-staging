<style>
  #login-form-ajax .error {
    color: #b33a3a!important;  
  }
  #login-form-ajax button:disabled, #message-form button:disabled {
    background-color: grey; 
  } 
  #message-form h5 {
    font-weight: 300;
    font-size: 14px;
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
