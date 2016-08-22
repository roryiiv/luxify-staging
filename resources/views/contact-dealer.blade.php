@extends('layouts.front')

<?php $dealer = func::getTableByID('users', $id); ?>

@section('title', 'Luxify - Contact Dealer')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <section class="inner-banner parallax" style="background-image:url(/assets/images/dealer-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      <div class="row">
                          <div class="col-lg-12">
							<h1>Contact Dealer</h1>
						   </div>
					   </div>
				   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <div class="container">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Contact Dealer:</h1>
                        <p>{{ $dealer->firstName . ' ' . $dealer->lastName }} {{ !empty($dealer->companyName) ? '- ' . $dealer->companyName : '' }}</p>
                        <form name="form_dealer" method="post" action="/contact/dealer" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <textarea name="message" class="form-control" style="color: #555; height: 300px;"></textarea>
                                </div>
                            </div>
                            <button id="send" type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Send Message</button>
                            <input type="hidden" id="item_id" name="item_id" value="{{ $item }}" />
                            <input type="hidden" id="dealer_id" name="dealer_id" value="{{ $id }}" />
                            <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}" />
                            <input type="hidden" id="email" name="email" value="" />
                        </form>
                    </div>
                    <?php $logo = !empty($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                    <div class="col-md-5 col-sm-offset-1">
                        <img src="{{ func::img_url($logo, 360) }}" alt="image_link">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
@endsection
