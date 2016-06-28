@extends('layouts.front')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main2.css">
@endsection
@section('content')
    <!-- main banner of the page -->
    <div class="inner-banner">
        <!-- banner image -->
        <section class="images">
            <?php $images = json_decode($listing->images); //var_dump($images); exit; ?>
            <ul>
                @if(is_array($images))
                    @foreach($images as $image)
                        <li><img src="{{ func::img_url($image, 980) }}" /></li>
                    @endforeach
                @else
                    <li><img src="{{ func::img_url($listing->mainImageUrl, 980) }}" /></li>
                @endif
            </ul>

        </section>
        <div class="bg-img overlay">
        <!--<img src="assets/images/banner-itempage.jpg" alt="image description">-->
        </div>
        <!-- end of banner image -->
    </div>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- item description -->
        <div class="item-description">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <aside class="sidebar">
                            <?php
                            $curr = func::getTableByID('currencies', $listing->currencyId);
                            $dealer = func::getTableByID('users', $listing->userId);
                            if(!empty($dealer->countryId))
                            $country = func::getTableByID('countries', $dealer->countryId);
                            $url = 'http://' . $_SERVER['HTTP_HOST'];
                            $raw_price = $listing->price == 0 ? 'Price on request' : $curr->symbol . number_format($listing->price, 0) .' '. $curr->code;
                            $price_format = $raw_price;
                            ?>
                            <ul class="detail">
                                <li><span class="icon icon-tag"></span><span class="text">{{ $price_format }}</span></li>
                                <li><span class="icon icon-globe"></span><span class="text">{{ isset($country) ? $country->name : '' }}</span></li>
                            </ul>
                            <ul class="social-links">
                                <li><a class="bookmark" title="{{ $listing->title }}" href="{{ $url . '/listing/' . $listing->slug}}"><span class="icon icon-bookmarn"></span></a></li>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url . '/listing/' . $listing->slug}}">
                                        <span class="icon icon-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/home?status={{ urlencode($listing->title . ' ' . $url . '/listing/' . $listing->slug) }}">
                                        <span class="icon icon-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://pinterest.com/pin/create/button/?url={{ $url }}/listing/{{ $listing->slug }}&media={{ func::img_url($listing->mainImageUrl, 300) }}&description={{ urlencode($listing->description) }}">
                                        <span class="icon icon-pinterest"></span>
                                    </a>
                                </li>
                                {{--Hide this for now as no back end information made for this (faulty by design)  --}}
                                {{-- <li><a href="#"><span class="icon icon-wechat"></span></a></li>
                                <li><a href="#"><span class="icon icon-social"></span></a></li> --}}
                            </ul>
                            <div class="link-btn">
                                <div class="logo-aside">
                                    <?php $dealer_img = !empty ($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png'; ?>
                                    <a href="#">
                                        <img src="{{ func::img_url($dealer_img, 235) }}" alt="image description" width="233" height="29">
                                    </a>
                                </div>
                                <span class="small-text">Luxify dealer since {{ date("Y", strtotime($dealer->created_at)) }}</span>
                                <div class="btn-holder">
                                    <a href="/dealer/{{ $dealer->id }}" class="btn btn-primary">Dealer page</a>
                                    @if(isset($_GET['offer']))
                                        @if($_GET['offer'] == 'sent')
                                            <p class="alert alert-success">
                                                Your offer has been sent to the dealer. <br />
                                                Thank you.
                                            </p>
                                        @else
                                            <p class="alert alert-warning">
                                                The item is not available or the dealer has removed the listing.
                                            </p>
                                        @endif
                                    @else
                                        <a href="/dealer/contact/{{ $dealer->id }}/{{ $listing->id }}" class="btn btn-primary trans">Contact Dealer </a>
                                    @endif
                                </div>
                            </div>
                        </aside>

                        <article class="block-content">
                            <?php
                            $category = func::getTableByID('categories', $listing->categoryId);
                            $parent_cat = func::getTableByID('categories', $category->ParentId);
                            ?>
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="/category/{{ $parent_cat->slug }}">{{ $parent_cat->title }}</a></li>
                                <li class="active">{{ $category->title }}</li>
                            </ol>
                            <header class="block-header">
                                <h1 class="item-title">{{ $listing->title }}</h1>
                                @if(!empty($listing->aerialLook3DUrl))
                                    <a href="{{ $listing->aerialLook3DUrl }}" rel="lightbox" data-fancybox-type="iframe" class="btn btn-primary lightbox">3D Virtual Tour &nbsp;<span class="glyphicon glyphicon-play"></span></a>
                                @endif
                            </header>
                            <div class="description">
                                <h5>Description</h5>
                                <p>
                                    {{ strip_tags($listing->description) }}
                                </p>
                                @if(!empty($infos))
                                    <h5>Specifications of {{ $listing->title }}</h5>

                                    <table class="table item-description" style="display: none;">
                                        <thead>
                                            <tr>
                                                <th colspan="2">GENERAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Closure</th>
                                                <td>Zip</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Type</th>
                                                <td>Hand-held Bag</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Material</th>
                                                <td>PU</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Style Code</th>
                                                <td>MKJ00036</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ideal For</th>
                                                <td>Women</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Occasion</th>
                                                <td>Evening/Party, Casual, Formal, Festive</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Color Code</th>
                                                <td>Pink003</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table item-description" style="display: none;">
                                        <thead>
                                            <tr>
                                                <th colspan="2">DIMENSIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Height</th>
                                                <td>267 mm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Width</th>
                                                <td>412 mm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Depth</th>
                                                <td>104 mm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of item description -->
        <!-- carousel block -->
        <div class="carousel-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h1 class="text-center">More from this seller</h1>
                        <div class="slider">
                            @if(!empty($mores))
                                @foreach($mores as $more)
                                    <div class="slide">
                                        <div class="thumbnail borderless">
                                            <a href="/listing/{{ $more->slug }}">
                                                <figure>
                                                    <?php $more_img = !empty($more->mainImageUrl) ? $more->mainImageUrl : 'default-logo.png'; ?>
                                                    <img src="{{ func::img_url($more_img, 305) }}" alt="image description">
                                                    @if(Auth::user())
                                                        <?php $madded = func::is_wishlist($user_id, $more->id) == 1 ? ' added' : ''; ?>
                                                        <a id="{{ $more->id }}" href="javascript:;" data-id="{{ $more->id }}" class="favourite{{ $madded }}"><span class="icon-heart"></span></a>
                                                    @endif
                                                </figure>
                                            </a>
                                            <div class="caption">
                                                <h3><a href="/listing/{{ $more->slug }}">{{ $more->title }}</a></h3>
                                                <?php
                                                $mcurr = func::getTableByID('currencies', $more->currencyId);
                                                $mseller = func::getTableByID('users', $more->userId);
                                                $msellerImg = !empty($mseller->companyLogoUrl) ? $mseller->companyLogoUrl : 'default-logo.png';
                                                $mraw_price = $more->price == 0 ? 'Price on request' : $mcurr->symbol . number_format($more->price, 0) .' '. $mcurr->code;
                                                $mprice_format = $mraw_price;
                                                ?>
                                                <span class="price">{{ $mprice_format }}</span>
                                                <div class="item-logo">
                                                    <img src="{{ func::img_url($msellerImg, 90) }}" alt="{{ $mseller->fullName }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of carousel block -->
        <!-- carousel block -->
        <div class="carousel-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h1 class="text-center">You may also like</h1>
                        <div class="slider">
                            @if(!empty($relates))
                                @foreach($relates as $rel)
                                    <div class="slide">
                                        <div class="thumbnail borderless">
                                            <a href="/listing/{{ $rel->slug }}">
                                                <figure>
                                                    <?php $rel_img = !empty($rel->mainImageUrl) ? $rel->mainImageUrl : 'default-logo.png'; ?>
                                                    <img src="{{ func::img_url($rel_img, 305) }}" alt="image description">
                                                    @if(Auth::user())
                                                        <?php $rel_added = func::is_wishlist($user_id, $rel->id) == 1 ? ' added' : ''; ?>
                                                        <a id="{{ $rel->id }}" href="javascript:;" data-id="{{ $rel->id }}" class="favourite{{ $rel_added }}"><span class="icon-heart"></span></a>
                                                    @endif
                                                </figure>
                                            </a>
                                            <div class="caption">
                                                <h3><a href="/listing/{{ $rel->slug }}">{{ $rel->title }}</a></h3>
                                                <?php
                                                $rel_curr = func::getTableByID('currencies', $rel->currencyId);
                                                $rel_seller = func::getTableByID('users', $rel->userId);
                                                $rel_sellerImg = !empty($rel_seller->companyLogoUrl) ? $rel_seller->companyLogoUrl : 'default-logo.png';
                                                $rel_raw_price = $rel->price == 0 ? 'Price on request' : $rel_curr->symbol . number_format($rel->price, 0) .' '. $rel_curr->code;
                                                $rel_price_format = $rel_raw_price;
                                                ?>
                                                <span class="price">{{ $rel_price_format }}</span>
                                                <div class="item-logo">
                                                    <img src="{{ func::img_url($rel_sellerImg, 90) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end of new grid -->
            </div>
        </div>
        <!-- end of carousel block -->
    </main>
@endsection
@section('scripts')
    <script language="javascript" type="text/javascript">
    $(document).ready(function(){
      $("a.bookmark").click(function(e){
        e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
        var bookmarkUrl = this.href;
        var bookmarkTitle = this.title;
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (window.sidebar) { // For Mozilla Firefox Bookmark
            window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,"");
        } else if( msie > 0 ) { // For IE Favorite
            window.external.AddFavorite( bookmarkUrl, bookmarkTitle);
        } else if(window.opera) { // For Opera Browsers
            $("a.jQueryBookmark").attr("href",bookmarkUrl);
            $("a.jQueryBookmark").attr("title",bookmarkTitle);
            $("a.jQueryBookmark").attr("rel","sidebar");
        } else { // for other browsers which does not support
             alert('Your browser does not support this bookmark action');
             return false;
        }
      });
    });
    </script>
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
        $(document).ready(function() {
    		$(".lightbox").fancybox({
        		fitToView	: false,
        		width		: '70%',
        		height		: '70%',
        		autoSize	: false,
        		closeClick	: false,
        		openEffect	: 'none',
        		closeEffect	: 'none'
            });
    	});
    });
    </script>
@endsection
