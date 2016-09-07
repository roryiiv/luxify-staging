@extends('layouts.front')

@section('title', 'Luxify - Search')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <section class="inner-banner auto-height parallax" style="background-image:url(assets/images/about-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				    <div class="row">
					    <div class="col-lg-12">
						    <h1>Search</h1>
					    </div>
				    </div>
				    <div class="row">
					    <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						    @include('inc.search')
					    </div>
				    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
	<!-- main informative part of the page -->
	<main id="main">
		<div class="container">
			<!-- new grid -->
            <div class="row">
                  <div class="col-lg-12">
						<div class="filter-holder">
							<!-- breadcrumb -->
							<ol class="breadcrumb">
								<li>
									<a href="{{func::set_url('/')}}">Home</a>
								</li>
								<li class="active">Search</li>
							</ol>
							<!-- end of breacrumb -->
							<!-- filter block -->
							@include('inc.filter')
							<!-- end of filter block -->
						</div>
					<!-- </div> of 1st container removal for resizing -->
					<!-- items list -->
					<div class="item-list">
					<!-- <div class="container"> second containar removal, /div stays; for resising-->
						<div class="row">
               @if(!empty($listings))
                 @for($i = 0 ; $i < count($listings); $i++)
                   <?php $item = $listings[$i]; ?>
                   <div class="col-md-4 col-sm-6">
        			   	   <div class="thumbnail">
                        <a href="{{func::set_url('/listing/'.$item->slug)}}">
            	   	   		<figure>
            	   	   			<img src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 400) : func::img_url('default-logo.png', 400) }}" alt="{{ $item->title }}">
                              @if(Auth::user())
                                <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                <a id="{{ $item->id }}" href="javascript:;" data-id="{{ $item->id }}" class="favourite{{ $added }}"><span class="icon-heart"></span></a>
                              @endif
            	   	   		</figure>
                        </a>
        			   	     <div class="caption">
        			   	   	  <h3><a href="{{func::set_url('/listing/'.$item->slug)}}">{{ $item->title }}</a></h3>
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
                   @if(($i+1)%3 ===0)
                     <div class="clearfix visible-md-block"></div>
                   @endif
                   @if(($i+1)%2 ===0)
                     <div class="clearfix visible-sm-block"></div>
                   @endif
                 @endfor
               @else
                 <div class="col-md-12 col-sm-12">
                   <p>
                     No Items found
                   </p>
                 </div>
               @endif
						</div>
						<!-- pagination -->
						<div class="pagination-wrap">
                              {{ $listings->links() }}
						</div>
						<!-- end of pagination -->
						</div> <!-- end of items -->
			    </div>
            </div> <!-- end of new grid -->
		</div> <!-- end main container -->
	</main>
@endsection
@section('scripts')
    <script>
    $(document).ready(function(){
        $("#category").change(function () {
            var val = $(this).val();
            if (val == "real-estates") {
                $("#sub_category").html("<option value='estates'>Estate</option><option value='apartment'>Apartment</option><option value='house'>House</option><option value='land'>Land</option><option value='others'>Others</option>");
            } else if (val == "jewellery-watches") {
                $("#sub_category").html("<option value='antique_jewelry'>Antique Jewelry</option><option value='jewelry'>Jewelry</option><option value='watch'>Watch</option>");
            } else if (val == "motors") {
                $("#sub_category").html("<option value='cars'>Cars</option><option value='classics'>Classics</option><option value='motorbikes'>Motorbike</option>");
            } else if (val == "handbags-accessories") {
                $("#sub_category").html("<option value='accessories_men'>Men Accessories</option><option value='accessories_women'>Women Accessories</option><option value='bags'>Bags</option>");
            } else if (val == "experiences") {
                $("#sub_category").html("<option value='experiences'>Experiences</option>");
            } else if (val == "collectibles-furnitures") {
                $("#sub_category").html("<option value='collectibles'>Collectibles</option><option value='furnitures'>Furnitures</option>");
            } else if (val == "yachts") {
                $("#sub_category").html("<option value='motor'>Motor</option><option value='sail'>Sail</option>");
            } else if (val == "aircrafts") {
                $("#sub_category").html("<option value='jet'>Jet</option><option value='helicopter'>Helicopter</option>");
            } else if (val == "art-antiques") {
                $("#sub_category").html("<option value='art'>Art</option><option value='antiques'>Antiques</option>");
            } else if (val == "fine-wines-spirits") {
                $("#sub_category").html("<option value='fine_wines'>Fine Wines</option><option value='spirits'>Spirits</option><option value='champagne'>Champagne</option>");
            }
        });
    })
    </script>
    @if(Auth::user())
        {{ csrf_field() }}
        <script>
        $(document).ready(function(){
            var ranges = $('input#range').val();
            var splitted = ranges.split(';');
            console.log(splitted);
            $("#range").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 1,
                max: 1000000000,
                from: splitted[0],
                to: splitted[1],
                type: 'double',
                step: 1000,
                prefix: "$",
                grid: false,
                prettify_enabled: true,
                prettify_separator: ","
            });

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
                        dataType: "html",
                        success: function(data){
                            console.log(data);
                            if(data == 0){
                                alert('Duplicated item, please contact Admin.');
                            }else{
                                alert('Added to your Wishlist.');
                                $('a#'+itemID).addClass('added');
                            }
                        },
                        error: function(errMsg){
                            console.log(errMsg.responseText);
                        }
                    });
                });
            });
        });
        </script>
    @endif
@endsection
