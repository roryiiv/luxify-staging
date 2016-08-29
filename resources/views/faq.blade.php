@extends('layouts.front')

@section('title')
    <title>{{ func::genTitle('Terms of Service', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>
@section('meta-data')
    <meta name="keywords" content="luxify Frequently Asked Questions (FAQs)">
    <meta name="description" content="Frequently Asked Questions (FAQs)">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
    <section class="inner-banner auto-height parallax" style="background-image:url(/assets/images/about-banner.jpg);">
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>FAQs</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main" class="faq-page">
        <!-- terms and condition text block -->
        <div class="content-wrapper">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="title">Frequently Asked Questions (FAQs)</div>
                        <div class="FAQBox">
                            <div class="FAQTitle">About Luxify</div>
                            <div class="question">What is Luxify?</div>
                            <div class="answer">Luxify is Asia’s leading marketplace for luxury. Luxury enthusiasts visit our platform to to discover, search and browse through a whole host of the very finest new, vintage and pre-owned luxury goods in a safe and simple way.</div>
                        </div>
                    </div>
                    <!-- end of new grid -->
                </div>
            </div>
            <!-- end of terms and conditions -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
