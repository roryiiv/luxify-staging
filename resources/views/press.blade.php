@extends('layouts.front')
<?php

$newsLogoImgArr = array(
        'BBC'               => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-bbc-news.png',
        'CBNC'              => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-cbc.png',
        'Techinasia'        => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-techinasia.png',
        'China Daily'       => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-chinadaily.png',
        'WealthX'           => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-wealthx.png',
        'Japanese Times'    => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-japanese-times.png',
        'Yahoo Finance'     => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-yahoo-news.png',
        'Forbes'            => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-forbes.png',
        'Boomarang'         => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-bloomberg.png',
        'Daily Mail'        => 'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/banners/home-logo-daily-mail.png',
);

?>
@section('title')
    <title>{{func::genTitle('homepage', false)}}</title>
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

@section('meta-data')
    <meta name="keywords" content="luxury,online marketplace,luxury goods,collectors">
    <meta name="description" content="We are Asia&#39;s leading online luxury marketplace for luxury enthusiasts and collectors. On Luxify you will discover one of the Internet's largest collections of luxury goods.">
@endsection

@section('content')

    <!-- main banner of the page -->
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main" class="press-page">
        <section class="inner-banner parallax top-banner-image" style="background-image:url(../assets/images/pexels-photo2.jpg);">
            <div class="container">
                <div class="banner-text">
                    <div class="banner-center">
                        <!-- new grid -->
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h1>Press</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- press contact us -->
        <div class="press-block full-line-block" >
            <div class="container press-contact">
                <div class="row">
                    <div class="col-lg-12 title">Contact us</div>
                    <div class="col-lg-12 press-link"><a href="mailto:concierge@luxify.com">concierge@luxify.com</a></div>
                    <div class="col-lg-11 col-lg-offset-1">
                        <?php echo get_post_field('post_content', 11); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- press Press Releases -->
        <div class="press-min-block">
            <div class="container press-releases">
                <div class="row">
                    <div class="col-lg-12 title">Press Releases</div>
                    <div class="col-lg-12 ">
                        <?php $my_query = new WP_Query('category_name=press-releases'); ?>
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="col-lg-3 col-sm-4 col-mb-4 press-releases-content">
                            <div class="press-releases-text">
                                <div class="press-releases-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="press-releases-date">
                                    <?php the_time('F j , Y'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- press Press Releases -->
        <div class="press-block full-line-block">
            <div class="container press-coverage">
                <div class="row">
                    <div class="col-lg-12 title">Press Coverage</div>
                    <div class="col-lg-12 ">
                        <?php $my_query = new WP_Query('category_name=press-coverage'); ?>
                        <?php global $post; while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="col-lg-3 col-sm-4 col-mb-4 press-coverage-content">
                            <div class="press-coverage-text">
                                <div class="press-coverage-img">
                                    <?php
                                    $feat_image = '';
                                    $postID = $post->ID;
                                    if(has_post_thumbnail()) {
                                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($postID) );
                                    }else{
                                        if(array_key_exists(get_post_meta($postID, 'source', true),$newsLogoImgArr)){
                                            $feat_image =  $newsLogoImgArr[get_post_meta($postID, 'source', true)];
                                        }else{
                                            $feat_image =  'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/luxify-logo.png';
                                        }
                                    }
                                    //echo get_post_meta($post->ID, 'link', true);
                                    ?>
                                    <a href="{{get_post_meta($postID, 'link', true)}}">
                                        <img src="{{$feat_image}}" >
                                    </a>
                                </div>
                                <div class="press-coverage-title">
                                    <a href="{{get_post_meta($postID, 'link', true)}}"><?php echo get_the_title($postID);?></a>
                                </div>
                                <div class="press-coverage-date">
                                    <?php echo get_post_meta($postID, 'source', true).' - '.get_the_time('F j , Y'); ?>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- press Brand assets -->
        <div class="press-block background-white">
            <div class="container press-assets">
                <div class="row">
                    <div class="col-lg-12 title">Brand assets</div>
                    <div class="col-lg-12 ">
                        <?php $my_query = new WP_Query('category_name=brand-assets'); ?>
                        <?php global $post; while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php
                        $feat_image = '';
                        $postID = $post->ID;
                        if(has_post_thumbnail()) {
                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($postID) );
                        }else{
                            $feat_image =  'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/luxify-logo.png';
                        }
                        ?>
                        <div class="col-lg-3 col-sm-4 col-mb-4 press-assets-content">
                            <div class="press-assets-text">
                                <div class="press-assets-title">
                                    <?php echo get_the_title($postID);?>
                                </div>
                                <a href="{{get_post_meta($postID, 'link', true)}}" target="_blank">
                                    <div class="press-assets-img">
                                        <img src="{{$feat_image}}" >
                                        <div class="assets button-overlay"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script>

        $(document).ready(function(){
            if(!isMobile()){
                resizeend();
            }
            jQuery('#jarallax-container-0 > div').css('top', '-350px');

        });
        //resize contorl
        var rtime;
        var timeout = false;
        var delta = 200;
        $(window).resize(function() {
            rtime = new Date();
            if (timeout === false) {
                timeout = true;
                setTimeout(resizeend, delta);
            }
        });

        function resizeend() {
            if (new Date() - rtime < delta) {
                setTimeout(resizeend, delta);
            } else {
                timeout = false;
                //action
                //console.log($('body').height());
                //$('.top-banner-image').height($('body').height()/2.5);


            }
        }
    </script>
@endsection
