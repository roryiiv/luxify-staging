@extends('layouts.front')

@section('title', func::genTitle('Dealer Directory', false))

@section('meta-data')
<meta name="keywords" content="Luxury Sellers, Luxury Dealers, Luxury Marketplace">
<meta name="description" content="A directory of Luxify trusted dealers. High quality luxury dealers around the world.">
@endsection

@section('style')
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="/assets/css/luxify.css">
  <style>
   h1 {
     margin: 30px 0 10px 0!important;
   }
   a.dealer-link {
    color: #676767;
    font-size: 1.5rem;
   }
  </style>
@endsection

@section('content')
    <!-- main banner of the page -->
	  <section class="inner-banner parallax" style="background-image:url({{func::img_url('banners/dealer-application-main.jpg', '', '', false, true)}});">
		    <div class="container">
            <div class="banner-text">
                <div class="banner-center">
                    <!-- new grid -->
                      	<div class="row">
                          	<div class="col-lg-12">
		                		<h1>Dealer Directory</h1>
						    </div>
				        </div>
                      	<div class="row">
                          	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		               			<p style="font-weight: 300;">High Quality Luxury Dealers Around The World.</p>
		    	          	</div>
				        </div>
                  </div> <!-- end of new grid -->
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->

    <main id="main">
        <div class='container'>
           	<div class="row" style="margin-bottom:80px;">
              	<div class="col-md-12">
                 	<h1>0-9</h1>
                 	<hr>
              	</div>
              	@foreach($dealers as $dealer)
              		@if ($dealer->companyName != null || is_array($dealer->companyName))
              			@if(is_numeric($dealer->companyName[0]))
	                  		<div class="col-md-4">
	                    		<a class='dealer-link' href="{{func::set_url('/dealer/'.$dealer->id)}}/{{$dealer->slug}}">{{ $dealer->companyName }}</a>
	                  		</div>
	                	@endif
              		@endif
              	@endforeach
				<?php 
  				$curHeading = 'A';
  				$printedHeading = false;
				?>
@foreach($dealers as $dealer)
	@if ($dealer->companyName != null || is_array($dealer->companyName))
		@if(!is_numeric($dealer->companyName[0]) && ctype_alpha($dealer->companyName[0]))
		    @if(strtoupper($dealer->companyName[0]) === $curHeading)
		       	@if(!$printedHeading)
		          	<div class="col-md-12">
		           		<h1>{{$curHeading}}</h1>
		           		<hr>
	          		</div>
		         	<?php $printedHeading = true; ?>
		      	@endif
		     	<div class="col-md-4">
		          	<a class="dealer-link" href="/dealer/{{$dealer->id}}/{{$dealer->slug}}">{{ $dealer->companyName }}</a>
		      	</div>
		    @else 
		      <?php 
		        $curHeading = strtoupper($dealer->companyName[0]); 
		        $printedHeading = false;
		      ?>
		       @if(!$printedHeading)
		          <div class="col-md-12">
		           <h1>{{$curHeading}}</h1>
		           <hr>
		          </div>
		         <?php $printedHeading = true; ?>
		       @endif
		      <div class="col-md-4">
		          <a class="dealer-link" href="/dealer/{{$dealer->id}}/{{$dealer->slug}}">{{ $dealer->companyName }}</a>
		      </div>
		    @endif
		  @endif
	@endif 
  
@endforeach

<div class="col-md-12">
  <h1>Others</h1>
  <hr>
</div>
@foreach($dealers as $dealer)
	@if ($dealer->companyName != null || is_array($dealer->companyName))
		@if(!ctype_alnum($dealer->companyName[0]))
			<div class="col-md-4">
		    	<a class="dealer-link" href="{{func::set_url('/dealer/'.$dealer->id.'/'.$dealer->slug)}}">{{ $dealer->companyName }}</a>
		  	</div>
	  	@endif
	@endif
  
@endforeach

</div> 
        </div>
        <div class="sell-block">
            <div class="container">
                <div class="wrap">
                    <h2 class="h1">Becoming a Luxify Dealer</h2>
                    <p>Professional dealers use Luxify to transact successful sales of a wide selection of new, vintage and pre-owned luxury goods as well as luxury experiences</p>
                    <a href="{{func::set_url('/dealer-application')}}" id="apply-btn-two" class="btn btn-primary lightbox">Apply Now</a>
                </div>
            </div>
        </div>
    </main>


@endsection
