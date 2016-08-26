@extends('layouts.front')
<?php

$getPostName = (isset($_GET['release']))?$_GET['release']:'';
//
if($getPostName!=''){
    global $post;
    $queryArr = array(
        'category_name' => 'blog-post',
        'name' => $getPostName,
        'showposts' => 1
    );
    $my_query = new WP_Query($queryArr);
    while ($my_query->have_posts()) : $my_query->the_post();
        $getPostID =  $post->ID;
        wp_reset_postdata();
    endwhile;
}else{
    $getPostID = (isset($_GET['release']) && intval($_GET['release']))?intval($_GET['release']):'';
}



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
        <section class="inner-banner parallax top-banner-image" style="background-image:url(../assets/images/press_bg.jpg);">
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
    @if($getPostID!='')
        <div class="press-block " >
            <div class="container press-release-page">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-1 title"><?php echo get_the_title($getPostID); ?></div>
                    <div class="col-lg-8 col-lg-offset-1 release-date"><?php echo get_the_time('F j , Y',$getPostID); ?></div>
                    <div class="col-lg-8 col-lg-offset-1 release-page-content">
                        <?php echo get_post_field('post_content', $getPostID); ?>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('press_page.presskit_main')
    @endif

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
