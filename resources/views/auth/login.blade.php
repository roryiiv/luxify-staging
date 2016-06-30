<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxify - Login</title>
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
        @include('inc.loginheader')
        <div class="page-content">
            <div class="v2">
                <div class="logo"><a target="_self" href='/'><img src="./build/images/logo/logo-dark.png" alt="" width="160"></a></div>
                <form name="form_login" method="post" action="/login" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="email" name="email" type="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox-inline checkbox-custom pull-left">
                                <input id="exampleCheckboxRemember" type="checkbox" value="remember">
                                <label for="exampleCheckboxRemember" class="checkbox-muted text-muted">Remember me</label>
                            </div>
                            {{--<div class="pull-right"><a href="/forget-password" class="inline-block form-control-static">Forgot a Passowrd?</a></div>--}}
                        </div>
                    </div>
                    <button id="login_btn" type="submit" class="btn-lg btn btn-primary btn-block" style="border-radius: 0px;">Sign in</button>
                    <input type="hidden" id="action" name="action" value="" />
                    <input type="hidden" id="salt" name="salt" value="" />
                    <input type="hidden" id="hashed" name="hashed" value="" />
                    <p id="login_error" style="margin: 15px 0; display: none;">
                        <span class="alert danger" style="color: red;">Username or Email is not registered.</span>
                    </p>
                    @if(isset($_GET['err']))
                        <p id="login_error" style="margin: 15px 0;">
                            <span class="alert danger">{{ ucfirst($_GET['err']) }}</span>
                        </p>
                    @endif
                </form>
                <hr>
                <p class="text-muted" style="display: none;">Sign in with your Facebook or Twitter accounts</p>
                <div class="clearfix" style="display: none;">
                    <div class="pull-left">
                        <a href="javascript:;" type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-primary"><i class="ti-facebook mr-5"></i> Facebook</a>
                    </div>
                    <div class="pull-right">
                        <button type="button" style="width: 130px" class="btn btn-outline btn-rounded btn-info"><i class="ti-twitter-alt mr-5"></i> Twitter</button>
                    </div>
                </div>
                {{-- <hr> --}}
                <div class="clearfix">
                    <p class="text-muted mb-0 pull-left">Want new account?</p><a href="/register" class="inline-block pull-right">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery-->
    <script type="text/javascript" src="./plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="./plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="./build/js/first-layout/extra-demo.js"></script>
    <script type="text/javascript" src="/js/bundle.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {

      $('form[name=form_login]').validate({
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
        $('#login_btn').click(function(event){
            event.preventDefault();

            var email = $('input#email').val(), pass = $('input#password').val();
            var token = $('input[name=_token]').val();
            var dataA = {email: email, action: 'get_email'};
            

            // prepping first AJAX call
            if ($('form[name=form_login]').valid()){
              $.ajax({
                  type: "POST",
                  url: "/login",
                  headers: {'X-CSRF-TOKEN': token},
                  data: dataA,
                  // contentType: "application/json; charset=utf-8",
                  dataType: "json",
                  success: function(data){
                      if (data.result === 1) {
                          // console.log(data);
                          var hashed = encrypt.password(pass, data.salt);
                          $('input#action').val('login');
                          $('input#salt').val(data.salt);
                          $('input#hashed').val(hashed);
                          $('form[name="form_login"]').submit();
                      }else{
                          $('p#login_error').slideDown('slow');
                      }
                  },
                  failure: function(errMsg){
                      alert(errMsg);
                  }
              });
              return false;

            }
        });
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
