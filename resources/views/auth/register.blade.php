<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxify Registration- Luxify- Asia's leading marketplace for luxury</title>
    <meta name="keywords" content="luxify member registration,luxury goods, luxify sign up, sign up">
    <meta name="description" content="Create a Luxify account to discover one of the Internet’s largest collections of luxury goods.">
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
        }
        .navbar-nav {

        }
        .navbar-nav > li > a{
            margin: 0;
        }
        .form-control, .form-control:focus {
            height: 34px;
        }


        .currency-selector-container {
            margin-right: 0 rem !important;
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
        .form-control{
            box-shadow:none !important;
        }

    </style>
</head>
<body style="background-image: url({{func::img_url('banners/login-main.jpg', '', '', false, true)}})" class="body-bg-full v2">
<div class="parralax"></div>
<div class="container page-container">
    @include('inc.loginheader')
    <div class="page-content">
        <div class="v2">
            <div class="logo"><a target="_self" href='/'><img src="{{ url('./build/images/logo/logo-dark.png') }}" alt="" width="160"></a></div>
            <form id='register-form' role="form" method="POST" action="{{ url('/register') }}" class="form-horizontal">
                {{ csrf_field() }}

                <input name='salt' id='salt' type='hidden' />
                <input name='hashed' id='hashed' type='hidden' />
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="fullname" required name="fullname" type="text" placeholder="@lang('auth.username')" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="email" name="email" required type="text" placeholder="@lang('auth.email')" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" name="password" required type="password" placeholder="@lang('auth.password')" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password_confirmation" name="password_confirmation" required type="password" placeholder="@lang('auth.confirmPassword')" class="form-control">
                    </div>
                </div>
<!--
                <div class="form-group">
                    <div class="col-xs-6">
<?php //echo captcha_img(); ?>
                    </div>
                    <div class="col-xs-6">
                        <input name="captcha" required type="text" class="form-control">
                    </div>
                </div>
-->
                <div class="form-group">
                    <div class="col-xs-12">
                        <div style="margin-bottom: 7px" class="checkbox-inline checkbox-custom">
                            <input type="checkbox" id="agreeTerms" name='agreeTerms' />
                            <label for="agreeTerms" class="checkbox-muted text-muted">@lang('auth.agreeThe') <a href="/terms" target="_blank">@lang('auth.termsPolicies')</a></label>
                        </div>
                    </div>
                </div>
                <button id='submit-btn' type="submit" style="border-radius: 0px!important;" class="btn-lg btn btn-primary btn-block">@lang('auth.signUp')</button>
                <p id="login_error" style="margin: 15px 0; display: none;">
                        <span class="alert danger">@lang('auth.usernameUsed')<br />
                            @lang('auth.choseOther')</span>
                </p>
                <p id="terms_error" style="margin: 15px 0; display: none;">
                    <span class="alert danger">@lang('auth.alertAgreeTermsPolices')</span>
                </p>
            </form>
            <hr>
            <p class="text-muted" style="display: none;">Sign up with Facebook or Twitter accounts</p>
            <div class="clearfix" style="display: none;">
                <div class="pull-left">
                    <button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-primary"><i class="ti-facebook mr-5"></i> Facebook</button>
                </div>
                <div class="pull-right">
                    <button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-info"><i class="ti-twitter-alt mr-5"></i> Twitter</button>
                </div>
            </div>
            <div class="clearfix">
                <p class="text-muted mb-0 pull-left">@lang('auth.alreadyHaveAccount?') </p><a href="/login" class="inline-block pull-right">@lang('auth.signIn')</a>
            </div>
        </div>
    </div>
</div>

<!-- Demo Settings end-->
<!-- jQuery-->
<script type="text/javascript" src="{{ url('./plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript-->
<script type="text/javascript" src="{{ url('./plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Custom JS-->
<script type="text/javascript" src="{{ url('./build/js/first-layout/extra-demo.js') }}"></script>
<script type="text/javascript" src="{{ url('./js/bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ url('./db/js/jquery.validate.min.js') }}"></script>

<!--require for main.js-->
<script type="text/javascript" src="/assets/js/ajaxchimp.js"></script>

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
    $(document).ready(function(){
        changeHeaderSelectMenu();
        initCustomForms();
        $('#langSelect').on('change', function(){
            var code = $(this).val();
            // alert(code);
            window.location.href = '/api/lang/switch/' + code;
        });
        $('#register-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                    minlength: 4
                },
                password: {
                    minlength: 8,
                    required: true,
                    equalTo: '#password_confirmation',
                },
                password_confirmation: {
                    minlength: 8,
                    required: true,
                    equalTo: '#password',
                },
                agreeTerms: {
                    required: function(ele) {
                        return $(ele).prop('checked');
                    },
                }
            },
            messages: {
                password: {
                    equalTo: "Please re-enter the paasword below."
                }
            }
        });
        $('#submit-btn').on('click', function(e) {
            e.preventDefault();
            var token = $('input[name=_token]').val();
            if ($('#register-form').valid()){
                if($('#agreeTerms').prop('checked')) {
                    $.ajax({
                        type: "POST",
                        url: "/login",
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': token},
                        data: {
                            email: $('input#email').val(),
                            action: 'get_email',
                            type: 'register'
                        },
                        dataType: 'json',
                        success: function (data) {
                            if(data.result === 0) {
                                var salt = encrypt.makeSalt();
                                var hashed = encrypt.password($('#password').val(), salt);
                                $('input#salt').val(salt);
                                $('input#hashed').val(hashed);
                                $('form#register-form').submit();
                            }else{
                                $('p#login_error').slideDown(500);
                            }
                        }
                    });
                }else {
                    $('p#terms_error').slideDown(500);
                }
            }
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
    });

</script>
</body>

</html>
