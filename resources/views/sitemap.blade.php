@extends('layouts.front')

<?php $my_query = new WP_Query('category_name=blog-post&showposts=4'); ?>

<?php


$argArr = array('orderby' => 'term_order,name','order' => 'ASC','parent'  => 11);
$categories = get_categories($argArr);

foreach ( $categories as $category ) {
    echo '<hr>';
    echo 'A:'.$category->name;
    echo '<br>';
    $subArgArr = array('orderby' => 'term_order,name','order' => 'ASC','parent'  => $category->cat_ID);
    $subCategories = get_categories($subArgArr);
    foreach ( $subCategories as $subCategory ) {
        echo 'B:'.$subCategory->name;
        echo '<br>';
    }
}




exit;
?>
@section('title')
    <title>{{func::genTitle('Sitemap', false)}}</title>
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection

@section('meta-data')
    <meta name="keywords" content="luxury,online marketplace,luxury goods,collectors">
    <meta name="description" content="We are Asia&#39;s leading online luxury marketplace for luxury enthusiasts and collectors. On Luxify you will discover one of the Internet's largest collections of luxury goods.">
@endsection

@section('content')
    <!-- main banner of the page -->
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main" class="sitemap-page">
        <section class="inner-banner parallax top-banner-image" style="background-image:url({{func::img_url('banners/press-main.jpg', '', '', false, true)}});">
            <div class="container">
                <div class="banner-text">
                    <div class="banner-center">
                        <!-- new grid -->
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h1>Sitemap</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @if($getPostID!='')
        @include('inc.sitemap_contentPage')
    @else
        @include('inc.sitemap_main')
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
