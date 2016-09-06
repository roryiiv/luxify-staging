<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Registration- Luxify- Asia's leading marketplace for luxury</title>
    <meta name="keywords" content="luxify member registration,luxury goods">
    <meta name="description" content="Register for an account for free to discover one of the Internet’s largest collections of luxury goods and experiences.">
    <!-- PACE-->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{url('./plugins/PACE/themes/blue/pace-theme-flash.css')}}">
    <script type="text/javascript" src="{{url('./plugins/PACE/pace.min.js')}}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('./plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{url('./plugins/themify-icons/themify-icons.css')}}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{url('./build/css/first-layout.css')}}">
    <link rel="stylesheet" href="/assets/css/luxify.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /*normalize css from main.css*/
        .btn{
            min-width: 0;
            letter-spacing: 0;
            text-transform: unset;
        }
        .navbar-brand img {
            max-width:unset;
            width:auto;
        }
        .form-group label {
            padding-top: 0px;
        }
        .navbar-right {
            margin-right: 0px;
            letter-spacing: 0px;
        }
        .navbar-nav {
            padding-top: 0px;
        }
        .navbar-nav > li > a{
            margin: 0;
        }
        .form-control, .form-control:focus {
            height: 34px;
        }


        .currency-selector-container {
            margin-right: 2.4rem;
        }
        .jcf-hidden {
            position: absolute !important;
            left: -9999px !important;
            height: 1px !important;
            width: 1px !important;
            margin: 0px !important;
            border-width: 0px !important;
            -moz-appearance: none;
        }
        .currency-selector-container .jcf-select {
            font-weight: 200;
        }
        .currency-selector-container .jcf-select {
            background-color: transparent;
            height: 30px;
            border: 1px solid white;
            border-radius: 0;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            cursor: default;
            display: block;
            font-size: 14px;
        }
        .jcf-unselectable {
            -moz-user-select: none;
        }
        .jcf-select {
            display: inline-block;
            vertical-align: top;
            position: relative;
            background: #fff;
            width: 100%;
            height: 42px;
            margin-right: 8px;
            border: 1px solid #c5c5c5;
        }
        .currency-selector-container .jcf-select .jcf-select-text {
            color: white;
            line-height: 30px;
        }
        .jcf-select .jcf-select-text {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            cursor: default;
            display: block;
            font-size: 14px;
            line-height: 40px;
            color: #988866;
            margin: 0 35px 0 8px;
        }
        .currency-selector-container .jcf-select .jcf-select-opener {
            color: white;
        }
        .jcf-select .jcf-select-opener {
            position: absolute;
            text-align: center;
            width: 26px;
            bottom: 0;
            right: 0;
            top: 0;
        }
    </style>
</head>

<body style="background-image: url({{func::img_url('banners/login-main.jpg', '', '', false, true)}})" class="body-bg-full v2">
    <div class="container page-container">
        @include('inc.loginheader')
        <div class="page-content">
        	@if(isset($_GET['success']))
            <div class="v2" style="height: 210px;">
            @else
            <div class="v2">
            @endif
                <div class="logo"><a target="_self" href='/'><img src="./build/images/logo/logo-dark.png" alt="" width="160"></a></div>
                @if(isset($_GET['success']))
                	<div class="form-group">
                        <div class="col-xs-12">@lang('static.forget_password_email')</div>
                    </div>
                     <div class="form-group">
                        <div class="col-xs-12">&nbsp;</div>
                    </div>
                @else
                <form id='forgot-form' method="POST" action="{{ url('/forget-password') }}" class="form-horizontal">
                    
                {{ csrf_field() }}
                    
                    <div class="form-group">
                        <div class="col-xs-12">@lang('static.forget_password_forgot')</div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12">@lang('static.forget_password_enter')</br>@lang('static.forget_password_account')</div>
                    </div>
                    <?php
                    if(!empty($_GET['error'])){
                      echo '<div style="color: #8a8044;">Email Not Found !</div>' ;
                    }
                    ?>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="email" name="email" required type="text" placeholder="Enter Email" class="form-control">
                            <div class="log" style="display:none;"></div>
                        </div>
                    </div>
                    
                    <button id='submit-btn' type="submit" style="border-radius: 0px!important;" class="btn-lg btn btn-primary btn-block">@lang('static.forget_password_reset')</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Demo Settings end-->
    <!-- jQuery-->
    <script type="text/javascript" src="{{url('./plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="{{url('./plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="./build/js/first-layout/extra-demo.js"></script>
    <script type="text/javascript" src="/js/bundle.min.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.customForms.js"></script>

    <script>
      
    function changeHeaderSelectMenu(){
    
      $('#currSelect').on('change', function(){
        var code = $(this).val();
        // alert(code);
        window.location.href = '/api/currency/switch/' + code;
      });
      $('#langSelect').on('change', function(){
        var code = $(this).val();
        // alert(code);
        window.location.href = '/api/lang/switch/' + code;
      });
    
    }
    // initialize custom form elements
    function initCustomForms() {
      jcf.setOptions('Select', {
        wrapNative: false
      });
      jcf.replaceAll();
    }
      $(document).ready(function() {
        changeHeaderSelectMenu();
        initCustomForms();
      });
      $('#submit-btn').on('click', function() {
          var check_email = $('#email').val();
          var emailreg = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            console.log(update_email);

            $.getJSON('/api/ajax/checkemail/{email}', {email: check_email}, function (json) {
                

                console.log(json.response);
                if (json.response == true )
                {
                    $("#email").css({'border' : '1px solid #8a8044'});
                    $("#email").focus();
                    $("div.log").text( "Email In Use!" );
                    $("div.log").fadeIn('slow');
                }
                else
                {  

                    if(emailreg.test(check_email)){
                        
                        $("#email").css({'border' : '1px solid #e6e6e6'});
                        $("div.log" ).text("");
                        $("div.log").fadeOut('fast');
                       
                       
                    }
                    else {
                        $("#email").css({'border' : '1px solid #8a8044'});
                        $("email").focus();
                        $("div.log" ).text( "Email Not Valid!" );
                        $("div.log").fadeIn('slow');
                         
                    }

                }
                console.log(json);
            });
            
            return false; 
        
      });
    $('.dropdown-toggle').dropdown().hover(function() {
      $(this).dropdown('toggle');
    }, function(){
    
    });
    $('.dropdown-menu').hover(function(){
      }, 
      function(e){
        $(this).dropdown('toggle');
        e.stopPropagation();
      })
    </script>
</body>

</html>
