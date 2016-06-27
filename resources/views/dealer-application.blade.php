@extends('layouts.front')

@section('title', 'Luxify - Dealer Application')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url(/assets/images/dealer-banner.jpg);">
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
							<p>We are Asia's leading online marketplace for luxury The go-to destination for luxury shoppers in Asia</p>
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
                <a href="#" target="_blank" class="btn btn-info">View PDF</a>
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
                            <img src="/assets/images/dealer-01.png" alt="Pleyel Paris 1807">
                        </li>
                        <li>
                            <img src="/assets/images/dealer-02.png" alt="Migflug">
                        </li>
                        <li>
                            <img src="/assets/images/dealer-03.png" alt="Christies">
                        </li>
                        <li>
                            <img src="/assets/images/dealer-04.png" alt="Intervino">
                        </li>
                        <li>
                            <img src="/assets/images/dealer-05.png" alt="Image description">
                        </li>
                        <li>
                            <img src="/assets/images/dealer-06.png" alt="Aviation">
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
                            <strong class="title">Asian audience of qualified customers</strong>
                            <p>Reach millions of discerning shoppers and sophisticated consumers in Asia</p>
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
                                <img src="assets/images/quote-image.jpg" alt="image description">
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
                                <img src="assets/images/quote-image.jpg" alt="image description">
                            </div>
                            <div class="text">
                                <q>“Luxify is a great platform. We use it to bring us qualified buyers from Asia”</q>
                                <cite>Hem Udani <span class="post">Director, Exotic Cars London</span></cite>
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
			<form action="/dealer-application" method="post" class="detail-form">
                {{ csrf_field() }}
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
                                        <label for="name">First Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="first-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Last Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="last-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Your e-mail:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Your Phone:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Business Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="business-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Years In Business:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="years_in_business" placeholder="Select one" class="select_form">
                                            <option>Less than 1 year</option>
                                            <option>1-4 years</option>
                                            <option>5-9 years</option>
                                            <option>10-20 years</option>
                                            <option>More than 20 years</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Primary Business Focus :</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="primary_business_focus" placeholder="Select one" class="select_form">
                                            <option>Furniture</option>
                                            <option>21st Century Furniture</option>
                                            <option>Fashion</option>
                                            <option>Fine Art</option>
                                            <option>Jewelry</option>
                                            <option>21st Century Jewelry</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Secondary Business Focus:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="secondary_business_focus" placeholder="Select one" class="select_form">
                                            <option>Furniture</option>
                                            <option>21st Century Furniture</option>
                                            <option>Fashion</option>
                                            <option>Fine Art</option>
                                            <option>Jewelry</option>
                                            <option>21st Century Jewelry</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Estimated Inventory Size:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="estimated_inventory_size" placeholder="Select one" class="select_form">
                                            <option>Less than 50 total pieces</option>
                                            <option>50-100 total pieces</option>
                                            <option>100-250 total pieces</option>
                                            <option>250-500 total pieces</option>
                                            <option>500-1000 total pieces</option>
                                            <option>Over 1000 total pieces</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Average Item Price:</label>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <select name="currency_avg" placeholder="Select one" class="select_form">
                                            <option>USD $</option>
                                            <option>GBP £</option>
                                            <option>EUR €</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-sm-4">
                                        <input type="text" name="average_item_price" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Professional Associations:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="professional_association" placeholder="Select one" class="select_form">
                                            <option>ADAA (Art Dealers Association of America)</option>
                                            <option>AIPAD (Association of International Photography Art Dealers)</option>
                                            <option>The Art and Antique Dealers league of America</option>
                                            <option>British Antique Dealers Association</option>
                                            <option>Canadian Antique Dealers Association</option>
                                            <option>CINOA</option>
                                            <option>IFPDA (The International Fine Print Dealers Association)</option>
                                            <option>LAPADA (Association of Art & Antiques Dealers)</option>
                                            <option>NADA (New Art Dealers Alliance)</option>
                                            <option>PADA (Private Art Dealers Association)</option>
                                            <option>SLAD (Society Of London Art Dealers)</option>
                                            <option>Syndicat National des Antiquares</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Country:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="country" class="form-control width_more" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">State or Region:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="state" class="form-control width_more" placeholder="State or Region">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Postal Code:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="postal_code" class="form-control width_more" placeholder="Postal Code">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Type of Physical Location:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="type_of_physical_location" placeholder="Select one" class="select_form">
                                            <option>Gallery</option>
                                            <option>Retail Store</option>
                                            <option>Showroom</option>
                                            <option>Warehouse</option>
                                            <option>NYDC (New York Design Center)</option>
                                            <option>Other</option>
                                            <option>None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Tell us more about your business:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <textarea name="business_description" class="form-control about_buisness" placeholder="Optional. To help us learn more about your business, please share how you started, more details about your inventory, and mention any fairs you exhibit at. "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<h3>Reference 1</h3>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">First Name</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-first-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Last Name</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-last-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Type of Reference:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="type-of-reference" placeholder="Select one" class="select_form">
                                            <option>Currently a dealer or gallery on 1stdibs (preferred if available)</option>
                                            <option>A trade design professional (preferred if available)</option>
                                            <option>General business reference</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Business Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-business-name" class="form-control width_more">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Email Address:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="email" name="reference-email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Phone Number:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-phone" class="form-control width_more" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<h3>Reference 2</h3>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">First Name</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-first-name-2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Last Name</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-last-name-2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Type of Reference:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="type-of-reference-2" placeholder="Select one" class="select_form">
                                            <option>Currently a dealer or gallery on 1stdibs (preferred if available)</option>
                                            <option>A trade design professional (preferred if available)</option>
                                            <option>General business reference</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Business Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-business-name-2" class="form-control width_more">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Email Address:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="email" name="reference-email-2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Phone Number:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="reference-phone-2" class="form-control width_more" placeholder="Phone Number">
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
										<input type="submit" class="btn btn-primary btn-block" value="Submit Application">
									</div>
							<div class="form-info-txt">
								<p>Luxify does not list items from private sellers. If you are a private seller or collector and have an individual piece to sell, you may leverage Luxify to find a local dealer selling similar products who may be interested in purchasing it from you</p>
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
@endsection
