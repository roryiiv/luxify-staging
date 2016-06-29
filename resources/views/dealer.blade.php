@extends('layouts.front')

@section('title', 'Luxify - ' . $dealer->fullName)

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <?php $banner = !empty($dealer->coverImageUrl) ? $dealer->coverImageUrl : 'about-banner.jpg'; ?>
    <section class="inner-banner parallax" style="background-image:url({{ func::img_url($banner, 1960) }});">
        <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $title = !empty($dealer->companyName) ? $dealer->companyName :  $dealer->firstName . ' ' . $dealer->lastName; ?>
                            <h1>{{ $title }}</h1>
                            <p style="visibility: hidden;">Official Ferrari importer in Singapore</p>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <a class="btn btn-default" href="javascript:;"><span class="glyphicon glyphicon-th-large"></span> View listings</a>
                    @if (isset($_GET['message']))
                        <span class="alert alert-success">Message sent.</span>
                    @else
                        <a href="/dealer/contact/{{ $dealer->id }}/0" class="btn btn-primary smooth-scroll"><span class="glyphicon glyphicon-earphone"></span> Contact dealer</a>
                    @endif
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
                        <h1>{{ $title }}</h1>
                        <p>{{ !empty($dealer->companySummary) ? $dealer->companySummary : 'Coming soon.' }}</p>
                        <ul class="social-networks">
                            @if(!empty($dealer->socialFacebook))
                                <li class="socials_item">
                                    <a href="{{ $dealer->socialFacebook }}">
                                        <span class="icon-facebook"></span>
                                    </a>
                                </li>
                            @endif
                            @if(!empty($dealer->socialTwitter))
                                <li class="socials_item">
                                    <a href="{{ $dealer->socialTwitter }}">
                                        <span class="icon-twitter"></span>
                                    </a>
                                </li>
                            @endif
                            @if(!empty($dealer->socialInstagram))
                                <li class="socials_item">
                                    <a href="{{ $dealer->socialInstagram }}">
                                        <span class="icon-instagram"></span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <?php $logo = !empty($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                    <div class="col-md-5 col-sm-offset-1">
                        <img src="{{ func::img_url($logo, 360) }}" alt="image_link">
                    </div>
                </div>
            </div>
        </div>
        <?php $feat = func::getFeatured($dealer->id); ?>
        @if(!empty($feat))
            <?php $mainImageUrl = !empty($feat->mainImageUrl) ? $feat->mainImageUrl : 'about-banner.jpg'; ?>
            <div class="compare-block parallax" style="background-image:url({{ func::img_url($mainImageUrl, 1920) }});">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-box">
                                <a href="/listing/{{ $feat->slug }}" class="ferrari_featured_link"><strong class="title">Featured</strong></a>
                                <h1>{{ $feat->title }}</h1>
                                <?php $description = !empty($feat->description) ? $feat->description : 'Coming soon.'; ?>
                                <p>{{ func::truncate(strip_tags($description), 130) }}</p>
                                <a href="/listing/{{ $feat->slug }}" class="btn btn-primary">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="more_items_section">
            <div class="container">
                <div class="heading">
                    <h1 class="text-center">More From This Seller</h1>
                </div>
                <div class="row">
                    @if(!empty($listings))
                        @foreach($listings as $item)
                            <div class="col-md-4 col-sm-6">
                                <div class="thumbnail borderless">
                                    <a href="/listing/{{ $item->slug }}">
                                        <figure>
                                            <img src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 400) : func::img_url('default-logo.png', 400) }}" alt="{{ $item->title }}">
                                            @if(Auth::user())
                                                <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                                <a id="{{ $item->id }}" href="javascript:;" data-id="{{ $item->id }}" class="favourite{{ $added }}"><span class="icon-heart"></span></a>
                                            @endif
                                        </figure>
                                    </a>
                                    <div class="caption">
                                        <h3><a href="/listing/{{ $item->slug }}">{{ $item->title }}</a></h3>
                                        <?php
                                        $curr = func::getTableByID('currencies', $item->currencyId);
                                        $dealer = func::getTableByID('users', $item->userId);
                                        $raw_price = $item->price == 0 ? 'Price on request' : $curr->symbol . number_format($item->price, 0) .' '. $curr->code;
                                        $price_format = $raw_price;
                                        ?>
                                        <span class="price">{{ $price_format }}</span>
                                        <div class="item-logo">
                                            <img src="{{ !empty($dealer->companyLogoUrl) ? func::img_url($dealer->companyLogoUrl, 300) : func::img_url('default-logo.png', 300) }}" alt="image description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 col-sm-12">
                            <p>
                                No Items found
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    {{ csrf_field() }}
    <script>
    $(document).ready(function(){
        $('a.favourite').each(function(){
            $(this).click(function(event){
                // return false; // remove this later after database fixes.
                // event.preventDefault();
                var url = '/wishlist/add', itemID = $(this).attr('data-id'), userID = {{ $user_id }}, token = $('input[name=_token]').val();
                console.log(token);
                var data = {uid: itemID, lid: itemID};

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    // dataType: "html",
                    success: function(data){
                        $(this).addClass('added');
                    },
                    error: function(errMsg){
                        console.log(errMsg.responseText);
                    }
                });
            });
        });
    });
    </script>
@endsection
