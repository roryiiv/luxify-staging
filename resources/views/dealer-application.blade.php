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
                                        <input type="text" name="first-name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Last Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="last-name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Your Email:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Your Phone:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Business Name:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="business-name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Primary Business Focus :</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="primary_business_focus" placeholder="Select one" class="select_form" required>
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
                                        <label for="name">Secondary Business Focus:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="secondary_business_focus" placeholder="Select one" class="select_form" required>
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
                                        <label for="name">Estimated Inventory Size:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <select name="estimated_inventory_size" placeholder="Select one" class="select_form" required>
                                            <option>Less than 50 </option>
                                            <option>50-100 </option>
                                            <option>100-250 </option>
                                            <option>250-500 </option>
                                            <option>500-1000 </option>
                                            <option>Over 1000 </option>
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
                                        <select name="currency_avg" placeholder="Select one" class="select_form" required>
                                            <option>USD $</option>
                                            <option>GBP £</option>
                                            <option>EUR €</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-sm-4">
                                        <input type="text" name="average_item_price" class="form-control" placeholder="Price" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Country:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <input type="text" name="country" class="form-control width_more" placeholder="Country" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="name">Tell us more about your business:</label>
                                    </div>
                                    <div class="col-lg-9 col-sm-8">
                                        <textarea name="business_description" class="form-control about_buisness" placeholder="Optional. To help us more about your company, please share more details about the products you wish to list on Luxify."></textarea>
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
							<div class="form-info-txt" style="text-align: left;">
								<p>Luxify does accept items from private sellers. If you are a private seller or collector and have a luxury item to sell, simply contact our team at <a href="mailto:concierge@luxify.com">concierge@luxify.com</a> and we will help you to leverage Luxify’s dealer network to assist you in selling your item.</p>
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
