<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="Luxify is Asia's leading online marketplace for luxury. Our website is the go-to destination for luxury enthusiasts and collectors in Asia, providing easy, safe and reliable market access to the luxury market.">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta name="google-site-verification" content="vuPt0SaqgHqxd-9NRfgrTmlQMZ2FK7_G72NNmosgAL0" />

    <title>Luxify - Asia's leading marketplace for luxury</title>


<!-- set the encoding of your site -->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title of the page -->
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png?v=2">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png?v=2">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png?v=2">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png?v=2">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png?v=2">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png?v=2">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png?v=2">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="192x192"  href="/img/android-icon-192x192.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="32x32" href="/img/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="96x96" href="/img/favicon-96x96.png?v=2">
    <link rel="icon" type="image/png?v=2" sizes="16x16" href="/img/favicon-16x16.png?v=2">
    <link rel="manifest" href="/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png?v=2">
    <meta name="theme-color" content="#ffffff">
    <!-- link to google font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,100,400italic|Montserrat' rel='stylesheet' type='text/css'>
    <!-- include bootstrap stylesheet -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <style>
    .currency-selector-container {
        margin-right: 2.4rem;
    }
    .navbar .navbar-right li:after {
        display: none;
    }

    .currency-selector-container  .jcf-select {
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
    .currency-selector-container  .jcf-select {
        font-weight: 200;
    }
    .currency-selector-container  .jcf-select .jcf-select-opener{
        color: white;
    }
    .currency-selector-container  .jcf-select .jcf-select-opener:before{
        top: 46%;
        right: 0.8rem;
        color: white;
    }
    .currency-selector-container  .jcf-select .jcf-select-text {
        color: white;
        line-height: 30px;
    }
    #user-menu {
        left: 27%;
        width: 165px;
    }
    #user-menu ul li{
        width: 100%;
    }
    #user-menu ul li a{
        font-family: "Roboto", "Arial", "Helvetica Neue", "Helvetica", sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.428;
        letter-spacing: 0px;
    }
    #user-menu:before {
        left: 50%;
    }
    </style>
    @yield('style')
    <!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css" />
	<![endif]-->
</head>

<body>
    @include('inc.gaScript')
    <!--[if lt IE 9]>
		<div class="browserupgrade">
			<p>You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
		</div>
	<![endif]-->
    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!-- header of the page -->
        @include('inc.frontheader')
        <!-- end of header -->
        <!-- main banner of the page -->
        @yield('content')
        <!-- footer -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <!-- new grid -->
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>Luxify</h4>
                                            <ul>
                                                <li><a href="/about">About us / Careers</a></li>
                                                <li><a href="/why-luxify">How it works</a></li>
                                                <li><a target="_blank" href="http://press.luxify.com">Press</a> / <a href="http://blog.luxify.com/">Blog</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>Platform</h4>
                                            <ul>
                                                @if(Auth::user())
                                                    <li><a href="/logout">Logout</a></li>
                                                @else
                                                    <li><a href="/login">Member Login</a></li>
                                                @endif

                                                <li><a href="/pricing">Pricing</a></li>
                                                <li><a href="/dealer-application">Dealer Application</a></li>
                                                <li><a href="/estates">Luxify Estates</a></li>
												<li><a href="/contact">Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>Our Office</h4>
                                            <ul>
                                                <li><a href="mailto:concierge@luxify.com">concierge@luxify.com</a></li>
                                                <li>
                                                    <address>9/F, Core C, Cyberport 3<br /> 100 Cyberport Road,<br /> Hong Kong</address>
                                                </li>
                                                <li><a href="tel:=85236185858">+852 3618 5858</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>Follow us</h4>
                                            <ul class="social-networks">
                                                <li><a target="_blank" href="https://www.facebook.com/LuxifyOfficial/"><span class="icon-facebook"></span></a></li>
                                                <li><a target="_blank" href="https://twitter.com/luxifyofficial"><span class="icon-twitter"></span></a></li>
                                                <li><a target="_blank" href="https://www.pinterest.com/luxifyofficial/"><span class="icon-pinterest"></span></a></li>
                                                <li><a target="_blank" href="https://instagram.com/luxifyofficial/"><span class="icon-instagram"></span></a></li>
                                                <li><a target="_blank" href="https://plus.google.com/u/0/b/104579160217492022157/104579160217492022157/videos"><span class="icon-youtube"></span></a></li>
                                                <li><a class="we-chat" href="#" data-toggle="modal" data-target=".we-chat-modal"><span class="icon-wechat"></span></a></li>
                                            </ul>
											<div class="modal fade we-chat-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
											  <div class="modal-dialog modal-sm">
												<div class="modal-content we-chat-wrapper">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												  <img src="/assets/images/barcode.jpg" width="150" height="150" alt="We Chat">
												</div>
											  </div>
											</div>
                                            <span class="nav-text">We’re socialized!</span>
                                        </nav>
                                    </div>
                              </div>
                        </div>
                     </div> <!-- end of new grid -->
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <!-- new grid -->
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <nav class="bottom-nav">
                                            <ul>
                                                <li><a href="/terms">Terms of Service</a></li>
                                                <li><a href="/privacy">Privacy Policy</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <strong class="copyright">&copy; {{ date("Y" )}} Luxify Limited. All Rights Reserved</strong>
                                    </div>
                                </div>
                         </div>
                     </div> <!-- end of new grid -->
                </div>
            </div>
        </footer>
        <!-- end of footer -->
    </div>
    <script src="/assets/js/jquery-1.11.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/carousel.js"></script>
    <script src="/assets/js/ajaxchimp.js"></script>
    <script src="/assets/js/parallax.js"></script>
<!--    <script src="/assets/js/smooth-scroll.js"></script>-->
    <script src="/assets/js/jquery.main.js"></script>
    <script>
    $(document).ready(function(){
        $('#currSelect').on('change', function(){
            var code = $(this).val();
            // alert(code);
            window.location.href = '/api/currency/switch/' + code;
        });
    });
    </script>
    {{-- Page specific scripts --}}
    @yield('scripts')
<!-- Start of Async HubSpot Analytics Code -->
 <script type="text/javascript">
   (function(d,s,i,r) {
     if (d.getElementById(i)){return;}
     var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
     n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/2446800.js';
     e.parentNode.insertBefore(n, e);
   })(document,"script","hs-analytics",300000);
 </script>
<!-- End of Async HubSpot Analytics Code -->
</body>

</html>
