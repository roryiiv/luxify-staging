@extends('layouts.front')

@section('title')
<?php 
  $dealerName = isset($dealer->companyName) && !empty($dealer->companyName) ? $dealer->companyName : $dealer->firstName . ' ' . $dealer->lastName;
?>
  <title>{{ func::genTitle( $dealerName . ' Listings', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
    <style>
      .added span {
        color: red;
      }
      img.listing-img {
        opacity: 1;
        //transition: opacity .3s ease-in;
      }
    </style>
@endsection

@section('content')
<?php $banner = !empty($dealer->coverImageUrl) ? $dealer->coverImageUrl : 'about-banner.jpg'; ?>
    <section class="inner-banner auto-height parallax" style="background-image:url({{ func::img_url($banner, 1560) }});">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				    <div class="row">
					    <div class="col-lg-12">
					    <?php 
					    if(!empty($dealer->companyName)){
					      $company = json_decode($dealer->companyName);
					      if ($company === NULL) {
					          $title = $dealer->companyName; 
					      } else if(is_array($company)){
					          $title = $company[0]."</br>".$company[1]; 
					      } else {
					          $title = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName); 
					        }
					    }else{
					      $title = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
					    }
					    if(!empty($dealer->companyName) && ($dealer->companyName)!= null){
					      $company = json_decode($dealer->companyName);
					      if($company === NULL) {
					        $title1 = $dealer->companyName; 
					      } else if(is_array($company)){
					          $title1 = $company[0]."</br>".$company[1]; 
					        }else{
					          $title1 = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
					        }
					    }else{
					      $title1 = ucfirst($dealer->firstName) . ' ' . ucfirst($dealer->lastName);
					    }
					    ?>
						    <h1>{!! $title !!}</h1>
                <!--<p style="visibility: hidden;">Official Ferrari importer in Singapore</p>-->
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
                			<li class="active">{!! $title !!}</li>
                		</ol>
                		<!-- end of breacrumb -->
                		<!-- filter block -->
                		@include('inc.filter')
                		<!-- end of filter block -->
                	</div>
					<!-- items list -->
					<div class="item-list">
						<!-- <div class="container"> second containar removal, /div stays; for resising-->
							<div class="row">
                                @if(!empty($listings))
                                    @for($i = 0 ; $i < count($listings); $i++)
                                        <?php $item = $listings[$i]; ?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{func::set_url('/listing/'.$item->slug) }}">
                                                    <figure>
                                                        <img class="listing-img" src="/img/spin.gif" data-src="{{ !empty($item->mainImageUrl) ? func::img_url($item->mainImageUrl, 346, '', true) : func::img_url('default-logo.png', 346, '', true) }}" alt="{{ $item->title }}">
                                                        @if(Auth::user())

                                                            @if(Auth::user()->role === 'user' || Auth::user()->role === 'seller')
                                                              <?php $added = func::is_wishlist($user_id, $item->id) == 1 ? ' added' : ''; ?>
                                                              @if($added !== '')
                                                                <a class="favourite {{$added}}" data-id="{{$item->id}}" data-toggle='tooltip' data-placement='bottom' title="Remove from your wishlist" href="#"><span class="icon icon-heart"></span></a>
                                                              @else
                                                                <a class="favourite" data-id="{{$item->id}}" title="{{ $item->title }}" href="#"><span class="icon icon-heart"></span></a>
                                                              @endif
                                                            @elseif(Auth::user()->role === 'admin')
                                  
                                                                <a class="editListing" data-id="{{$item->id}}" href="{{func::set_url('/panel/product/edit/'.$item->id)}}" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>
                                                                <a class="deleteListing" data-id="{{$item->id}}" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                                                            @endif
                                                        @else
                                                            <a data-toggle="modal" data-listing="{{$item->id}}" data-target="#login-form" class="favourite" href="#"><span class="icon icon-heart"></span></a>
                                                        @endif
                                                    </figure>
                                                </a>
                                                <div class="caption">
                                                    <h3><a href="{{func::set_url('/listing/'.$item->slug) }}">{{ $item->title }}</a></h3>
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
            if (val == "real-estates") {
                $("#sub_category").html("<option value='estates'>Estates</option><option value='apartment'>Apartment</option><option value='house'>House</option><option value='land'>Land</option><option value='others'>Others</option>");
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

        $("img.listing-img").unveil(300, function() {
          $(this).load(function() {
             $(this).hide();
             $(this).fadeIn('slow');
          });
        });
    });
    </script>
    @if(Auth::user())
        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
        <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
        <script>
        $(document).ready(function(){
        });
        </script>
    @endif
    @if(Auth::user() && Auth::user()->role == 'admin')
      {{ csrf_field() }}
  
    @endif
    @include('inc.send-message-script')
@endsection
