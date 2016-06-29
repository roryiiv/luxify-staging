<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxify - Register</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="./plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="./plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="./plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="./plugins/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="./build/css/first-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-image: url('./build/images/backgrounds/30.jpg')" class="body-bg-full v2">
    <div class="container page-container">
        <div class="page-content">
            <div class="v2">
                <div class="logo"><img src="./build/images/logo/logo-dark.png" alt="" width="160"></div>
                <form id='register-form' role="form" method="POST" action="{{ url('/register') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <input name='salt' id='salt' type='hidden' />
                    <input name='hashed' id='hashed' type='hidden' />
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="fullname" required name="fullname" type="text" placeholder="Username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="email" name="email" required type="text" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" name="password" required type="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password_confirmation" name="password_confirmation" required type="password" placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div style="margin-bottom: 7px" class="checkbox-inline checkbox-custom">
                                <input type="checkbox" id="agreeTerms" name='agreeTerms' />
                                <label for="agreeTerms" class="checkbox-muted text-muted">Agree the <a href="/terms" target="_blank">terms and policies</a></label>
                            </div>
                        </div>
                    </div>
                    <button id='submit-btn' type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign up</button>
                    <p id="login_error" style="margin: 15px 0; display: none;">
                        <span class="alert danger">Username or Email already used.<br />
                            Chose a new one, please.</span>
                    </p>
                    <p id="terms_error" style="margin: 15px 0; display: none;">
                        <span class="alert danger">You have to agree with our terms and policies to continue.</span>
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
                    <p class="text-muted mb-0 pull-left">Already have an account? </p><a href="/login" class="inline-block pull-right">Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Demo Settings end-->
    <!-- jQuery-->
    <script type="text/javascript" src="./plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="./plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="./build/js/first-layout/extra-demo.js"></script>
    <script type="text/javascript" src="/js/bundle.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script>
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
          } else {
            $('p#terms_error').slideDown(500);
          } 
        }
      });
    </script>
</body>

</html>
