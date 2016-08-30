<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <!-- set the encoding of your site -->
    @yield('title')
	  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('meta-data')
    <meta name="google-site-verification" content="vuPt0SaqgHqxd-9NRfgrTmlQMZ2FK7_G72NNmosgAL0" />

	  @yield('meta')

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
    @yield('style')
    <!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css" />
	<![endif]-->

	<!--<script src="//load.sumome.com/" data-sumo-site-id="096641acc338e360e68a6fa01ce6c0af808492a48eb251f5cbe64035503f5c2d" async="async"></script> -->
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
                                            <h4>@lang('footer.aboutLuxify')</h4>
                                            <ul>
                                                <li><a href="/about">@lang('footer.aboutUsCareers')</a></li>
                                                <li><a href="/why-luxify">@lang('footer.howItWorks')</a></li>
                                                <li><a target="_blank" href="https://www.luxify.com/press">@lang('footer.press')</a> / <a href="/blog">@lang('footer.blog')</a></li>
                                                <li><a href="/dealer-directory">@lang('footer.dealerDirectory')</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>@lang('footer.platform')</h4>
                                            <ul>
                                                @if(Auth::user())
                                                    <li><a href="/logout">@lang('footer.logout')</a></li>
                                                @else
                                                    <li><a href="/login">@lang('footer.memberLogin')</a></li>
                                                @endif

                                                <li><a href="/pricing">@lang('footer.pricing')</a></li>
                                                <li><a href="/dealer-application">@lang('footer.dealerApplication')</a></li>
                                                <li><a href="/luxify-estates">@lang('footer.luxifyEstates')</a></li>
												<li><a href="/contact">@lang('footer.contactUs')</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-sm-3">
                                        <nav class="footer-nav">
                                            <h4>@lang('footer.ourOffice')</h4>
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
                                            <h4>@lang('footer.followUs')</h4>
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
                                                <li><a href="/terms">@lang('footer.terms')</a></li>
                                                <li><a href="/privacy">@lang('footer.policy')</a></li>
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
    <script src="/assets/js/jquery.slick.js"></script>
    <script src="/assets/js/jquery.IonRangeSlider.js"></script>

    <script src="/assets/js/jquery.unveil.js"></script>
    <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
    <script src="/assets/js/jquery.youtubebackground.js"></script>
    <script>
    $(document).ready(function(){
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
