<?php

global $post;


//gen the sitemap topic
$argArr = array('orderby' => 'term_order,name','order' => 'ASC','parent'  => 11);
$categories = get_categories($argArr); 

?>
<div class="sitemap-block full-line-block">
    <div class="container sitemap-main">
        <div class="row" >
            <div class="col-sm-4 col-sm-offset-1  col-xs-12" >
                <div class="sub-title">Luxify</div>
                <ul>
                    <li>
                        <a href="/about">About us / Careers</a>
                        <ul class="sub-ul">
                            <li><a href="/about#Co-Founders">Luxify Co-Founders</a></li>
                            <li><a href="/about#Join-us">Join us</a></li>
                        </ul>
                    </li>
                    <li><a href="/why-luxify">How it works</a></li>
                    <li>
                        <a target="_blank" href="https://www.luxify.com/press">Press</a>
                        <ul class="sub-ul">
                            <!--<li><a href="/presskit#blog-articles">News </a></li>-->
                            <li><a href="/press#releases-post">Press Releases</a></li>
                            <li><a href="/press#coverage-post">Press Coverage</a></li>
                        </ul>
                    </li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/dealer-directory">Dealer Directory</a></li>
                    <li><a href="/faq">FAQs</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="sub-title">Shop</div>
                <ul>
                    <li><a href="/luxify-estates/3d-estates">@lang('header.shop_luxifyEstate3d')</a></li>
                    <li><a href="/category/real-estates">@lang('header.shop_realEstates')</a></li>
                    <li><a href="/category/jewellery-watches">@lang('header.shop_whatches&Jewelry')</a></li>
                    <li><a href="/category/motors">@lang('header.shop_motors')</a></li>
                    <li><a href="/category/handbags-accessories">@lang('header.shop_handbags&Accessories')</a></li>
                    <li><a href="/category/experiences">@lang('header.shop_experiences')</a></li>
                    <li><a href="/category/collectibles-furnitures">@lang('header.shop_collectibles&Furnitures')</a></li>
                    <li><a href="/category/yachts">@lang('header.shop_yachts')</a></li>
                    <li><a href="/category/aircrafts">@lang('header.shop_aircrafts')</a></li>
                    <li><a href="/category/art-antiques">@lang('header.shop_art&Antiques')</a></li>
                    <li><a href="/category/fine-wines-spirits">@lang('header.shop_fineWines&Spirits')</a></li>
                </ul>
            </div>

            <div class="col-sm-3 col-xs-12">
                <div class="sub-title">Platform</div>
                <ul>
                    <li><a href="/login">Member Login</a></li>
                    <li>
                        <a href="/pricing">Pricing</a>
                        <ul class="sub-ul">
                            <li><a href="/pricing#Value-Proposition">Value-Proposition</a></li>
                            <li><a href="/pricingt#Technology">Technology</a></li>
                        </ul>

                    </li>
                    <li><a href="/dealer-application">Dealer Application</a></li>
                    <li>
                        <a href="/luxify-estates">Luxify Estates</a>
                        <ul class="sub-ul">
                            <li><a href="/luxify-estates#Latest-Estates">3D Virtual Reality</a></li>
                            <li><a href="/luxify-estates#Benefits">Benefits</a></li>
                        </ul>
                    </li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="sitemap-block ">
    <div class="container sitemap-main">
        <div class="row" >
            <div class="col-lg-12 title">Luxify by topic</div>
            <div class="col-sm-offset-1">
            <?php $i=0; ?>
            @foreach($categories as $category)
                <?php
                    $col = 'col-sm-4';
                    if($i%3 == 0){
                        $col = 'col-sm-4 col-sm-offset-1';
                    }elseif($i%3 == 2){
                        $col = 'col-sm-3';
                    }
                $col = 'col-sm-4';
                ?>
                <div class="{{$col}} col-xs-12 sitemap-topic" >
                    <div class="sub-title">{{$category->name}}</div>
                    <ul>
                        <?php

                        $my_query = new WP_Query('cat='.$category->cat_ID.'&showposts=4');
                        while ($my_query->have_posts()) : $my_query->the_post();

                            //$custom_fields = get_post_custom();
                            //var_dump($custom_fields);
                            $link = get_field('link');
                            //var_dump($post);
                            if($link==''){
                                $link = '/sitemap/'.$post->post_name;
                            }
                        ?>
                            <li>
                                <a href="{{$link}}">{{$post->post_title}}</a>
                            </li>
                        <?php
                        endwhile;
                        ?>

                    </ul>
                </div>
            <?php $i++; ?>
            @endforeach
            <!-- -->
            </div>
        </div>
    </div>
</div>

