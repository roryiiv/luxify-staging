@extends('layouts.front')

@section('title', 'Luxify - Dealer Application')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <style>
      .dz-message {
        border: 2px dashed grey;
        height: 80px;
        padding-top: 31px;
      }
      .dz-image{
        margin-top: 13px;
      }
      .bootstrap-tagsinput {
        width: 100%;
        border-radius: 0px;
        border: 1px solid #c5c5c5;
        height: 43px;
        padding: 7px 6px;
      }
      .bootstrap-tagsinput .tag {
        background-color: #958867!important;
        background-color: #958867;
        font-weight: 100;
        font-size: 1.4rem;
      }
    </style>
@endsection
@section('content')
  <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/dealer-application-main.jpg', '', '', false, true)}});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>Dealer Application</h1>
						   </div>
					   </div>
                      <div class="row">
                          <div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
							<p>We are Asia’s leading online marketplace for luxury. The go-to destination for luxury shoppers in Asia.</p>
					   </div>
				   </div>
				   <div class="button-wrap">
						 <a href="#application-form" id="apply-btn-one" class="btn btn-primary">Apply now</a>
					</div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- learn more block -->
        <div class="learn-more">
            <div class="container">
                @if(isset($_GET['message']))
                    @if($_GET['message'] == 'sent')
                        <p class="alert alert-success">
                            Your application has been sent, thank you.
                        </p>
                    @else
                        <p class="alert alert-warning">
                            Your application has not been sent, please contact <a href="mailto:technology@luxify.com">Admin</a> for support.
                        </p>
                    @endif
                @endif
                <a data-fancybox-type="iframe" href="https://s3-ap-southeast-1.amazonaws.com/luxify/static/Luxify_Presentation.pdf" class="fancybox btn btn-info">View PDF</a>
                <span class="txt">Learn more about the power and reach of Luxify</span>
            </div>
        </div>
        <!-- end of learn more block -->
        <!-- dealer block -->
        <div class="dealer-block">
            <div class="container">
                    <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <div class="col-sm-6 col-md-5">
                    <h3>Our Dealers</h3>
                    <p>We select only prestigious dealers to bring their products to our highly targeted and Asian audience</p>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-md-6">
                    <!-- dealer list -->
                    <ul class="dealer-list">
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-01.png', '', '', false, true)}}" alt="Pleyel Paris 1807">
                        </li>
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-02.png', '', '', false, true)}}" alt="Migflug">
                        </li>
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-03.png', '', '', false, true)}}" alt="Christies">
                        </li>
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-04.png', '', '', false, true)}}" alt="Intervino">
                        </li>
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-05.png', '', '', false, true)}}" alt="Image description">
                        </li>
                        <li>
                            <img src="{{func::img_url('banners/dealer-application-dealer-06.png', '', '', false, true)}}" alt="Aviation">
                        </li>
                    </ul>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of dealer block -->
        <!-- information block -->
        <div class="dealer-info grey-bg">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <h1>Why sell on Luxify?</h1>
                <div class="row custom-col">
                    <div class="col-xs-12 col-sm-6">
                        <div class="text-wrap">
                            <strong class="title">Qualified luxury audience</strong>
                            <p>Reach affluent, luxury enthusiasts and influential buyers in Asia.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="text-wrap">
                            <strong class="title">Strong luxury brand association</strong>
                            <p>We only select reputable luxury dealers to bring their luxury products to our highly targeted audience</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="text-wrap">
                            <strong class="title">Full control of the sales process</strong>
                            <p>As a Luxify dealer, you are in full control of the sales process including your inventory on Luxify, pricing and communication with buyers</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="text-wrap">
                            <strong class="title">Cost effective</strong>
                            <p>We are a lead generation engine and do not take commission on the transactions you generate on Luxify</p>
                        </div>
                    </div>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of information block -->
        <!-- quote block -->
        <div class="quote-block">
            <div class="container">
                <!-- new grid -->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                <div class="slide-holder">
                    <div class="slide">
                        <blockquote class="quote-wrap">
                            <div class="img">
                                <img src="{{func::img_url('banners/dealer-application-quote-exotic-cars.jpg', '', '', false, true)}}" alt="image description">
                            </div>
                            <div class="text">
                                <q>“Luxify is a great platform. We use it to bring us qualified buyers from Asia”</q>
                                <cite>Hem Udani <span class="post">Director, Exotic Cars London</span></cite>
                            </div>
                        </blockquote>
                    </div>
                    <div class="slide">
                        <blockquote class="quote-wrap">
                            <div class="img">
                                <img src="{{func::img_url('banners/dealer-application-quote-watch-dealer.jpg', '', '', false, true)}}" alt="image description">
                            </div>
                            <div class="text">
                                <q>“Thanks to Luxify, we managed to get serious prospects and sales. Luxify provides us with more business opportunities.”</q>
                                <cite>Frankie Ko<span class="post">Director, Owner Celebrity Style.</span></cite>
                            </div>
                        </blockquote>
                    </div>
                </div>
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of quote block -->
        <!-- sell block -->
        <div class="sell-block">
            <div class="container">
                <div class="wrap">
                    <h2 class="h1">Start selling today</h2>
                    <p>Professional dealers use Luxify to transact successful sales of a wide selection of new, vintage and pre-owned luxury goods as well as luxury experiences</p>
                    <a href="#application-form" id="apply-btn-two" class="btn btn-primary lightbox">Apply Now</a>
                </div>
            </div>
        </div>
        <!-- end of sell block -->
		<div class="application-form" id="application-form">
			<form id='dealer-application-form' action="/dealer-application" method="POST" class="detail-form">
                {!! csrf_field() !!}
                <div class="container">
					<header class="heading">
						<h2 class="h1">Business Details</h2>
						<div class="wrap">
							<h5>All fields are required unless marked as optional</h5>
						</div>
					</header>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="emai">Login Email:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        
                                    @if(Auth::user())
                                        <input disabled type="text" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                                    @else
                                        <input type="text" name="email" class="form-control" required>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::user())
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="password">Password:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input id="password" type="password" name="password" class="form-control" required>
                                        <input type="hidden" id="salt" name="salt" class="form-control" required>
                                        <input type="hidden" id="hashed" name="hashed" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="confirmPassword">Confirm Password:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input id="confirmPassword" type="password" name="confirmPassword" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="firstName">First Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="firstName" class="form-control" value="{{ Auth::user() ? Auth::user()->firstName : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="lastName">Last Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="lastName" class="form-control" value="{{ Auth::user() ? Auth::user()->lastName : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="secondaryEmail">Seconday Email:(Optional)</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="secondaryEmail" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="phoneNumber">Your Phone:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input id="phoneNumber" type="text" name="phoneNumber" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="companyName">Company Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="companyName" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="businessFocus">Business Focus:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="businessFocus" placeholder="Select one" class="select_form" required>
                                             <option value="">Please select your business focus</option>
                                             <option value='Aircrafts'>Aircrafts</option>
                                             <option value='Antiques'>Antiques</option>
                                             <option value='Art'>Art</option>
                                             <option value='Cars'>Cars</option>
                                             <option value='Collectibles'>Collectibles</option>
                                             <option value='Fashion_accessories'>Fashion accessories</option>
                                             <option value='Fine_wines'>Fine Wines</option>
                                             <option value='Furnitures'>Furnitures</option>
                                             <option value='Handbags'>Handbags</option>
                                             <option value='Jewelry'>Jewelry</option>
                                             <option value='Luxury_experiences'>Luxury experiences</option>
                                             <option value='Real_estate'>Real Estate</option>
                                             <option value='Spirits'>Spirits</option>
                                             <option value='Watches'>Watches</option>
                                             <option value='Yachts'>Yachts</option>
                                             <option value='Other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="countryId">Country:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="countryId" class="form-control width_more" required>
                                             <option value="">Please select your country</option>
                                          <?php $countries = func::build_countries(); ?>
                                          @foreach($countries as $country)
                                             <option value="{{$country['val']}}">{{$country['label']}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="currencyId">Currency:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="currencyId" class="form-control width_more" required>
                                          <?php $currencies= func::build_curr(); ?>
                                             <option value="">Please select a default currency</option>
                                          @foreach($currencies as $currency)
                                             <option value="{{$currency['val']}}">{{$currency['code']}} {{$currency['symbol']}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="companyAddress">Company Address:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <textarea name="companyAddress" class="form-control about_buisness"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="companySummary">Company Description:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <textarea name="companySummary" class="form-control about_buisness" placeholder="To help us more about your company, please share more details about the products you wish to list on Luxify. This company summary will appear on your exclusive Luxify dealer page."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="companyLogoURL">Company Logo:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div id="api-company-logo" class="dropzone text-center"></div>
                                                <input type="hidden" name="companyLogoUrl" id="companyLogoUrl" value="" />
                                            </div>
                                            <div class="widget-heading pt-0">
                                                <h6 class="m-0">For best results, upload high quality 3:2 landscape-oriented PNG or JPG files, with a maximum file size of 10MB.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="coverImageUrl">Cover Image:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div id="api-cover-image" class="dropzone text-center"></div>
                                                <input type="hidden" required name="coverImageUrl" id="coverImageUrl" value="" />
                                            </div>
                                            <div class="widget-heading pt-0">
                                                <h6 class="m-0">For best results, upload high quality 16:9 landscape-oriented PNG or JPG files, with a maximum file size of 10MB.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1">
							<div class="row">
								<div class="col-lg-9 col-lg-offset-3 col-sm-8 col-sm-offset-4">
									<div class="form-group">
										<input type="button" id="application-submit-btn" class="btn btn-primary btn-block" value="Submit Application">
									</div>
							<div class="form-info-txt" style="text-align: left;">
								<p>Should you be a private seller or a collector, simply contact our team at <a href="mailto:concierge@luxify.com">concierge@luxify.com</a> and we will help you to leverage Luxify’s dealer network to assist you in selling your items.</p>
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </form>
		</div>
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script src="/assets/js/jquery.fancybox.js"></script>
    <!-- DropzoneJS-->
    <script type="text/javascript" src="/db/js/dropzone.min.js"></script>
    <script type="text/javascript" src="/db/js/dropzone-js.js"></script>
    <script type="text/javascript" src="/js/bundle.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script>
    jQuery(document).ready(function() {
      jQuery('#jarallax-container-0 > div').css('top', '-93px');
        $(".fancybox").fancybox({
           fitToView : false,
           width   : '90%',
           height    : '90%',
           autoSize  : true,
           closeClick  : false,
           openEffect  : 'none',
           closeEffect : 'none',
        });
      
        var token = "{{ Session::getToken() }}";
        $("#api-company-logo").dropzone({
            @if(Auth::user())
              url: "/panel/upload",
            @else
              url: "/public/images/upload",
            @endif
            paramName: "image",
            params: {
                _token: token
            },
            maxFilesize: 2,
            maxThumbnailFilesize: .5,
            maxFiles: 1,
            uploadMultiple: false,
            addRemoveLinks: true,
            dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
            sending: function(file, xhr, formData) {
                $('.dz-success-mark').hide();
                $('.dz-error-mark').hide();
            },
            success: function (file, response) {
                $('#companyLogoUrl').val(response);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            },
        });

        $("#api-cover-image").dropzone({
            @if(Auth::user())
              url: "/panel/upload",
            @else
              url: "/public/images/upload",
            @endif
            paramName: "image",
            params: {
                _token: token
            },
            maxFilesize: 2,
            maxThumbnailFilesize: .5,
            maxFiles: 1,
            uploadMultiple: false,
            addRemoveLinks: true,
            thumbnailWidth: 400,
            dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
            sending: function(file, xhr, formData) {
                $('.dz-success-mark').hide();
                $('.dz-error-mark').hide();
            },
            success: function (file, response) {
                $('#coverImageUrl').val(response);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            },
        });

        jQuery.validator.addMethod("selectBox", function(val, ele) {
          return typeof val !== 'undefined' && val !== '';
        },"Please select a default value");

        $('form.detail-form').validate({
          ignore: ':hidden:not("#companyLogoUrl, #coverImageUrl")',
          rules: {
            email: {
              required: true,
              email: true,
            },
            secondaryEmail: {
              email: true,
            },
            firstName: {
              required: true,
            },
            lastName: {
              required: true,
            },
            companyName: {
              required: true,
            },
            companyAddress: {
              required: true,
            },
            companySummary: {
              required: true,
            },
            companyLogoUrl: {
              required: true,
            },
            coverImageUrl: {
              required: true,
            },
            businessFocus: {
              selectBox: true, 
            },
            countryId: {
              selectBox: true,
            },
            currencyId: {
              selectBox: true,
            },
            @if(!Auth::user())
            password: {
              minlength: 8,
              required: true,
              equalTo: '#confirmPassword',
            },
            confirmPassword: {
              minlength: 8,
              required: true,
              equalTo: '#password',
            },
            @endif
          },
          messages: {
            password: {
              equalTo: "Please re-enter the paasword below." 
            } 
          }
        })
          /*
          .addMethod('companyLogo', function(val, ele) {
           console.log(val);
           return false;
        }, "Company logo is required");
           */

        $('#phoneNumber').tagsinput({
           allowDuplicates: false 
        });
        $('#application-submit-btn').on('click', function(e) {
          e.preventDefault(); 
          var token = $('input[name=_token]').val();
          if ($('form.detail-form').valid()){ 
            if ($('#phoneNumber').val() !== '') {
              var phones = $('#phoneNumber').tagsinput('items');
                
                $(phones).each(function(idx, ele) {
             $('<input name="phoneNumber[]" type="hidden" value="'+ele+'"/>').appendTo($('#phoneNumber').parent());
              });
            }
            var salt = encrypt.makeSalt();
            var hashed = encrypt.password($('#password').val(), salt);
            $('input#salt').val(salt);
            $('input#hashed').val(hashed);
            $('form.detail-form').submit();
          }

        });
      });
    </script>
@endsection
