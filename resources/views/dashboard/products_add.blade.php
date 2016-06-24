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
                        <h4 class="mt-0 mb-5">Add  Product</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="active">List an item</li>
                        </ol>
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
              <form id="form-tabs_approduct" class="form-horizontal">
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
                                    <option value="{{ $country['val'] }}">{{ $country['label'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemAvailability" class="col-sm-3 control-label">Item Availability</label>
                            <div class="col-sm-9">
                                <select id="itemAvailability" name="itemAvailability" class="form-control" required>
                                    <option value="">--Please Select--</option>
                                    <option value="worldwide">Worldwide</option>
                                    <option value="asItemLoction">Same Item Location</option>
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
                                    <option value="{{ $category['id'] }}">{{ $category['hierarchy'] }}</option>
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
                            <input id="title" name='title' type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                            <input id="price" name='price' type="number" class="form-control" min=0 >
                            <h6>For price on request tick the box and select a preferred currency.
                                </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceOnRquest" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <input type="checkbox" id="priceOnRquest" name='priceOnRquest'> Price on request</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-sm-3 control-label">Currency</label>
                        <div class="col-sm-9">
                            <select id="currency" name="currency" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <?php $currencies = func::build_curr(); ?>
                                @foreach($currencies as $currency)
                                  <option value="{{ $currency['val'] }}">{{ $currency['label'] ." (".$currency['code'].")" }}</option>
                                @endforeach
                              
                            </select>
                            <h6>Is your item brand new or has it been previously owned?
                                </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Step 3: Description</label>
                            <div class="col-sm-9">
                                <textarea id="description" name='description' class="form-control" cols="3" rows="5"></textarea>
                                <h6>You can enter up to 10,000 characters, try to write as muchof this as you can, as longer description get more views and replies!</h6>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate" class="col-sm-3 control-label">Expiry Date (Optional)</label>
                            <div class="col-sm-9">
                                <input id="startDate" name='expiryDate' type="text" class="form-control">
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
                        <div class="widget">
                            <div class="widget-heading">
                                <h5 class="m-0">Add Item Images</h5>
                            </div>
                            <div class="widget-body">
                                <div id="cover-image" class="dropzone text-center"></div>
                            </div>
                            <div class="widget-heading pt-0">
                                <h6 class="m-0">For best results, upload high quality 16:9 landscape-oriented PNG or JPG files, each with a maximum file size of 10MB.</h6>
                            </div>
                        </div>

                        <table style="width: 100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>Image Url</th>
                                    <th style="width: 20%">Featured Image</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><img src="../images/products/01.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/01.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger sweet-8"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="../images/products/02.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/02.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger sweet-8"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="../images/products/03.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/03.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="../images/products/04.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/04.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="../images/products/05.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/05.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="../images/products/06.jpg" width="100" alt="" class="img-thumbnail img-responsive"></td>
                                    <td>
                                        <input type="text" value="http://mydomain.com/images/product/06.jpg" disabled name="txtImageUrl" class="form-control">
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="rdbGender" value="male" data-rule-required="true" aria-required="true"> Set as featured
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="file" data-input="false" data-buttonText="" data-buttonName="btn-primary btn-outline btn-sm" class="filestyle">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </fieldset>
                <h3>Step 4: Additional Info.</h3>
                <fieldset>
                    <div id="data" role="tabpanel" class="tab-pane">
                        <div class="form-group">
                            <label for="txtBuyNowURL" class="col-sm-3 control-label">Buy Now URL</label>
                            <div class="col-sm-9">
                                <input id="txtBuyNowURL" type="text" value="http://www.google.com" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtAerialLookURL" class="col-sm-3 control-label">Aerial Look URL (Optional)</label>
                            <div class="col-sm-9">
                                <input id="txtAerialLookURL" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txt3D AerialLookURL" class="col-sm-3 control-label">3D Aerial Look URL (Optional)</label>
                            <div class="col-sm-9">
                                <input id="txt3D AerialLookURL" type="text" class="form-control">
                            </div>
                        </div>


                    </div>
                </fieldset>
                        </form>
                
            </div>
            
        </div>
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
<script type="text/javascript" src="/db/js/mustache.min.js"></script>
<script>
  $(document).ready(function () {
    $('.actions ul li').click(function () {
      $(".sweet-alert p").html("Your item has been submitted for approval");
    });
    
    function genControls({type, name, label, optionValues}){
      switch (type) {
        case 'textfield':
        case 'text':
          return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="'+ label +'" type="text" class="form-control"></div>';
        break;
        case 'number':
           return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="'+ label +'" name="'+ label +'" type="number" class="form-control"></div>';
       break;
      case 'textarea':
           return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><textarea id="'+ label +'" name="'+ label +'" type="number" class="form-control" /></div>';
       break;
        case 'year':
        case 'yearpick':
          return '<div class="col-sm-4"><label for="'+ label +'" class="control-label">'+ label +'</label><input id="startDate" name="'+ label +'" type="date" class="form-control" /></div>';
          break;
        default:
          return '';
      }
    }
    
    $('#itemCategory').on('change', function(){
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
    });
    
    $('#priceOnRquest').on('click', function(){
      console.log($('#priceOnRquest').prop('checked'));
      $('#price').prop('disabled', $('#priceOnRquest').prop('checked') );
    })
  });
</script>
@endsection
