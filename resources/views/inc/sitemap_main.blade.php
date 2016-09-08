<?php

global $post;



?>
<div class="sitemap-block full-line-block">
    <div class="container sitemap-main">
        <div class="row" >
            <div class="col-lg-12 title">@lang('static.sitemap_content_sitemap')</div>
            <div class="col-xs-12" >
                <div class="col-sm-3 col-xs-6  col-xxs-6 col-xxxs-12" >
                    <div class="sub-title">@lang('static.sitemap_content_luxify')</div>
                    <ul>
                        <li>
                            <a href="/about">@lang('static.sitemap_content_about_us_careers')</a>
                            <ul class="sub-ul">
                                <li><a href="/about#Co-Founders">@lang('static.sitemap_content_luxify_co_founders')</a></li>
                                <li><a href="/about#Join-us">@lang('static.sitemap_content_join_us')</a></li>
                            </ul>
                        </li>
                        <li><a href="/blog">@lang('static.sitemap_content_blog')</a></li>
                        <li><a href="/why-luxify">@lang('static.sitemap_content_how_it_works')</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6  col-xxs-6 col-xxxs-12" >
                    <div class="sub-title">&nbsp;</div>
                    <ul>
                        <li><a href="/dealer-directory">@lang('static.sitemap_content_dealer_directory')</a></li>
                        <li>
                            <a target="_blank" href="https://www.luxify.com/press">@lang('static.sitemap_content_press')</a>
                            <ul class="sub-ul">
                                <!--<li><a href="/presskit#blog-articles">News </a></li>-->
                                <li><a href="/press#releases-post">@lang('static.sitemap_content_press_releases')</a></li>
                                <li><a href="/press#coverage-post">@lang('static.sitemap_content_press_coverage')</a></li>
                            </ul>
                        </li>
                        <li><a href="/faq">@lang('static.sitemap_content_faqs')</a></li>
                    </ul>
                </div>

                <div class="col-sm-3 col-xs-6  col-xxs-6 col-xxxs-12">
                    <div class="sub-title">@lang('static.sitemap_content_platform')</div>
                    <ul>
                        <li><a href="/login">@lang('static.sitemap_content_member_login')</a></li>
                        <li>
                            <a href="/pricing">@lang('static.sitemap_content_pricing')</a>
                            <ul class="sub-ul">
                                <li><a href="/pricing#Value-Proposition">@lang('static.sitemap_content_value_proposition')</a></li>
                                <li><a href="/pricing#Technology">@lang('static.sitemap_content_technology')</a></li>
                            </ul>
                        </li>
                        <li><a href="/dealer-application">@lang('static.sitemap_content_dealer_application')</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6  col-xxs-6 col-xxxs-12">
                    <div class="sub-title">&nbsp;</div>
                    <ul>
                        <li>
                            <a href="/luxify-estates">@lang('static.sitemap_content_luxify_estates')</a>
                            <ul class="sub-ul">
                                <li><a href="/luxify-estates#Latest-Estates">@lang('static.sitemap_content_3d_virtual_reality')</a></li>
                                <li><a href="/luxify-estates#Benefits">@lang('static.sitemap_content_benefits')</a></li>
                            </ul>
                        </li>
                        <li><a href="/contact">@lang('static.sitemap_content_contact_us')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sitemap-block full-line-block">
    <div class="container sitemap-main">
        <div class="row" >
            <div class="col-lg-12 title">@lang('static.sitemap_content_shop')</div>
            <div class="col-xs-12">
                <?php
                $categories = DB::table('category_2')->get();
                $showArr = array();
                $total_cat = 0;
                foreach($categories as $tempArr){
                    //$showArr[] = $tempArr;
                    if($tempArr->parent==0){

                        $showArr[$tempArr->id]['name'] = $tempArr->name;
                        $showArr[$tempArr->id]['slug'] = $tempArr->slug;
                    }else{

                        $showArr[$tempArr->parent]['sub'][$tempArr->id]['name'] = $tempArr->name;
                        $showArr[$tempArr->parent]['sub'][$tempArr->id]['slug'] = $tempArr->slug;
                    }
                    $total_cat++;
                }

                //var_dump($showArr);
                $i = 0;
                ?>
                @foreach($showArr as $mainCat)
                    <?php
                    $float = 'left';
                    if($i%3 == 0){
                        $float = 'right';
                    }
                    ?>
                    <div class="col-sm-3 col-xs-6  col-xxs-6 col-xxxs-12" style="float:{{$float}};">
                        <div class="sub-title"><a href="{{func::set_url('/category/'.$mainCat['slug'])}}">@lang('categories.'.$mainCat['slug'])</a></div>
                        @if(isset($mainCat['sub']) && count($mainCat['sub'])>0)
                            <ul class="sub-ul">
                                @foreach($mainCat['sub'] as $subCat)
                                    <li><a href="{{func::set_url('/category/'.$subCat['slug'])}}">{{$subCat['name']}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <?php $i++;?>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="sitemap-block ">
    <div class="container sitemap-main">
        <div class="row" >
            <?php
            $i=0;
            //gen the sitemap topic
            $argArr = array('orderby' => 'term_order,name','order' => 'ASC','parent'  => 11);
            $categories = get_categories($argArr);


            ?>
            @if(count($categories)>0)
            <div class="col-lg-12 title">Luxify by topic</div>
            <div class="col-sm-offset-1">

                @foreach($categories as $category)
                    <?php

                    $col = 'col-sm-3';
                    ?>
                    <div class="{{$col}} col-xs-12 sitemap-topic" >
                        <div class="sub-title">{{$category->name}}</div>
                        <ul>
                            <?php

                            $my_query = new WP_Query('cat='.$category->cat_ID.'&showposts=4');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            $link = get_field('link');
                            if($link==''){$link = '/sitemap/'.$post->post_name;}
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
            </div>
            @endif

        </div>
    </div>
</div>

