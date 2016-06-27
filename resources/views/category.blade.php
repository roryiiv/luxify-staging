@extends('layouts.front')

@section('title', 'Luxify')

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
@endsection
@section('content')
    <section class="inner-banner auto-height parallax" style="background-image:url({{ func::img_url($banner, 1560) }});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				    <div class="row">
					    <div class="col-lg-12">
						    <h1>{{ $title_cat }}</h1>
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
									<a href="/">Home</a>
								</li>
								<li class="active">{{ $title_cat }}</li>
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
                                    @foreach($listings as $item)
                                        <div class="col-md-4 col-sm-6">
        									<div class="thumbnail">
                                                <a href="/listing/{{ $item->slug }}">
            										<figure>
            											<img src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 400) : func::img_url('default-logo.png', 400) }}" alt="{{ $item->title }}">
                                                        @if(Auth::user())
                                                            <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                                            <a id="{{ $item->id }}" href="javascript:;" data-id="{{ $item->id }}" class="favourite{{ $added }}"><span class="icon-heart"></span></a>
                                                        @endif
            										</figure>
                                                </a>
        										<div class="caption">
        											<h3><a href="/listing/{{ $item->slug }}">{{ $item->title }}</a></h3>
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
                                    @endforeach
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
    @if(Auth::user())
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
                            alert('Added to wishlist');
                            $('a#'+itemID).addClass('added');
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
