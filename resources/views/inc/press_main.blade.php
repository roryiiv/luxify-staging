<?php

global $post;
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
<!-- press contact us -->
<div class="press-block full-line-block" >
    <div class="container press-contact">
        <div class="row">
            <div class="col-lg-12 title">Contact us</div>
            <div class="col-lg-12 press-link"><a href="mailto:press@luxify.com">press@luxify.com</a></div>
            <div class="col-lg-11 col-lg-offset-1">
                <?php echo get_post_field('post_content', 11); ?>
            </div>
        </div>
    </div>
</div>
<!-- press blog news -->
<div class="press-block" id="blog-articles">
    <div class="container press-news" >
        <div class="row">
            <div class="col-lg-12 title">What’s new at Luxify</div>
            <div class="col-lg-12 title-des">From the blog & articles</div>
            <div class="col-lg-12 ">
                <?php $my_query = new WP_Query('category_name=blog-post&showposts=4'); ?>
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php
                $feat_image = '';
                $postID = $post->ID;
                if(has_post_thumbnail()) {
                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($postID) );
                }else{
                    $feat_image =  'https://images.luxify.com/q100,/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/luxify-logo.png';
                }
                $out = strlen(get_the_content($post->ID)) > 200 ? substr(get_the_content($post->ID),0,200)."..." : get_the_content($post->ID);
                ?>
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 col-mb-6 press-news-content">
                    <a href="{{get_post_meta($postID, 'link', true)}}" title="lucfity blog link"class="press-news-image">
                        <img src="{{$feat_image}}" >
                    </a>
                    <div class="press-news-text">
                        <div class="press-news-title">
                            <a href="{{get_post_meta($postID, 'link', true)}}"><?php echo get_the_title($post->ID); ?></a>
                        </div>
                        <div class="press-news-des">
                            <?php echo $out; ?>

                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
                <?php for($i=0;$i<4;$i++){ ?>
                <?php } ?>
            </div>
            <div class="col-lg-12 more-blog"><a href="https://www.luxify.com/blog/" >Read more on the Luxify News Blog ▻</a></div>
        </div>
    </div>
</div>
<!-- press Press Releases -->
<div class="press-min-block" id="releases-post">
    <div class="container press-releases">
        <div class="row">
            <div class="col-lg-12 title">Press Releases</div>
            <div class="col-lg-12 ">
                <?php $my_query = new WP_Query('category_name=press-releases&showposts=-1'); ?>
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php
                    $out = strlen(get_the_title($post->ID)) > 50 ? substr(get_the_title($post->ID),0,50)."..." : get_the_title($post->ID);
                ?>

                <div class="col-lg-3 col-sm-4 col-mb-4 press-releases-content">
                    <div class="press-releases-text">
                        <div class="press-releases-title">
                            <a href="/press/{{$post->post_name}}">{{ $out }}</a>
                        </div>
                        <div class="press-releases-date">
                             {{  get_the_time('F j , Y') }}
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- press Press coverage -->
<div class="press-block "  id="coverage-post">
    <div class="container press-coverage">
        <div class="row">
            <div class="col-lg-12 title">Press Coverage</div>
            <div class="col-lg-12 ">
                <?php $my_query = new WP_Query('category_name=press-coverage&showposts=-1'); ?>
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
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
                            $out = strlen(get_the_title($post->ID)) > 50 ? substr(get_the_title($post->ID),0,50)."..." : get_the_title($post->ID);

                            //echo get_post_meta($post->ID, 'link', true);
                            ?>
                            <a href="{{get_post_meta($postID, 'link', true)}}">
                                <img src="{{$feat_image}}" >
                            </a>
                        </div>
                        <div class="press-coverage-title">
                            <a href="{{get_post_meta($postID, 'link', true)}}"><?php echo $out;?></a>
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
<!--
<div class="press-block background-white">
    <div class="container press-assets">
        <div class="row">
            <div class="col-lg-12 title">Brand assets</div>
            <div class="col-lg-8 col-lg-offset-2 description">
                Luxify is Asia’s leading online marketplace for luxury. Our website is the go-to destination for luxury enthusiasts and collectors in Asia, providing easy, safe and reliable market access to the luxury market.
                <br/><br/>
                On Luxify you will discover one of the Internet's largest collections of luxury products. Our website is the perfect place to discover, search and browse through a whole host of the very finest luxury goods.
                <div class="press-link"><a href="assets/download/LuxifyMediaKit.zip">Download</a></div>
                <?php
                    $my_query = new WP_Query('category_name=brand-assets');
                    global $post;
                    while ($my_query->have_posts()) : $my_query->the_post();

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
-->
