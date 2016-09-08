@extends('layouts.front')

@section('title')
  <title>{{func::genTitle($title_cat, true)}}</title>
@endsection
   
@section('meta-data')
    <meta name="title" content"{{func::genTitle($title_cat, true)}}">
    <meta name="keywords" content="{{ $meta['keywords']}}">
    <meta name="description" content="{{ $meta['desc']}}">
@endsection

<?php
	if(Auth::user()){
		$user_id = Auth::user() ? Auth::user()->id : '';
		$user_role = (Auth::user()->role == 'admin' && Session::get('view_as') !='') ? Session::get('view_as') : '';
	} 
?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
    <style>
      .added span {
        color: red;
      }
      img.listing-img {
        opacity: 1;
      }
    </style>
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
    @include('inc.send-message')
	<!-- main informative part of the page -->
	<main id="main">
		<div class="container-fluid">
			<!-- new grid -->
            <div class="row" style="margin-left: 0px; margin-right: 0px;">
            	<div id="container">
            		<div class="col-lg-12">
						<div class="filter-holder">
							<!-- breadcrumb -->
							<ol class="breadcrumb">
								<li>
									<a href="{{func::set_url('/')}}">Home</a>
								</li>
								<li class="active">{{ $title_cat }}</li>
	            				{{-- <li class="result-count" style="font-style: italic;">Showing {{ number_format($total)}} matching results</li> --}}
							</ol>
							<!-- end of breacrumb -->
							<!-- filter block -->
							<div style="display: none;">
								
							</div>
							<!-- end of filter block -->
						</div>
					</div>
					<div class="col-lg-3 col-xs-12">
						<div class="item-filter">
							<h1>{{ $title_cat }}</h1>
							<div class="row">
								<div class="col-xs-12">
									<div class="result-count" style="font-style: italic; font-size: 14px;">
										Showing {{ number_format($total)}} matching results
									</div>
									<div class="filter-search">
										<div class="row">
											<div class="col-xs-12">
												<form method="get" role="search" action="{{func::set_url('/category/'.$data->slug.'/search')}}" class="">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Search within results">
														<div class="input-group-addon">
												    		<button class="btn btn-default btn-cm" type="button">Search!</button>
												      	</div>
												    </div><!-- /input-group -->
												</form>
											</div>											
										</div>
									</div>
									<div class="filter-holder">
										<div class="filter-title">
											<a role="button" class="facetController" data-toggle="collapse" href="#categoryFilter" aria-expanded="true" aria-controls="categoryFilter">
												<h4>
													Category
													<span class="pull-right">
														<i class="glyphicon glyphicon-menu-down"></i>
													</span>
												</h4>
											</a>
										</div>
										<div class="filter-opts collapse in" aria-expanded="true" id="categoryFilter">
											<h4>{{ $title_cat }}</h4>
											<div class="filter-opts-content size-new">
												<ul>
													@foreach ($childs as $cat)
														<li>
															<a href="/category/{{ $data->slug }}/{{ $cat->slug }}">{{ $cat->name }}</a>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
									<div class="filter-holder">
	                                    <div class="filter-title ">
	                                        <a role="button" class="facetController" data-toggle="collapse" href="#rangeFilter" aria-expanded="true" aria-controls="rangeFilter">
	                                        	<h4>
	                                        		Price
	                                        		<span class="pull-right">
	                                        			<i class="glyphicon glyphicon-menu-down"></i>
	                                        		</span>
	                                        	</h4>
	                                        </a>
	                                    </div>
	                                    <div class="filter-opts collapse in" aria-expanded="true" id="rangeFilter">
	                                        <div class="ion-range ">
	                                            <span class="irs-bars"></span>
	                                            <input type="text" id="range" value="{{ isset($filters['range']) && !empty($filters['range']) ? $filters['range'] : '' }}" name="range" />
	                                        </div>
	                                        <br/>
	                                        <div class="form-inline input-range">
		                                        <div class="input-group">
		                                            <input type="number" class="form-control inputrange" style="color:#555;" id="startrange" placeholder="$ 1">
		                                            <span>&nbsp;to&nbsp;</span>
		                                            <input type="number" class=" form-control inputrange" style="color:#555;" id="endrange" placeholder="$ 1,000,000,000">           
		                                        </div>
		                                    </div>
	                                    </div>
	                                </div>
	                                <div class="filter-holder">
	                                	<div class="filter-title ">
	                                	    <a role="button" class="facetController" data-toggle="collapse" href="#locFilter" aria-expanded="true" aria-controls="locFilter">
	                                	    	<h4>
	                                	    		Location
	                                	    		<span class="pull-right">
	                                	    			<i class="glyphicon glyphicon-menu-down"></i>
	                                	    		</span>
	                                	    	</h4>
	                                	    </a>
	                                	</div>
	                                	<div class="filter-opts-content size-new" aria-expanded="true" id="locFilter">
	                                		<ul>
	                                		<?php
	                                		
	                                		$list = DB::table('listings')
	                                		->join('countries','countries.id','=','listings.countryId')
	                                		->select(DB::raw('countries.name,listings.id,count(listings.id)'))
	                                		->groupBy('countries.name')
	                                		->get();
	                                		
	                                		?>
	                                		    @foreach ($list as $country)
	                                		    	<li>
	                                		    		<a href="/category/{{ $data->slug }}/location/{{ $country->name }}">{{ $country->name }}</a>
	                                		    	</li>
	                                		    @endforeach
	                                		</ul>
	                                	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xs-12">
						<!-- </div> of 1st container removal for resizing -->
						<!-- items list -->
						<div class="item-list">
							<!-- <div class="container"> second containar removal, /div stays; for resising-->
							<div class="row">
	                            @if(!empty($listings))
	                                @for($i = 0 ; $i < count($listings); $i++)
	                                    <?php $item = $listings[$i]; ?>
	                                    <div class="col-sm-6 col-md-4 co-lg-4">
	                                        <div class="thumbnail">
	                                            <a href="{{func::set_url('/listing/'.$item->slug) }}">
	                                                <figure>
	                                                    <img class="listing-img" src="/img/spin.gif" data-src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 346, '', true) : func::img_url('default-logo.png', 346, '', true) }}" alt="{{ $item->title }}">
	                                                    @if(Auth::user())

	                                                        @if($user_role === 'user' || $user_role === 'seller')
	                                                          <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
	                                                          @if($added !== '')
	                                                            <a class="favourite {{$added}}" data-id="{{$item->id}}" data-toggle='tooltip' data-placement='bottom' title="Remove from your wishlist" href="#"><span class="icon icon-heart"></span></a>
	                                                          @else
	                                                            <a class="favourite" data-id="{{$item->id}}" title="{{ $item->title }}" href="#"><span class="icon icon-heart"></span></a>
	                                                          @endif
	                                                        @elseif($user_role === 'admin')
	                              
	                                                            <a class="editListing" data-id="{{$item->id}}" href="{{func::set_url('/panel/product/edit/'.$item->id)}}" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>
	                                                            <a class="deleteListing" data-id="{{$item->id}}" href="#"><span class="glyphicon glyphicon-trash"></span></a>
	                                                        @endif
	                                                    @else
	                                                        <a data-toggle="modal" data-listing="{{$item->id}}" data-target="#login-form" class="favourite" href="#"><span class="icon icon-heart"></span></a>
	                                                    @endif
	                                                </figure>
	                                            </a>
	                                            <div class="caption">
	                                                <h3><a href="{{func::set_url('/listing/'.$item->slug)}}">{{ $item->title }}</a></h3>
	                                                <?php
	                                                $dealer = func::getTableByID('users', $item->userId);
	                                                $sess_currency = null !==  session('currency') ? session('currency') : 'USD';
	                                                $price_format = func::formatPrice($item->currencyId, $sess_currency, $item->price);
	                                                ?>
	                                                <div>
	                                                  <span class="price">{{ $price_format }}</span>
	                                                </div>
	                                                <div class="country-container">
	                                                  <span class="country">{{$item->country}}</span>
	                                                </div>
	                                                <div class="item-logo">
	                                                    <img src="{{ !empty($dealer->companyLogoUrl) ? func::img_url($dealer->companyLogoUrl, '', 200, true) : func::img_url('default-logo.png', '', 200, true) }}" alt="image description">
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    @if(($i+1)%3 ===0)
	                                        <div class="clearfix visible-md-block visible-lg-block hr-line"></div>
	                                    @endif
	                                    @if(($i+1)%2 ===0)
	                                        <div class="clearfix visible-sm-block hr-line"></div>
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
            	</div>
        	</div> <!-- end of new grid -->
		</div> <!-- end main container -->
	</main>
@endsection
@section('scripts')

    <script type="text/javascript" src="/assets/js/jquery.IonRangeSlider.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.unveil.js"></script>
    <script>
    $(document).ready(function(){
        var newstart = $('#startrange').val(),
            newend = $('#endrange').val();
        updateInputs();
        $('.inputrange').on('change',function(){
            svalue = $('#startrange').val();
            evalue = $('#endrange').val();
            if(validatingrange(svalue,evalue)){
                updaterange();
            }else{
                console.log('error');
            }
        });
        $("img.listing-img").unveil(300, function() {
            $(this).load(function() {
                $(this).hide();
                $(this).fadeIn('slow');
            });
        });
        $('.facetController').click(function(event){
        	var status = $(this).attr('aria-expanded');
        	var x = $(this).find('h4 > span.pull-right > i');
        	console.log(status);
        	if(status == 'true'){
        		x.removeClass('glyphicon glyphicon-menu-down');
        		x.addClass('glyphicon glyphicon-menu-right');
        	}else if(status == 'false'){
        		x.removeClass('glyphicon glyphicon-menu-right');
        		x.addClass('glyphicon glyphicon-menu-down');
        	}
        });
        function validatingrange(start,end){
            start = parseInt(start);
            end = parseInt(end);
            if(start>0 && end<1000000001 && start<=end){
                return true;
            }else{
                if(start>end){
                    $('#startrange').val(end);
                    return true;
                }else if((start<1) || isNaN(start) || (start=='') || (start==0)){
                    $('#startrange').val(1);
                    return true;
                }else if((end>1000000000) || isNaN(end) || (end=='') || (end==0)){
                    $('#endrange').val(1000000000);
                    return true;
                }
            }

        }
        function updateInputs(){
            var ranges = $('#range').val();
            splits = ranges.split(';');
            startrange = splits[0];
            endrange = splits[1];
            $('#startrange').val(startrange);
            $('#endrange').val(endrange);
        }
        $("#category").change(function () {
            var val = $(this).val();
            $('form.filter-form').attr('action', '/category/'+val);
            $.ajax({
                url:'{{route('getchild')}}/'+val,
                success: function(html) {
                    $("#sub_category").html(html);
                }
            });
        });

        var ranges = $('input#range').val();
        var splitted = ranges.split(';');
        // console.log(splitted);
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
            prettify_separator: ",",
            onStart: updateInputs,
            onChange: updateInputs,
            onFinish: updateInputs
        });
        function updaterange(){
            range = $("#range").data("ionRangeSlider");
            range.update({
                from: $('#startrange').val(),
                to: $('#endrange').val(),
            });
            $('#range').val($('#startrange').val()+';'+$('#endrange').val());
        }


    });
    </script>
    @if(Auth::user())
        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
        <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
    @endif
    @if(Auth::user() && $user_role == 'admin')
      {{ csrf_field() }}
    @endif
    @include('inc.send-message-script')
@endsection
