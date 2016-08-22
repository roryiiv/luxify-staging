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
    <link rel="stylesheet" type="text/css" href="/plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="/plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="/plugins/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/build/css/first-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-image: url('/build/images/backgrounds/30.jpg')" class="body-bg-full v2">
    <div class="container page-container">
        @include('inc.loginheader')
        <div class="page-content">
        	@if (!empty($reset_arr))
        		<div class="v2">
	                <div class="logo"><a target="_self" href='/'><img src="/build/images/logo/logo-dark.png" alt="" width="160"></a></div>
	                <form id='reset-form' role="form" method="POST" action="{{ url('/reset-password') }}" class="form-horizontal">
	                    {{ csrf_field() }}

	                    <input name='salt' id='salt' type='hidden' />
	                    <input name='hashed' id='hashed' type='hidden' />
	                    <input id="email" name="email" type="hidden" value="{{$reset_arr->username}}">
	                    <div class="form-group">
	                        <div class="col-xs-12">
	                            <input id="password" name="password" required type="password" placeholder="New Password" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-xs-12">
	                            <input id="password_confirmation" name="password_confirmation" required type="password" placeholder="Confirm New Password" class="form-control">
	                        </div>
	                    </div>
	                    <button id='submit-btn' type="submit" style="border-radius: 0px!important;" class="btn-lg btn btn-primary btn-block">Save Password</button>
	                </form>
	            </div>
        	@else
        		<div class="v2" style="height: 210px;">
	                <div class="logo"><a target="_self" href='/'><img src="/build/images/logo/logo-dark.png" alt="" width="160"></a></div>
	                <div class="form-group">
                        <div class="col-xs-12">Your "reset password" link is not a vaild or already expired.</div>
                    </div>
                     <div class="form-group">
                        <div class="col-xs-12">&nbsp;</div>
                    </div>
	            </div>
        	@endif
            
        </div>
    </div>

    <!-- Demo Settings end-->
    <!-- jQuery-->
    <script type="text/javascript" src="/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/build/js/first-layout/extra-demo.js"></script>
    <script type="text/javascript" src="/js/bundle.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script>
  	$('#reset-form').validate({
    	rules: {
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
    	},
   		messages: {
      		password: {
        		equalTo: "Please enter the same password." 
      		} 
    	}
  	});
	$('#submit-btn').on('click', function(e) {
        e.preventDefault();
        var token = $('input[name=_token]').val();

        if ($('#reset-form').valid()){
        	var salt = encrypt.makeSalt();
        	var hashed = encrypt.password($('#password').val(), salt);
        	$('input#salt').val(salt);
        	$('input#hashed').val(hashed);
        	$('form#reset-form').submit(); 
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
    </script>
</body>

</html>
