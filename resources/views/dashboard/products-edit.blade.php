@inject('s_meta', 'App\Meta')
@extends('layouts.dashboard')
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
    font-weight: 500 !important;
    margin-top: 20px !important;
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
                        <h4 class="mt-0 mb-5">Edit Listing</h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group mt-5">
                            <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <!--
                            <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                                <li><a href="edit-product.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
                                <li><a href="edit-product.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
                                <li><a href="edit-product.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
                                <li><a href="edit-product.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
                                <li><a href="edit-product.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
                            </ul>
-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
              <form id="form-tabs_edit_product" class="form-horizontal" action="/dashboard/products/{{$item->id}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <h3>Step 1: Category</h3>
                <fieldset>
                    <div id="category" role="tabpanel" class="tab-pane active">
                        <div class="form-group">
                            <label for="itemLocation" class="col-sm-3 control-label">Item Location</label>
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
                            <label for="itemAvailability" class="col-sm-3 control-label">Item Availability</label>
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
                            <label for="itemCategory" class="col-sm-3 control-label">Item Category</label>
                            <div class="col-sm-9">
                                <select id="itemCategory" name="itemCategory" class="form-control" required>

                                  <option value="">--Please Select--</option>
                                  <?php $categories = func::build_categories('leaf'); ?>

                                  @foreach($categories as $category)
                                    <option {{func::selected($item->categoryId, $category['id'])}}  value="{{ $category['id'] }}">{{ $category['hierarchy'] }}</option>
                                  @endforeach

                                </select>
                            </div>
                        </div>

                    </div>
                </fieldset>

                <h3>Step 2: Product details</h3>
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Listing Title</label>
                        <div class="col-sm-9">
                            <input id="title" name='title' type="text" class="form-control" value="{{$item->title}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select id="status" name="status" class="form-control">
                                <option value="">--Please Select--</option>
                                <option {{func::selected($item->status, 'PENDING')}} value=''>Pending</option>
                                <option {{func::selected($item->status, 'SOLD')}}  value="SOLD">Sold</option>
                                <option {{func::selected($item->status, 'EXPIRED')}}  value="EXPIRED">Expired</option>


                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condition" class="col-sm-3 control-label">Condition</label>
                        <div class="col-sm-9">
                            <select id="condition" name="condition" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <option {{func::selected($item->condition, 'NEW')}}  value="NEW">New</option>
                                <option {{func::selected($item->condition, 'PRE-OWNED')}} value="PRE-OWNED">Pre-Owned</option>
                            </select>
                            <h6>Is your item brand new or has it been previously owned?
                                </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                            <input id="price" name='price' type="number" class="form-control" min=0 value="{{$item->price}}" {{ $item->price === NULL ? 'disabled': '' }} />
                            <h6>For price on request tick the box and select a preferred currency.
                            </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceOnRequest" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <input {{ $item->price === NULL ? 'checked': '' }} type="checkbox" id="priceOnRequest" name='priceOnRequest'> Price on request</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-sm-3 control-label">Currency</label>
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
                            <label for="description" class="col-sm-3 control-label">Step 3: Description</label>
                            <div class="col-sm-9">
                                <textarea id="description editor-markdown" name='description' data-hidden-buttons="cmdCode cmdQuote" class="form-control" cols="3" rows="10" data-provide="markdown">{{$item->description}}</textarea>
                                <h6>You can enter up to 10,000 characters, try to write as muchof this as you can, as longer description get more views and replies!</h6>
                                <div class="" style="display: none;">
                                <h5>history</h5>
                                    <?php foreach ($history->description as $key => $value) { ?>
                                        <div class="">{{$value}}</div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate" class="col-sm-3 control-label">Expiry Date (Optional)</label>
                            <div class="col-sm-9">
                                <?php $expired_at = date_create($item->expired_at); ?>
                                <input id="startDate" name='expiryDate' type="text" class="form-control" value="{{ date_format($expired_at, "Y-m-d") }}">
                            </div>
                        </div>
                        <div class="form-group details_specs">
                            <label class="col-sm-3 control-label title_details">Details/specs (Optional) <i class="fa fa-chevron-down" aria-hidden="true"></i></label>
                            <div class="col-sm-9 col-sm-offset-3 details_box" id="optionFields">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <h3>Step 3: Images</h3>
                <fieldset>
                    <div id="about" role="tabpanel" class="tab-pane">
                        <div class="widgets">
                            <div class="widget-heading">
                                <h5 class="m-0">Add Item Images</h5>
                            </div>
                            <div class="widget-body">
                                <div id="item-images-dz" class="dropzone text-center"></div>
                            </div>
                            <div class="widget-heading pt-0">
                                <h6 class="m-0">For best results, upload high quality 16:9 landscape-oriented PNG or JPG files, each with a maximum file size of 10MB.</h6>
                            </div>
                        </div>
                        <div id='images-preview-zone' class='dropzone-previews' style="display:none;">
                          <div class="images-table">
                             <div class="header">Image</div>
                             <div class="header">Image Name</div>
                             <div class="header">Featured Image</div>
                             <div class="header">Edit</div>
                             <div class="header">Remove</div>
                          </div>
                        </div>


                        <table style="width: 100%" class="table table-bordered sortir" id="images-preview-table">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Image</th>
                                    <th>Image Url</th>
                                    <th style="width: 20%">Featured Image</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <h3>Step 4: Additional Info.</h3>
                <fieldset>
                    <div id="data" role="tabpanel" class="tab-pane">
                        <div class="form-group">
                            <label for="buyNowURL" class="col-sm-3 control-label">Buy Now URL</label>
                            <div class="col-sm-9">
                                <input id="buyNowURL" name="buyNowURL" type="text" value="{{$item->buyNowUrl}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aerialLookURL" class="col-sm-3 control-label">Promotion Video URL (Optional)</label>
                            <div class="col-sm-9">
                                <input id="aerialLookURL" name="aerialLookURL" type="text" class="form-control" value="{{$item->aerialLookUrl}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aerial3DLookURL" class="col-sm-3 control-label">Matterport 3D Tour URL (Optional)</label>
                            <div class="col-sm-9">
                                <input id="aerial3DLookURL" name='aerial3DLookURL' type="text" class="form-control" value={{$item->aerialLook3DUrl}}>
                            </div>
                        </div>
                        <hr/>
                    <section>
                    <div>
                    </section>
                    </div>
                </fieldset>
                <h3>Step 5: SEO Section</h3>
                <fieldset>
                <div class="form-group">
                            <label for="urlslug" class="col-sm-3 control-label">Url Slug</label>
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
                                     &nbsp;<span class="btn btn-sm btn-outline btn-danger edit_slug">Edit URL</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input id="meta_title" name='meta_title' type="text" class="form-control" placeholder="{{$item->meta_title == '' ? $item->title : $item->meta_title}}">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="meta_alttext" class="col-sm-3 control-label">Alt Text</label>
                            <div class="col-sm-9">
                                <input id="alttext" name='meta_alttext' type="text" class="form-control" placeholder="{{$item->meta_alt_text}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea id="meta_description" name='meta_description' class="form-control " maxlength="500" placeholder="{{$item->meta_description == '' ? $item->description : $item->meta_description}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword" class="col-sm-3 control-label">Meta Keyword</label>
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
                             <label for="meta_author" class="col-sm-3 control-label">Meta Author</label>
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

    $images = array();
    $images[] = array('path'=>func::img_url($item->mainImageUrl, 100, ''), 'filename'=>$item->mainImageUrl, 'onS3' => true, 'alt_text' =>$s_meta::get_slug_img($item->mainImageUrl));

    for($i = 0; $i < count($otherImages); $i++) {
        $images[] = array('path'=>func::img_url($otherImages[$i], 100, ''), 'filename'=>$otherImages[$i], 'onS3' => true, 'alt_text' =>$s_meta::get_slug_img($item->mainImageUrl));
    }
    ?>
    var images_array = <?php echo json_encode($images, JSON_PRETTY_PRINT); ?>;
    var optionalFields = <?php echo json_encode($item->optionFields, JSON_PRETTY_PRINT) ?>;


    function deleteImg(ele, i, filename, onS3 = false) {
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

    function genImagesPreview() {
        var table = $("#images-preview-table tbody");
        table.html('');
        for (var i = 0; i < images_array.length; i++) {
            $('<tr class="draganddropcustom"><td class="dot-hidden" style="border-right:medium none;"></td><td class="text-center" style="border-left: medium none;"><img width="100" class="img-thumbnail img-responsive" src="'+ images_array[i].path +'"></td><td><input type="text" disabled value="'+ images_array[i].filename + '" class="form-control" /> <br/><input type="text" id="'+images_array[i].filename+'" value="'+ images_array[i].alt_text + '" placeholder="alt text . . ." name="alt_text[]" class="form-control" /><input name="images[]" type="hidden" value="'+ images_array[i].filename + '" /></td><td><div class="radio"><label><input type="radio" '+(i===0? 'checked':'') +' name="mainImage" data-dz-name data-rule-required="true" aria-required="true" value="' + i +'" class="reindex">Main Image</label></div></td><td class="text-center"><button type="button" class="btn btn-sm btn-outline btn-danger" onclick="deleteImg(this, '+i+', \''+ images_array[i].filename +'\', '+ images_array[i].onS3+')"><i class="ti-trash"></i></button></td></tr>').appendTo(table);
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
        $('#editor-markdown').markdown();
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
            $(".sweet-alert p").html("Your item has been submitted for approval");
        });
        $('#itemCategory').on('change', function(){
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
        });

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
                    console.log(result);
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
</script>
@endsection
