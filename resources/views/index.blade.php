@extends('layouts.front')
@section('title')
    <title>{{ func::genTitle(trans('metaheader.meta_index_title'), false)}}</title>
@endsection
@section('meta-data')
    <meta name="title" content"@lang('metaheader.meta_index_title')">
    <meta name="keywords" content="@lang('metaheader.meta_index_keywords')">
    <meta name="description" content="@lang('metaheader.meta_index_description')">
@endsection
@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
    <style>
        .bg-img {
            z-index: -1010;
        }
        .content-wrapper, .info-block {
            background-color: white;
        }
    </style>
@endsection


@section('content')
    <!-- main banner of the page -->
    <section class="banner">
        <!-- banner slideshow -->

        <div  class="hidden-md hidden-lg bg-img overlay">
            <img src="{{func::img_url('banners/home-main.jpg', '', '', false, true)}}" alt="image description">
        </div>
        <div class="bg-img overlay hidden-xs hidden-sm">
            <div id="video_bg"></div>
        </div>
        <!-- end of banner slideshow -->
        <div class="container">
            <div class="holder" id="search_holder">
                <h1 class="title-font">@lang('static.index_banner_up')</h1>
                <h2 class="title-font">@lang('static.index_banner_down')</h2>
            @include('inc.search')
            <!-- end of category search form -->
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- banner navigation -->
                        <nav class="banner-nav">
                            <ul>
                                <?php $categories = DB::table('category_2')->where('parent',0)->get(); ?>
                                @foreach($categories as $value)
                                    <li><a href="{{func::set_url('/category/'.$value->slug)}}">@lang('categories.'.$value->slug)</a></li>
                                @endforeach
                            </ul>
                        </nav>
                        <!-- end of banner navigation -->
                        <div class="banner-image">
                            <img src="{{func::img_url('banners/home-ipad.png', '', '', false, true)}}" alt="image description">
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- client section -->
        <section class="client-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                            <div><img src="{{func::img_url('banners/home-logo-bbc-news.png', '', '', false, true)}}" alt="BBC news"></div>
                            <div><img src="{{func::img_url('banners/home-logo-cbc.png', '', '', false, true)}}" alt="CBNC"></div>
                            <div><img src="{{func::img_url('banners/home-logo-techinasia.png', '', '', false, true)}}" alt="Techinasia"></div>
                            <div><img src="{{func::img_url('banners/home-logo-wealthx.png', '', '', false, true)}}" alt="WealthX"></div>
                            <div><img src="{{func::img_url('banners/home-logo-japanese-times.png', '', '', false, true)}}" alt="Japanese Times"></div>
                            <div><img src="{{func::img_url('banners/home-logo-yahoo-news.png', '', '', false, true)}}" alt="Yahoo news"></div>
                            <div><img src="{{func::img_url('banners/home-logo-chinadaily.png', '', '', false, true)}}" alt="China Daily"></div>
                            <div><img src="{{func::img_url('banners/home-logo-forbes.png', '', '', false, true)}}" alt="Forbes"></div>
                            <div><img src="{{func::img_url('banners/home-logo-bloomberg.png', '', '', false, true)}}" alt="Boomarang"></div>
                            <div><img src="{{func::img_url('banners/home-logo-daily-mail.png', '', '', false, true)}}" alt="Daily Mail"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of client section -->
        <!-- count block starts -->
        <section class="count-block">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <ul class="count-list">
                            <li>
                                <span class="count counter">{{ func::countMarketValue() }}</span>
                                <span class="info">@lang('static.index_banner_total_market')</span>
                            </li>
                            <li>
                                <?php $num_listings = number_format(func::countListings(), 0); ?>
                                <span class="count counter">{{$num_listings}}</span>
                                <span class="info">@lang('static.index_banner_total_listing')</span>
                            </li>
                            <li>
                                <?php $num_recents = number_format(func::countNewListings(), 0); ?>
                                <span class="count counter">{{$num_recents}}</span>
                                <span class="info">@lang('static.index_banner_total_newlisting')</span>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </section>
        <!-- end of count block -->
        <div class="featured-block parallax" style="background-image:url({{func::img_url('banners/featured_rees_rex_1.jpg', 1920, '', false, true)}})">
            <!--<div class="featured-block parallax" style="background-image:url('img/featured_rees_rex.jpg')">-->
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="text-box">
                                    <strong class="title">@lang('static.index_feature_title')</strong>
                                    <h1 class="title-font" style="font-weight: 300;">“@lang('static.index_feature_label')”</h1>
                                    <p class="title-font">@lang('static.index_feature_description')<br>@lang('static.index_feature_description_sale')</p>
                                    <a href="{{func::set_url('/listing/rees-rex-t-rex-skull')}}" class="btn btn-primary">@lang('static.index_feature_view')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- main text wrapper -->
        <div class="content-wrapper">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <header class="heading">
                            <h2 class="h1">@lang('static.index_desc1')</h2>
                            <div class="wrap">
                                <h5>@lang('static.index_desc2')</h5>
                            </div>
                        </header>
                    </div>
                </div> <!-- end of new grid -->
            </div>
            <!-- main text wrapper -->
            <div class="content-holder">
                <div class="container">
                    <div class="left_image">
                        <img src="{{func::img_url('banners/home-laptop.jpg', 789, '', false, true)}}" alt="image description">
                    </div>
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <ol class="service-list">
                                <li>
                                    <h3>@lang('static.index_desc3')</h3>
                                    <p>@lang('static.index_desc4')</p>
                                </li>
                                <li>
                                    <h3>@lang('static.index_desc5')</h3>
                                    <p>@lang('static.index_desc6')</p>
                                </li>
                                <li>
                                    <h3>@lang('static.index_desc7')</h3>
                                    <p>@lang('static.index_desc8')</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main text wrapper -->
        <!-- compare block -->
        <div class="compare-block parallax" style="background-image:url({{func::img_url('banners/home-bag.jpg', '', '', false, true)}})">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="text-box">
                                    <h1 class="title-font">@lang('static.index_search1')</h1>
                                    <p class="title-font">@lang('static.index_search2')</p>
                                    <a href="{{func::set_url('/category/handbags-accessories')}}" class="btn btn-primary">@lang('static.index_search3')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of compare block -->
        <div class="info-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1 pull-right">
                                <div class="text-hold">
                                    <strong class="title">@lang('static.index_discover1')</strong>
                                    <h1>@lang('static.index_discover2')</h1>
                                    <p>@lang('static.index_discover3')</p>
                                    <a href="{{func::set_url('/why-luxify')}}" class="btn btn-primary">@lang('static.index_discover4')</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mob-img">
                                    <img src="{{func::img_url('banners/home-phones.png', '', '', false, true)}}" alt="image description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- information block with image -->
        <div class="imageinfo-block parallax" style="background-image:url({{func::img_url('realestate.jpg')}})">
            <div class="container" style="z-index: 4;">
                <div class="info-wrap heading">
                    <h2 class="h1">@lang('static.index_3D_1')</h2>
                    <div class="wrap">
                        <h5>@lang('static.index_3D_2')</h5>
                    </div>
                    <a href="{{func::set_url('/luxify-estates')}}" class="btn btn-primary">@lang('static.index_3D_3')</a>
                </div>
            </div>
        </div>
        <!-- end of information block -->
        <!-- subscribe block -->
        <div class="subscribe-block content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="heading">
                            <h2>@lang('static.index_subscribe_1')</h2>
                            <div class="wrap text-center">
                                <h5>@lang('static.index_subscribe_2')</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="subscribe-form" role="form" id="mailchimp">
                    <div class="input-group flat">
                        <input class="form-control" type="email" name="subscriber-email" id="subscriber-email" placeholder="Your Email..." required />
                        <div class="input-group-addon">
                            <button class="btn btn-primary" name="submit" type="submit" value="Submit">@lang('static.index_subscribe_3')</button>
                        </div>
                    </div>

                    <!-- success and error messages -->
                    <div class="notifications">
                        <div class="subscription-success text-success"></div>
                        <div class="subscription-error text-danger"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end of subscribe block -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script type="application/ld+json">
     {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "url": "https://www.luxify.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.luxify.com/search?action=search&search={search_term_string}",
        "query-input": "required name=search_term_string"
      }
     }
    </script>
    <script type="text/javascript" src="/assets/js/jquery.youtubebackground.js"></script>
    <script type="text/javascript" src="/assets/js/carousel.js"></script>
    <script type="text/javascript" src="/assets/js/ajaxchimp.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.unveil.js"></script>

    <script>

        $(document).ready(function(){


            //index home
            clientsCarousel();
            mailChimpSub();

            //index category
            suggestedSearchResults();
            search_ico();

            if(!isMobile()){
                $('#video_bg').YTPlayer({
                    fitToBackground: true,
                    videoId: '15VwTs0nFlM',
                });
            }
        });

    </script>
@endsection
