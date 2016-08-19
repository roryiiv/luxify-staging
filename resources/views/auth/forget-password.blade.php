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
        	@if(isset($_GET['success']))
            <div class="v2" style="height: 210px;">
            @else
            <div class="v2">
            @endif
                <div class="logo"><a target="_self" href='/'><img src="./build/images/logo/logo-dark.png" alt="" width="160"></a></div>
                @if(isset($_GET['success']))
                	<div class="form-group">
                        <div class="col-xs-12">We have sent an email with URL to reset your password.</div>
                    </div>
                     <div class="form-group">
                        <div class="col-xs-12">&nbsp;</div>
                    </div>
                @else
                <form id='forgot-form' method="POST" action="{{ url('/forget-password') }}" class="form-horizontal">
                    
                {{ csrf_field() }}
                    
                    <div class="form-group">
                        <div class="col-xs-12">Forgot Password</div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12">Enter the email address associated with</br>your account to reset your password</div>
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
                    
                    <button id='submit-btn' type="submit" style="border-radius: 0px!important;" class="btn-lg btn btn-primary btn-block">Reset</button>
                </form>
                @endif
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
