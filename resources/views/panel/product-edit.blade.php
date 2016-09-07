@inject('s_meta', 'App\Meta')
@extends('layouts.panel')
@section('head')
<!-- PACE-->
<link rel="stylesheet" type="text/css" href="/db/css/pace-theme-flash.css">
<script type="text/javascript" src="/db/js/pace.min.js"></script>
<!-- Bootstrap CSS-->
<link rel="stylesheet" type="text/css" href="/db/css/bootstrap.min.css">
<!-- Fonts-->
<link rel="stylesheet" type="text/css" href="/db/css/themify-icons.css">
<!-- Malihu Scrollbar-->
<link rel="stylesheet" type="text/css" href="/db/css/jquery.mCustomScrollbar.min.css">
<!-- Animo.js-->
<link rel="stylesheet" type="text/css" href="/db/css/animate-animo.min.css">
<!-- Flag Icons-->
<link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
<!-- Bootstrap Progressbar-->
<link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
<!-- jQuery Steps-->
<link rel="stylesheet" type="text/css" href="/db/css/jquery.steps.css">
<!-- sweetAlert-->
<link rel="stylesheet" type="text/css" href="/db/css/sweetalert.css">
<!-- Font Awesome-->
<link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">
<!-- Summernote-->
<link rel="stylesheet" type="text/css" href="/db/css/summernote.css">
<!-- Bootstrap Date Range Picker-->
<link rel="stylesheet" type="text/css" href="/db/css/daterangepicker.css">
<!-- Primary Style-->
<link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
<link rel="stylesheet" type="text/css" href="/db/css/custom.css">
<!-- Boostraps_markdown Plugin Style -->
<link rel="stylesheet" type="text/css" href="/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<!-- Boostraps_tagit Plugin Style -->
<link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput-typeahead.css">
<style>
    .hideslug{
        display: none;
    }
    .showslug{
        display: block;
    }
    .draganddropcustom{
        background: #fff;
    }
    .draganddropcustom:focus{
        background: #fffcec;
    }
    .dot-hidden{
        width: 5px !important;
        background:repeating-linear-gradient( -50deg,
            #fafafa,
            #fafafa 4px,
            #eee 5px,
            #eee 7px
            );
    }
    .dragplaceholder{
        background:#fafafa;
        height: 150px;

    }
    .overdrag{
        opacity: 0.8;
        background: #ddd;
    }
    .draganddropcustom:hover > .dot-hidden{
        cursor: move;
    }
  .sweet-alert .sa-icon.sa-success .sa-line {
    height: 5px !important;
    background-color: #5cb85c !important;
    display: block !important;
    border-radius: 2px !important;
    position: absolute !important;
    z-index: 2 !important;
  }

  .sweet-alert .sa-icon.sa-success .sa-placeholder {
    width: 80px;
    height: 80px;
    border: 4px solid rgba(92, 184, 92, 0.2);
    border-radius: 50%;
    box-sizing: content-box;
    position: absolute;
    left: -4px;
    top: -4px;
    z-index: 2;
  }

  .confirm {
    box-shadow: 0 3px 0 0 #117b66 !important;
    padding: 10px 20px !important;
    font-size: 16px !important;
    line-height: 1.3333333 !important;
    border-radius: 6px !important;
    margin-bottom: 0 !important;
    color: #FFF;
    background-color: #17A88B !important;
    border-color: #17A88B !important;
  }

  .confirm:hover {
    color: #FFF !important;
    background-color: #117b66 !important;
    border-color: #117b66 !important;
  }

  h2 {
    color: #737373 !important;
    font-weight: 300 !important;
    margin-top: -14px !important;
    margin-bottom: 10px !important;
    font-size: 30px !important;
  }

  .sweet-alert p {
    font-size: 21px;
    color: #9a9a9a;
  }

  .sweet-alert[data-has-cancel-button=false] button {
    box-shadow: 0 3px 0 0 #117b66 !important;
  }
  
</style>

@endsection

@section('content')
<div class="page-container">
    <div class="page-header clearfix">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mt-0 mb-5">@lang('panel.product_edit_listing')</h4>
            </div>
            <div class="col-sm-6">
                @include('inc.set-lang-dashboard-panel')
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <form id="form-tabs_edit_product" class="form-horizontal" action="{{func::set_url('/panel/product/update/')}}{{$item->id}}" method="POST">
            {!! csrf_field() !!}
            <h3>@lang('panel.product_edit_category')</h3>
            <fieldset>
                <div id="category" role="tabpanel" class="tab-pane active">
                    <div class="form-group">
                        <label for="itemLocation" class="col-sm-3 control-label">@lang('panel.product_edit_category1')</label>
                        <div class="col-sm-9">
                            <select id="itemLocation" name="itemLocation" class="form-control" required>
                                <?php $countries = func::build_countries(); ?>
                                <option value="">--Please Select--</option>
                                @foreach($countries as $country)
                                    <option {{func::selected($item->countryId, $country['val'])}} value="{{ $country['val'] }}">{{ $country['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="itemAvailability" class="col-sm-3 control-label">@lang('panel.product_edit_category2')</label>
                        <div class="col-sm-9">
                            <select id="itemAvailability" name="itemAvailability" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <?php $selectAvail = $item->availableToId === NULL? 'worldwide': $item->availableToId; ?>
                                <option {{func::selected($selectAvail, 'worldwide')}} value="worldwide">Worldwide</option>
                                <option {{func::selected($selectAvail, $item->availableToId)}} value="asItemLoction">Same Item Location</option>
                            </select>
                        </div>
                    </div>
                   <div class="form-group">
                            <label for="itemCategory" class="col-sm-3 control-label">@lang('dashboard.product_edit_itemcategory')</label>
                            <div class="col-sm-9">
                                <select id="itemCategory" name="itemCategory" class="form-control" required>
                                    {!! $item->itemCategory!!}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="itemSubCategory" class="col-sm-3 control-label">@lang('dashboard.product_edit_itemsub')</label>
                            <div class="col-sm-9">
                           
                                <select id="itemSubCategory" name="itemSubCategory" class="form-control" >
                                    {!!$item->itemSubCategory!!}
                                   
                                </select>
                            </div>
                        </div>
                </div>
            </fieldset>

            <h3>@lang('panel.product_edit_detail')</h3>
            <fieldset>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">@lang('panel.product_edit_detail1')</label>
                    <div class="col-sm-9">
                        <input id="title" name='title' type="text" class="form-control" value="{{$item->title}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">@lang('panel.product_edit_detail2')</label>
                    <div class="col-sm-9">
                        <select id="status" name="status" class="form-control">
                            <option value="">--Please Select--</option>
                            <option {{func::selected($item->status, 'APPROVED')}} value='APPROVED'>Approved</option>
                            <option {{func::selected($item->status, 'PENDING')}} value='PENDING'>Pending</option>
                            <option {{func::selected($item->status, 'SOLD')}}  value="SOLD">Sold</option>
                            <option {{func::selected($item->status, 'REJECTED')}}  value="REJECTED">Rejected</option>
                            <option {{func::selected($item->status, 'EXPIRED')}}  value="EXPIRED">Expired</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="condition" class="col-sm-3 control-label">@lang('panel.product_edit_detail3')</label>
                    <div class="col-sm-9">
                        <select id="condition" name="condition" class="form-control" required>
                            <option value="">--Please Select--</option>
                            <option {{func::selected($item->condition, 'NEW')}}  value="NEW">New</option>
                            <option {{func::selected($item->condition, 'PRE-OWNED')}} value="PRE-OWNED">Pre-Owned</option>
                        </select>
                        <h6>@lang('panel.product_edit_detail4')
                        </h6>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-3 control-label">@lang('panel.product_edit_detail5')</label>
                    <div class="col-sm-9">
                        <input id="price" name='price' type="number" class="form-control" min=0 value="{{$item->price}}" {{ $item->price === NULL ? 'disabled': '' }} />
                        <h6>@lang('panel.product_edit_detail6')
                        </h6>
                    </div>
                </div>
                <div class="form-group">
                    <label for="priceOnRequest" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <input {{ $item->price === NULL ? 'checked': '' }} type="checkbox" id="priceOnRequest" name='priceOnRequest'> @lang('panel.product_edit_detail8')</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="currency" class="col-sm-3 control-label">@lang('panel.product_edit_detail7')</label>
                    <div class="col-sm-9">
                        <select id="currency" name="currency" class="form-control" required>
                            <option value="">--Please Select--</option>
                            <?php $currencies = func::build_curr(); ?>
                            @foreach($currencies as $currency)
                                <option {{func::selected($item->currencyId, $currency['val'])}}  value="{{ $currency['val'] }}">{{ $currency['label'] ." (".$currency['code'].")" }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">@lang('panel.product_edit_desc')</label>
                        <div class="col-sm-9">
                            <textarea id="description" name='description'  class="form-control" cols="3" rows="10" data-hidden-buttons="cmdCode cmdQuote" data-provide="markdown">{{$item->description}}</textarea>
                            <h6>@lang('panel.product_edit_desc1')</h6>
                            <p><a id="toggleArchive" href="javascript:;" class="btn btn-outline btn-danger">@lang('panel.product_edit_desc2')</a></p>
                            <div id="archive" class="history_holder" style="display: none">
                                <h5>Saved Description:</h5>
                                <table class="table table-hover wrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">Date</th>
                                            <th style="width: 65%;">Content</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $old)
                                        <tr>
                                            <td>
                                                {{$old->created_at}}
                                            </td>
                                            <td>
                                                <textarea class="old_textarea" id="content-{{$old->id}}" style="width: 100%;" rows="4" disabled="disabled">
                                                    {{$old->object_field}}
                                                </textarea>
                                            </td>
                                            <td>
                                                <a href="content-{{$old->id}}" class="use_this btn btn-outline btn-success"><i class="ti-files"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="expiryDate" class="col-sm-3 control-label">@lang('panel.product_edit_expiry')</label>
                        <div class="col-sm-9">
                            <?php $expired_at = date_create($item->expired_at); ?>
                            <input id="startDate" name='expiryDate' type="text" class="form-control" value="{{ $expired_at ? date_format($expired_at, "Y-m-d"):'' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="optionalFields" class="col-sm-3 control-label title_details">@lang('dashboard.product_edit_optional')</label>
                        <div class="col-sm-9 col-sm-offset-3" id="optionFields">{!! $item->optionFields !!}</div>
                    </div>
                </div>
            </fieldset>

            <h3>@lang('panel.product_edit_image')</h3>
            <fieldset>
                <div id="about" role="tabpanel" class="tab-pane">
                    <div class="widgets">
                        <div class="widget-heading">
                            <h5 class="m-0">@lang('panel.product_edit_image1')</h5>
                        </div>
                        <div class="widget-body">
                            <div id="item-images-dz" class="dropzone text-center"></div>
                        </div>
                        <div class="widget-heading pt-0">
                            <h6 class="m-0">@lang('panel.product_edit_image2')</h6>
                        </div>
                    </div>
                    <div id='images-preview-zone' class='dropzone-previews' style="display:none;">
                        <div class="images-table">
                            <div class="header">@lang('panel.product_edit_image3')</div>
                            <div class="header">@lang('panel.product_edit_image4')</div>
                            <div class="header">@lang('panel.product_edit_image5')</div>
                            <div class="header">@lang('panel.product_edit_image6')</div>
                            <div class="header">@lang('panel.product_edit_image7')</div>
                        </div>
                    </div>


                    <table style="width: 100%" class="table table-bordered sortir" id="images-preview-table">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2">@lang('panel.product_edit_image8')</th>
                                <th>@lang('panel.product_edit_image9')</th>
                                <th style="width: 20%">@lang('panel.product_edit_image10')</th>
                                <th class="text-center">@lang('panel.product_edit_image11')</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <h3>@lang('panel.product_edit_additional')</h3>
            <fieldset>
                <div id="data" role="tabpanel" class="tab-pane">
                    <div class="form-group">
                        <label for="buyNowURL" class="col-sm-3 control-label">@lang('panel.product_edit_additional1')</label>
                        <div class="col-sm-9">
                            <input id="buyNowURL" name="buyNowURL" type="text" value="{{$item->buyNowUrl}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aerialLookURL" class="col-sm-3 control-label">@lang('panel.product_edit_additional2')</label>
                        <div class="col-sm-9">
                            <input id="aerialLookURL" name="aerialLookURL" type="text" class="form-control" value="{{$item->aerialLookUrl}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aerial3DLookURL" class="col-sm-3 control-label">@lang('panel.product_edit_additional3')</label>
                        <div class="col-sm-9">
                            <input id="aerial3DLookURL" name='aerial3DLookURL' type="text" class="form-control" value={{$item->aerialLook3DUrl}}>
                        </div>
                    </div>
                    <hr></hr>
                    
                </div>
            </fieldset>
            <h3>@lang('panel.product_edit_seo')</h3>
            <fieldset>
                <div class="form-group">
                            <label for="urlslug" class="col-sm-3 control-label">@lang('panel.product_edit_seo1')</label>
                            <div class="col-sm-9">
                                <div class="hideslug">
                                    <div class="input-group">
                                      <div class="input-group-addon" style="background:#eee;border-color:#ccc;">{{url('/'.$item->url_object)}}/</div>
                                      <input type="text" class="form-control get_slug" id="" name="slug" data-id = "{{$item->id}}" value="{{$item->slug}}"
                                      ">
                                      <span class="createorupdateslug input-group-addon btn">
                                          Save URL
                                      </span>
                                    </div>    
                                </div>
                                
                                <div class="showslug">
                                <?php
                                if(strlen($item->slug)<=40){
                                    $newslug =  $item->slug;
                                }else{
                                    $count = strlen($item->slug);
                                    $newslug = substr($item->slug,0,20).' ....... '.substr($item->slug,$count-20,$count);
                                }
                                ?>
                                    <a class="updatelink" href="{{url('/'.$item->url_object).'/'.$item->slug}} " target="_blank" style="text-decoration: underline;" >{{url('/'.$item->url_object).'/'}}<strong>{{$newslug}}</strong></a>
                                     &nbsp;<span class="btn btn-sm btn-outline btn-danger edit_slug">@lang('panel.product_edit_seo2')</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">@lang('panel.product_edit_seo3')</label>
                            <div class="col-sm-9">
                                <input id="meta_title" name='meta_title' type="text" class="form-control" placeholder="{{$item->meta_title == '' ? $item->title : $item->meta_title}}">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="meta_alttext" class="col-sm-3 control-label">@lang('panel.product_edit_seo4')</label>
                            <div class="col-sm-9">
                                <input id="alttext" name='meta_alttext' type="text" class="form-control" placeholder="{{$item->meta_alt_text}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description" class="col-sm-3 control-label">@lang('panel.product_edit_seo5')</label>
                            <div class="col-sm-9">
                                <textarea id="meta_description" name='meta_description' class="form-control " maxlength="500" placeholder="{{$item->meta_description == '' ? $item->description : $item->meta_description}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword" class="col-sm-3 control-label">@lang('panel.product_edit_seo6')</label>
                            <div class="col-sm-9 "><div class="tagit-sugestion">
                                
                                <style>
                                    .bootstrap-tagsinput{
                                        width: 100%;
                                    }
                                </style>
                                <div>
                                    
                                <input type="text" id="meta_keyword" name='meta_keyword' class="form-control typeahead" value="{{$item->meta_keyword}}">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="meta_author" class="col-sm-3 control-label">@lang('panel.product_edit_seo7')</label>
                            <div class="col-sm-9">
                                <input id="meta_author" name='meta_author' type="text" maxlength="60" class="form-control" placeholder="{{$item->meta_author == '' ? $item->title : $item->meta_author}}">
                            </div>
                        </div>
            </fieldset>
        </form>
    </div>
    <div class="dz-preview dz-file-preview" id="dz-preview-template" style="display:none;">
        <div class="row">
            <div class="text-center">
                <img data-dz-thumbnail width="100" class="img-thumbnail img-responsive">
                <span data-dz-size></span>
            </div>
            <div class="row">
                <input type="text" data-dz-xhr-responseText disabled name="images[]" class="form-control">
            </div>
            <div class="row">
                <div class="radio">
                    <label>
                        <input type="radio" name="mainImage" data-dz-name data-rule-required="true" aria-required="true">Main Image
                    </label>
                </div>
            </div>
            <div class="text-center row">
                <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
            </div>
        </div>
    </div>

    <script type='text/template' class="dz-preview dz-file-preview" id="dz-preview-template" style="display:none;">
        <div class="row">
        </div>
    </script>
@include('inc.product-message')
@endsection

@section('scripts')
<!-- jQuery-->
<script type="text/javascript" src="/db/js/jquery.min.js"></script>

<script type="text/javascript" src="/db/js/jquery-ui.js"></script>

<script type="text/javascript" src="/db/js/main.js"></script>
<!-- Bootstrap JavaScript-->
<script type="text/javascript" src="/db/js/bootstrap.min.js"></script>
<!-- Malihu Scrollbar-->
<script type="text/javascript" src="/db/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Animo.js-->
<script type="text/javascript" src="/db/js/animo.min.js"></script>
<!-- Bootstrap Progressbar-->
<script type="text/javascript" src="/db/js/bootstrap-progressbar.min.js"></script>
<!-- jQuery Easy Pie Chart-->
<script type="text/javascript" src="/db/js/jquery.easypiechart.min.js"></script>
<!-- jQuery Steps-->
<script type="text/javascript" src="/db/js/jquery.steps.min.js"></script>
<!-- Summernote-->
<script type="text/javascript" src="/db/js/summernote.min.js"></script>
<!-- MomentJS-->
<script type="text/javascript" src="/db/js/moment.min.js"></script>
<!-- Bootstrap Date Range Picker-->
<script type="text/javascript" src="/db/js/daterangepicker.js"></script>
<!-- DropzoneJS-->
<script type="text/javascript" src="/db/js/dropzone.min.js"></script>
<!-- SweetAlert.js-->
<script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
<!-- Bootstrap FileStyle-->
<script type="text/javascript" src="/db/js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>

<!-- Custom JS-->
<script type="text/javascript" src="/db/js/app.js"></script>
<script type="text/javascript" src="/db/js/demo.js"></script>
<script type="text/javascript" src="/db/js/edit-product.js"></script>
<script type="text/javascript" src="/db/js/dropzone-js.js"></script>
<script type="text/javascript" src="/db/js/date-range-picker.js"></script>
<script type="text/javascript" src="/db/js/lodash.core.min.js"></script>
<script type="text/javascript" src="/db/js/jquery.cookie.js"></script>
<!-- Boostraps_markdown Plugin Script -->
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/markdown.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/to-markdown.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/jquery.hotkeys.js"></script>
<!-- Booostraps_tagit input plugin -->
<script type="text/javascript" src="/plugins/typeahead.js/dist/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<script>
    
    <?php

    $otherImages = json_decode($item->images);
    $s3_url = 'https://s3-ap-southeast-1.amazonaws.com/luxify/images/';
    if (is_array($otherImages)) {
	    foreach ($otherImages as $key => $img) {
	    	$check_img = get_headers($s3_url . $img);
          // check where there are 404 images 
	        if($check_img[0] != 'HTTP/1.1 200 OK'){
		        unset($otherImages[$key]);
	       }
	     }
    } else {
      $otherImages = array(); 
    }

    $check_mainImg = get_headers($s3_url . $item->mainImageUrl);
    $mainImage = array();
    if($check_mainImg[0] == 'HTTP/1.1 200 OK'){
      $mainImage[] = $item->mainImageUrl; 
    }

    // Martins fix
    // remove duplicate mainImage in other image
    $otherImages = array_diff($otherImages, $mainImage);

    // concat the all image array
    $images_arr = array_merge($mainImage, $otherImages);
    $images = array();

    foreach($images_arr as $img) {
      $images[] = array('path' => func::img_url($img, 100, ''), 'filename'=> $img, 'onS3' => true, 'alt_text' => $s_meta::get_slug_img($img));
    }

    ?>
    var images_array = <?php echo json_encode($images, JSON_PRETTY_PRINT); ?>;
    var radiomainimage = '{{$item->mainImageUrl}}';
    var optionalFields = <?php echo json_encode($item->optionFields, JSON_PRETTY_PRINT) ?>;


    function deleteImg(ele, i, filename, onS3) {
      onS3 = (typeof onS3 === 'undefined') ? false : onS3;
        $.ajax({
            url:'/removeImage',
            method: 'POST',
            data: {
                filename: filename,
                onS3: onS3,
                itemId: {{ $item->id }}
            },
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            },
            dataType: "json",
            success: function(res, err) {
                if (res.result === 1) {
                    images_array.splice(i, 1);
                    genImagesPreview();
                }
            },
            error: function(errMsg){
                console.log(errMsg.responseText);
            }
        });
    }
    function downloadImg(ele, i, filename, onS3 = false) {
    }

    function genImagesPreview() {
        var table = $("#images-preview-table tbody");
        table.html('');
        for (var i = 0; i < images_array.length; i++) {
            $('<tr class="draganddropcustom"><td class="dot-hidden" style="border-right:medium none;"></td><td class="text-center" style="border-left: medium none;"><img width="100" class="img-thumbnail img-responsive" src="'+ images_array[i].path +'"></td><td><input type="text" disabled value="'+ images_array[i].filename + '" class="form-control" /> <br/><input type="text" id="'+images_array[i].filename+'" value="'+ images_array[i].alt_text + '" placeholder="alt text . . ." name="alt_text[]" class="form-control" /><input name="images[]" type="hidden" value="'+ images_array[i].filename + '" /></td><td><div class="radio"><label><input type="radio" '+(radiomainimage==images_array[i].filename?"checked":"")+' name="mainImage" data-dz-name data-rule-required="true" aria-required="true" value="' + images_array[i].filename +'">Main Image</label></div></td><td class="text-center"><button type="button" class="btn btn-sm btn-outline btn-danger" onclick="deleteImg(this, '+i+', \''+ images_array[i].filename +'\', '+ images_array[i].onS3+')"><i class="ti-trash"></i></button> <a href="{{func::set_url("/download-image")}}/'+images_array[i].filename+'" target="_blank" type="button" class="btn btn-sm btn-outline btn-success"><i class="ti-download"></i></a></td></tr>').appendTo(table);
        }
    }
    function genControls({id, type, name, label, optionValues, value, valueId}){
        switch(type){
            case 'textfield':
            case 'text':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="optionfields['+ id +']" type="text" class="form-control" value="'+ (value  || '') +'"></div>';
            break;
            case 'number':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="optionfields['+ id +']" type="number" class="form-control" value="'+   (value || '') +'"></div>';
            break;
            case 'textarea':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><textarea id="'+ label +'" name="optionfields['+ id +']" class="form-control">'+ (value || '') +'</textarea></div>';
            break;
            case 'year':
            case 'yearpick':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="startDate" name="optionfields['+ id +']" type="date" class="form-control" value="'+ (value ||     '') +'" /></div>';
            break;
            case 'dropdown':
            var html = '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><select name="optionfields['+ id +']" class="form-control" ><option>Please select</option>';
            for(var i = 0; i < optionValues.length; i++){
                html += '<option '+ (optionValues[i].value== value? 'selected': '' ) +' value="'+optionValues[i].value+'">'+ optionValues[i].text+'</option>';
            }
            html += '</select></div>';
            return html;
            break;
            default:
            return '';
        }
    }

    $(document).ready(function () {
        //new edit slug
        $('.edit_slug').click(function(){
            $('.showslug').hide();
            $('.hideslug').show();
        });
        var keywords = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: {
            url: '{{route('get_keyword_json')}}',
            filter: function(list) {
              return $.map(list, function(keyword) {
                return { name: keyword }; });
            }
          }
        });
        keywords.clearPrefetchCache();
        var keywords = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: {
            url: '{{route('get_keyword_json')}}',
            filter: function(list) {
              return $.map(list, function(keyword) {
                return { name: keyword }; });
            }
          }
        });
        keywords.initialize();
        /**
         * Typeahead
         */
        $('.tagit-sugestion > > input').tagsinput({
          typeaheadjs: {
            name: 'keywords',
            displayKey: 'name',
            valueKey: 'name',
            source: keywords,
            limit: 100,
          }
        });
        $(".twitter-typeahead").css('display', 'inline');

        //sortable edit

        var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });
            return $helper;
        },
/*        updateIndex = function(e, ui) {
            $('.reindex', ui.item.parent()).each(function (i) {
                $(this).val(i);
            });
        },*/
        overIndex = function(e, ui) {
            $(ui.helper[0]).addClass("overdrag");
          }

        $(".sortir tbody").sortable({
            helper: fixHelperModified,
            //stop: updateIndex,
            placeholder: "dragplaceholder",
            over: overIndex
        });

        //markdown
        $('#description').markdown({});
        $('.createorupdateslug').click(function(){
            var newslug = $('.get_slug').val();
            var id = $('.get_slug').attr('data-id');
                $.ajax({
                    url: "{{route('get_slug')}}/"+id+"/"+newslug,
                    async: false,
                    cache: false,
                    success:function( html ) {
                        $( ".get_slug" ).val( html );
                        var count = html.length;
                        if(count<=40){
                            newslug = html;
                        }else{
                            newslug = html.substr(0, 20)+'......'+html.substr(count-20,count)
                        }
                        $('.updatelink').html('{{url("/")}}/listing/'+newslug);
                        $('.updatelink').attr('href','{{url("/")}}/listing/'+html);
                        $('.hideslug').hide();
                        $('.showslug').show();

                    }
                });
        });
        genImagesPreview();

        for (var i = 0; i < optionalFields.length ; i++){
            $(genControls(optionalFields[i])).appendTo('#optionFields');
        }

        $('.actions ul li').click(function () {
           var x = $(this).find('a').attr('href');
            // console.log(x);
            if(x == '#finish'){
                $("#update-product-form").modal('show');
            }
        });

        var parent = $('#itemCategory').val();

        if(parent == 135 || parent == 136 || parent == 137){
            $('#itemSubCategory').hide();
        }

        $('#itemCategory').on('change',function(){
            var parent = $(this).val();

            if(parent == 135 || parent == 136 || parent == 137){
                var status = true;
            }
            else{
                var status = false;
            }

            console.log(parent);
            $.ajax({
                url : '/api/ajax/category/'+parent,
                method : 'get',
                success: function(result){  
                    if(status == false){  
                        $('#itemSubCategory').html(result);
                        $('#itemSubCategory').show();
                    }else{
                        $('#itemSubCategory').hide();
                    }

                }
            });

            var id = $(this).val();
            console.log(id);
            $.ajax({
                url : '/api/ajax/optional-fields/'+id,
                method : 'get',
                success: function(result){  
                    $('#optionFields').html(result);
                    $('#optionFields').show();

                }
            });
        });
        $('#itemSubCategory').on('change',function(){
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url : '/api/ajax/optional-fields/'+id,
                method : 'get',
                success: function(result){  
                    $('#optionFields').append(result);
                    
                }
            });
        });
        /*$('#itemCategory').on('change', function(){
            var _token = $('input[name=_token]').val();
            $.get({
                url: '/api/category/'+ $('#itemCategory').val() + '/fields',
                headers: {'X-CSRF-TOKEN': _token},
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    if (result.result === 1){
                        $('#optionFields').html('');
                        for (var i = 0; i < result.data.length ; i++){
                            $(genControls(result.data[i])).appendTo('#optionFields');
                        }
                    }
                }
            });
        });*/

        $('#priceOnRequest').on('click', function(){
            $('#price').prop('disabled', $('#priceOnRequest').prop('checked') );
        });

        var token = "{{ Session::getToken() }}";
        $("#item-images-dz").dropzone({
            url: "/upload_multiple",
            paramName: "files",
            params: {
                _token: token
            },
            // headers: {'X-CSRF-Token': $('input[name=_token]').val()},
            // maxFilesize: 5,
            maxFiles: 20,
            // maxThumbnailFilesize: 1,
            uploadMultiple: true,
            autoProcessQueue: true,
            previewsContainer: "#images-preview-zone",
            previewTemplate: $('#dz-preview-template').html(),
            dictDefaultMessage: "<i class='icon-dz fa fa-files-o'></i>Drop files here to upload",
            sending: function(file, xhr, formData){
                swal({
                    title: "Uploading Images",
                    text: "Currently Uploading Images.",
                    //   timer: 2000,
                    showConfirmButton: false
                });
            },
            init: function() {
                this.on('complete', function(result) {
                    swal.close();
                    var files = JSON.parse(result.xhr.response);
                    for (var i = 0; i < files.length; i++) {
                        if (typeof _.find(images_array, {filename: files[i].filename}) === 'undefined') {
                            images_array.push(files[i]);
                        }
                    }
                    genImagesPreview();
                });
            },
            error: function(errMsg){
                console.log(errMsg.responseText);
            }
        });

        //description history action
        $('a#toggleArchive').click(function(event){
            event.preventDefault();
            $('div#archive').toggle('slow');
            $('.old_textarea').markdown({
            	hiddenButtons: ['cmdCode', 'cmdQuote', 'cmdBold', 'cmdItalic', 'cmdHeading', 'cmdPreview', 'cmdListO', 'cmdList', 'cmdUrl', 'cmdImage']
            });
        })
        $('a.use_this').click(function(event){
            event.preventDefault();
            var $id = $(this).attr('href'), $text = $('#'+$id).text();
            console.log($id);
            var $content = $('#'+$id).data('markdown').getContent();
            console.log($content);
            $content = $.trim($content);
            $('#description').text($content);
            $('#description').focus();
            $('#description').selectRange(0, $content.length);
            alert('Copied to the active editor');
            // console.log($text);
            
        });

        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });

    });
    
    // on leave remove edit warning sign.
    $(window).bind('beforeunload', function(e){
        exitPage();
        return 'Are you sure?';
    });

    function exitPage(){
        $.get('/api/ajax/exit/{{$item->id}}', function(data) {
            return data;
        });
    }

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 9) { // 10 minutes
            window.location.href = '/logout/';
        }
    }
</script>
@endsection
