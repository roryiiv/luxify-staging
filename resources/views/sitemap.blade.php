@extends('layouts.front')
<?php
$getPostID = '';
$mainTitle = 'Sitemap';
$mainDes = '';
$mainBG = 'background-color:#4a4a4a;';
$getPostName = isset($release)? $release :'';
if(!empty($getPostName)){
    global $post;
    $queryArr = array(
            'category_name' => 'blog-post',
            'name' => $getPostName,
            'showposts' => 1
    );
    $my_query = new WP_Query($queryArr);
    while ($my_query->have_posts()) : $my_query->the_post();
        $postInf = array();

        $postInf['id']                      = $getPostID  =  $post->ID;
        $postInf['header']['title']         = $mainTitle  =  $post->post_title;
        $postInf['header']['description']   = $mainDes    =  get_field('header_description');

        for($i=1;$i<=3;$i++){
//            $postInf['section_'.$i]['style']    = (get_field('section_'.$i.'_style'))?get_field('section_'.$i.'_style'):'';
//            $postInf['section_'.$i]['title']    = (get_field('section_'.$i.'_title'))?get_field('section_'.$i.'_title'):'';
//            $postInf['section_'.$i]['bg']       = (get_field('section_'.$i.'_background_image'))?get_field('section_'.$i.'_background_image'):'';
//            $postInf['section_'.$i]['description'] = (get_field('section_'.$i.'_description'))?get_field('section_'.$i.'_description'):'';

            $postInf['section_'.$i]['style']            =  get_field('section_'.$i.'_style');
            $postInf['section_'.$i]['title']            =  get_field('section_'.$i.'_title');
            $postInf['section_'.$i]['bg']               =  get_field('section_'.$i.'_background_image');
            $postInf['section_'.$i]['description']      =  get_field('section_'.$i.'_description');
        }

        if(get_field('header_background_image')){
            $temp = get_field('header_background_image');
            $mainBG = 'background-image:url("'.$temp['url'].'");';
        }
        wp_reset_postdata();
    endwhile;
}else{
    $getPostID = (isset($release) && intval($release))?intval($release):'';
}
?>
@section('title')
    <title>{{ func::genTitle(trans('metaheader.meta_sitemap_title'), false)}}</title>
@endsection
@section('meta-data')
    <meta name="title" content"@lang('metaheader.meta_sitemap_title')">
    <meta name="keywords" content="@lang('metaheader.meta_sitemap_keywords')">
    <meta name="description" content="@lang('metaheader.meta_sitemap_description')">
@endsection



@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main informative part of the page -->
    <main id="main" class="sitemap-page">
        <section class="inner-banner parallax top-banner-image" style="{{$mainBG}}">
            <div class="container">
                <div class="banner-text">
                    <div class="banner-center">
                        <!-- new grid -->
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h1>{{$mainTitle}}</h1>
                                <div class="headerDescription">{!!$mainDes!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @if($getPostID!='')
        @include('inc.sitemap_contentPage',$postInf)
    @else
        @include('inc.sitemap_main')
    @endif

    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#jarallax-container-0 > div').css('top', '-150px');
            //$('.style_image').addClass('animated fadeInRight');
        });
    </script>
@endsection
