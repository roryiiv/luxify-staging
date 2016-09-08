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
<style>
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
                        <h4 class="mt-0 mb-5">@lang('dashboard.product_add_product')</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="active">@lang('dashboard.product_add_item')</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" >
                        @include('inc.set-lang-dashboard-panel')
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
              <form id="form-tabs_approduct" class="form-horizontal" action="{{func::set_url('/dashboard/products')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <h3>@lang('dashboard.product_add_category')</h3>
                <fieldset>
                    <div id="category" role="tabpanel" class="tab-pane active">
                        <div class="form-group">
                            <label for="itemLocation" class="col-sm-3 control-label">@lang('dashboard.product_add_location')</label>
                            <div class="col-sm-9">
                                <select id="itemLocation" name="itemLocation" class="form-control" required>
                                  <?php $countries = func::build_countries(); ?>
                                  <option value="">--Please Select--</option>
                                  @foreach($countries as $country)
                                    <option value="{{ $country['val'] }}">{{ $country['label'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemAvailability" class="col-sm-3 control-label">@lang('dashboard.product_add_availability')</label>
                            <div class="col-sm-9">
                                <select id="itemAvailability" name="itemAvailability" class="form-control" required>
                                    <option value="">--Please Select--</option>
                                    <option value="worldwide">Worldwide</option>
                                    <option value="asItemLoction">Same Item Location</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemCategory" class="col-sm-3 control-label">@lang('dashboard.product_add_itemcategory')</label>
                            <div class="col-sm-9">
                                <select id="itemCategory" name="itemCategory" class="form-control" required>
                                    <option value="">--Please Select--</option>
                                     <?php
                                        $data = DB::table('category_2')->where('parent',0)->get();
                                        foreach ($data as $value) {
                                        echo "<option value='".$value->id."'>".$value->name."</option>";

                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemSubCategory" class="col-sm-3 control-label">@lang('dashboard.product_add_itemsub')</label>
                            <div class="col-sm-9">
                           
                                <select id="itemSubCategory" name="itemSubCategory" class="form-control" style="display: none" required>
                                    <option value="">--Please Select--</option>
                                </select>
                            </div>
                        </div>
                         
                    </div>
                </fieldset>

                <h3>@lang('dashboard.product_add_product2')</h3>
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">@lang('dashboard.product_add_title')</label>
                        <div class="col-sm-9">
                            <input id="title" name='title' type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condition" class="col-sm-3 control-label">@lang('dashboard.product_add_condition')</label>
                        <div class="col-sm-9">
                            <select id="condition" name="condition" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <option value="NEW">New</option>
                                <option value="PRE-OWNED">Pre-Owned</option>
                            </select>
                            <h6>@lang('dashboard.product_add_brand')
                                </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">@lang('dashboard.product_add_price')</label>
                        <div class="col-sm-9">
                            <input id="price" name='price' type="number" class="form-control" min=0>
                            <h6>@lang('dashboard.product_add_tick')
                                </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceOnRequest" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <input type="checkbox" id="priceOnRequest" name='priceOnRequest'> @lang('dashboard.product_add_request')</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-sm-3 control-label">@lang('dashboard.product_add_currency')</label>
                        <div class="col-sm-9">
                            <select id="currency" name="currency" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <?php $currencies = func::build_curr(); ?>
                                @foreach($currencies as $currency)
                                  <option value="{{ $currency['val'] }}">{{ $currency['label'] ." (".$currency['code'].")" }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">@lang('dashboard.product_add_description')</label>
                            <div class="col-sm-9">
                                <textarea id="description" name='description' class="form-control" id="editor-markdown" data-provide="markdown" data-hidden-buttons="cmdImage cmdCode cmdQuote" cols="3" rows="5" required></textarea>
                                <h6>@lang('dashboard.product_add_enter')</h6>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate" class="col-sm-3 control-label">@lang('dashboard.product_add_expiry')</label>
                            <div class="col-sm-9">
                                <input id="startDate" name='expiryDate' type="text" class="form-control" value='{{ date_format(date_create('now'), 'Y-m-d')}}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="optionalFields" class="col-sm-3 control-label title_details">@lang('dashboard.product_add_optional')</label>
                            
                                <div class="col-sm-9 col-sm-offset-3 details_box" id="optionFields">
        
                        </div>
                       <!--  <div class="form-group details_specs">
                            <label class="col-sm-3 control-label title_details">Details/specs (Optional) <i class="fa fa-chevron-down" aria-hidden="true"></i></label>
                            <div class="col-sm-9 col-sm-offset-3 details_box" id="optionFields">
                            </div>
                        </div> -->


                    </div>
                </fieldset>
                <h3>@lang('dashboard.product_add_images')</h3>
                <fieldset>
                    <div id="about" role="tabpanel" class="tab-pane">
                        <div class="widgets">
                            <div class="widget-heading">
                                <h5 class="m-0">@lang('dashboard.product_add_addimages')</h5>
                            </div>
                            <div class="widget-body">
                                <div id="item-images-dz" class="dropzone text-center"></div>
                            </div>
                            <div class="widget-heading pt-0">
                                <h6 class="m-0">@lang('dashboard.product_add_result')</h6>
                            </div>
                        </div>
                        <div id='images-preview-zone' class='dropzone-previews' style="display:none;">
                          <div class="images-table">
                             <div class="header">@lang('dashboard.product_add_image1')</div>
                             <div class="header">@lang('dashboard.product_add_imagename')</div>
                             <div class="header">@lang('dashboard.product_add_featured')</div>
                             <div class="header">@lang('dashboard.product_add_edit')</div>
                             <div class="header">@lang('dashboard.product_add_remove')</div>
                          </div>
                        </div>


                        <table style="width: 100%" class="table table-bordered" id="images-preview-table">
                            <thead>
                                <tr>
                                    <th class="text-center">@lang('dashboard.product_add_image2')</th>
                                    <th>@lang('dashboard.product_add_imageurl')</th>
                                    <th style="width: 20%">@lang('dashboard.product_add_featuredimage')</th>
                                    <th class="text-center">@lang('dashboard.product_add_remove')</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <h3>@lang('dashboard.product_add_additional')</h3>
                <fieldset>
                    <div id="data" role="tabpanel" class="tab-pane">
                        <div class="form-group">
                            <label for="buyNowURL" class="col-sm-3 control-label">@lang('dashboard.product_add_url')</label>
                            <div class="col-sm-9">
                                <input id="buyNowURL" name="buyNowURL" type="text" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aerialLookURL" class="col-sm-3 control-label">@lang('dashboard.product_add_videourl')</label>
                            <div class="col-sm-9">
                                <input id="aerialLookURL" name="aerialLookURL" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aerial3DLookURL" class="col-sm-3 control-label">@lang('dashboard.product_add_3d')</label>
                            <div class="col-sm-9">
                                <input id="aerial3DLookURL" name='aerial3DLookURL' type="text" class="form-control">
                            </div>
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
   			<div class="row"></div>
            </script>
@include('inc.product-message')
@endsection

@section('scripts')
<!-- jQuery-->
<script type="text/javascript" src="/db/js/jquery.min.js"></script>
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
<!-- Boostraps_markdown Plugin Script -->
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/markdown.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/plugins/bootstrap-markdown/js/to-markdown.js"></script>

<script>
    var images_array = [];

    function deleteImg(ele, i, filename) {
        $.ajax({
            url:'/removeImage',
            method: 'POST',
            data: {
                filename: filename,
                onS3: false,
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
            $('<tr><td class="text-center"><img width="100" class="img-thumbnail img-responsive" src="'+ images_array[i].path +'"></td><td><input type="text" disabled value="'+ images_array[i].filename + '" class="form-control" /><input name="images[]" type="hidden" value="'+ images_array[i].filename + '" /></td><td><div class="radio"><label><input type="radio" name="mainImage" data-dz-name data-rule-required="true" aria-required="true" value="' + i +'">Main Image</label></div></td><td class="text-center"><button type="button" class="btn btn-sm btn-outline btn-danger" onclick="deleteImg(this, '+i+', \''+ images_array[i].filename +'\')"><i class="ti-trash"></i></button></td></tr></tr>').appendTo(table);
        }
    }
    /*function genControls({id, type, name, label, optionValues}){
        switch (type) {
            case 'textfield':
            case 'text':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="optionfields['+ id +']" type="text" class="form-control"></div>';
            break;
            case 'number':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="optionfields['+ id +']" type="number" class="form-control"></div>';
            break;
            case 'textarea':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><textarea id="'+ label +'" name="optionfields['+ id +']" class="form-control"></textarea></div>';
            break;
            case 'year':
            case 'yearpick':
            return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="startDate" name="optionfields['+ id +']" type="date" class="form-control" /></div>';
            break;
            case 'dropdown':
            var html = '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><select name="optionfields['+ id +']" class="form-control">';
            for(var i = 0; i < optionValues.length; i++){
                html += '<option value="'+optionValues[i].value+'">'+ optionValues[i].text+'</option>';
            }
            html += '</select></div>';
            return html;
            break;
            default:
            return '';
        }
    }*/
    
    $(document).ready(function () {

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
        


        $('#editor-markdown').markdown();

        $('.actions ul li').click(function () {
            var x = $(this).find('a').attr('href');
            // console.log(x);
            if(x == '#finish'){
                $("#add-product-form").modal('show');
            } 
        });
        /*$('#itemCategory').on('change', function(){
            $.get({
                url: '/api/category/'+ $('#itemCategory').val() + '/fields',
                dataType: 'json',
                success: function(result) {
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
            // parallelUploads: 10,
            // maxThumbnailFilesize: 5,
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
            // success: function (file, response) {
            //     console.log(response);
            //     // $('#cover_img').val(response);
            // },
        });
    });

</script>
@endsection
