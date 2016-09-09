@extends('layouts.panel')

@section('head')
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="/db/css/pace-theme-flash.css">
    <script type="text/javascript" src="/db/js/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="/db/css/themify-icons.css">
    <!-- Sweet Alert-->
    <link rel="stylesheet" type="text/css" href="/db/css/sweet-alert.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="/db/css/animate-animo.min.css">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- jQuery Steps-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="/db/css/custom.css">

    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
    <!-- Boostraps_tagit Plugin Style -->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput-typeahead.css">
    <style type="text/css">
    .hideslug{
        display: none;
    }
    .showslug{
        display: block;
    }
    .bootstrap-tagsinput{
        width: 100%;
    }
    </style>
@endsection

@section('content')
    <?php $form_id = $role == 'seller' ? 'Dealer' : 'Customer'; ?>
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@lang('panel.users_add') {{$form_id}}</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="forms-wizard.html#">@lang('panel.users_add_admin')</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6" >
                        @include('inc.set-lang-dashboard-panel')
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">

                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">@lang('panel.users_add1') {{$form_id}}</h3>
                    </div>
                    <div class="widget-body">

                      <form id="form-tabs_add{{$form_id}}" name="profile" method="post" action="{{func::set_url('/panel/add/user/register')}}" class="form-horizontal" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                          <input name='salt' id='salt' type='hidden' />
                          <input name='hashed' id='hashed' type='hidden' />
                          <h3>@lang('panel.users_add_personal')</h3>
                          <fieldset>

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="username" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_username')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <input id="username" name="username" type="text" class="form-control" class="required">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtUserRole" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_role')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <input id="txtUserRole" name="txtUserRole" type="text" class="form-control" value="{{$role}}" disabled>
                                              <input name='role' id='role' type='hidden' value="{{$role}}" />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtEmailAddress" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_email')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <input id="txtEmailAddress" name="txtEmailAddress" type="text" class="form-control" class="required">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">

                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">

                                      <div class="form-group">
                                          <label for="txtPassword" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_password')</label>
                                          <div class="col-sm-9 col-md-8">

                                              <input id="txtPassword" type="password" name="txtPassword" placeholder="Enter password" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control required">
                                          </div>
                                      </div>


                                  </div>
                                  <div class="col-md-6">

                                      <div class="form-group">
                                          <label for="txtConfirmPassword" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_confirm')</label>
                                          <div class="col-sm-9 col-md-8">

                                              <input id="txtConfirmPassword" type="password" name="txtConfirmPassword" placeholder="Enter confirm password" data-rule-required="true" data-rule-equalto="#txtPassword" class="form-control required">
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="first_name" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_first')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <input id="first_name" name="first_name" type="text" placeholder="" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="last_name" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_last')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <input id="last_name" name="last_name" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtCityBillingTab" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_location')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <?php $countries = func::build_countries(); ?>
                                              <select id="country" name="country" class="form-control">
                                                  <option value="">--Please Select--</option>
                                                  @foreach($countries as $country)
                                                      <option value="{{ $country['val'] }}">{{ $country['label'] }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtStateProvinceBillingTab" class="col-sm-3 col-md-4 control-label">@lang('panel.users_add_language')</label>
                                          <div class="col-sm-9 col-md-8">
                                              <?php $langs = func::build_lang(); ?>
                                              <select id="language" name="language" class="form-control">
                                                  <option value="">--Please Select--</option>
                                                  @foreach($langs as $lang)
                                                      <option value="{{$lang['val']}}">{{$lang['label']}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="form-group">
                                          <label for="ddlCountryBillingTab" class="col-sm-3 col-md-2 control-label">@lang('panel.users_add_price')</label>
                                          <div class="col-sm-9 col-md-10">
                                              <?php $currs = func::build_curr(); ?>
                                              <select id="currency" name="currency" class="form-control">
                                                  <option value="">--Please Select--</option>
                                                  @foreach($currs as $curr)
                                                      <option value="{{$curr['val']}}">{{$curr['label']}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </fieldset>
                          @if($role)
                              @if($role == 'seller')
                                  <h3>@lang('panel.users_add_companyinfo')</h3>
                                  <fieldset>
                                      <div class="widget">
                                          <div class="widget-heading">
                                              <h5 class="m-0">@lang('panel.users_add_companycover')</h5>
                                          </div>
                                          <div class="widget-body">
                                              <div id="api-cover-image" class="dropzone text-center"></div>
                                              <input type="hidden" name="cover_img" id="cover_img" value="" />
                                          </div>
                                          <div class="widget-heading pt-0">
                                              <h6 class="m-0">@lang('panel.users_add_best1')</h6>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-xs-12 col-md-6 pull-right mb-20">
                                              <div class="widget">
                                                  <div class="widget-heading">
                                                      <h5 class="m-0">@lang('panel.users_add_companylogo')</h5>
                                                  </div>
                                                  <div class="widget-body">
                                                      <div id="api-profile-image" class="dropzone text-center"></div>
                                                      <input type="hidden" name="profile_img" id="profile_img" value="" />
                                                  </div>
                                                  <div class="widget-heading pt-0">
                                                      <h6 class="m-0">@lang('panel.users_add_best2')</h6>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-md-6">

                                              <div class="form-group m-0">
                                                  <label for="txtFirstNameShippingTab" class="control-label">@lang('panel.users_add_companyname')</label>
                                                  <div class="pt-15">
                                                      <input id="companyName" name="companyName" type="text" class="form-control" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group m-0">
                                                  <label for="phoneNumber" data-role='taginput' class="control-label">@lang('panel.users_edit_contact')</label>
                                                  <div class="pt-15">
                                                      <input id="phoneNumber" type="text" name="phoneNumber" class="form-control" value="">
                                                  </div>
                                             </div>
                                              <div class="form-group m-0">
                                                  <label for="website" class="control-label">@lang('panel.users_edit_website')</label>
                                                  <div class="pt-15">
                                                      <input id="website" name="website" type="text" class="form-control" value="">
                                                  </div>
                                              </div>
                                              <div class="form-group m-0">
                                                  <label for="txtCompanyRegNum" class="control-label">@lang('panel.users_add_registration')</label>
                                                  <div class="pt-15">
                                                      <input id="companyRegNumber" name="companyRegNumber" type="text" class="form-control" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group m-0">
                                                  <label for="companyAddress" class="control-label">@lang('panel.users_add_address')</label>
                                                  <div class="pt-15">
                                                      <textarea name="companyAddress" id="companyAddress" cols="3" rows="3" class="form-control" placeholder=""></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group m-0">
                                                  <label for="companySummary" class="control-label">@lang('panel.users_add_summary')</label>
                                                  <div class="pt-15">
                                                      <textarea name="companySummary" id="companySummary" cols="3" rows="3" class="form-control" placeholder=""></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
                              @endif
                          @endif
                          <h3>@lang('panel.users_add_social')</h3>
                          <fieldset>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group ml-0 mr-0">
                                          <label for="txtFacebookLink" class="control-label pb-10"><i class="fa fa-facebook-official"></i> @lang('panel.users_add_facebook')</label>
                                          <div class="">
                                              <input id="txtFacebookLink" name="txtFacebookLink" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group ml-0 mr-0">
                                          <label for="txtInstagramLink" class="control-label pb-10"><i class="fa fa-instagram"></i> @lang('panel.users_add_instagram')</label>
                                          <div class="">
                                              <input id="txtInstagramLink" name="txtInstagramLink" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group ml-0 mr-0">
                                          <label for="txtPinterestLink" class="control-label pb-10"><i class="fa fa-pinterest-square"></i> @lang('panel.users_add_pin')</label>
                                          <div class="">
                                              <input id="txtPinterestLink" name="txtPinterestLink" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group ml-0 mr-0">
                                          <label for="txtTwitterLink" class="control-label pb-10"><i class="fa fa-twitter-square"></i>@lang('panel.users_add_twitter')</label>
                                          <div class="">
                                              <input id="txtTwitterLink" name="txtTwitterLink" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </fieldset>
                      </form>
                  </div>
              </div>
          </div>
      </div>
@endsection

@section('scripts')
  <!-- jQuery-->

  <script type="text/javascript" src="/db/js/jquery.min.js"></script>
  <!-- Bootstrap JavaScript-->
  <script type="text/javascript" src="/js/bundle.min.js"></script>
  <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/db/js/main.js"></script>

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
  <!-- DropzoneJS-->
  <script type="text/javascript" src="/db/js/dropzone.min.js"></script>
  <!-- Sweet Alert-->
  <script type="text/javascript" src="/db/js/sweet-alert.min.js"></script>
  <!-- Custom JS-->
  <script type="text/javascript" src="/db/js/app.js"></script>
  <script type="text/javascript" src="/db/js/demo.js"></script>
  <script type="text/javascript" src="/db/js/forms-wizard.js"></script>
  <script type="text/javascript" src="/db/js/dropzone-js.js"></script>
  <script type="text/javascript" src="/db/js/sweet-alert.js"></script>
  <script type="text/javascript" src="/plugins/typeahead.js/dist/typeahead.bundle.min.js"></script>
  <script type="text/javascript" src="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          $('#phoneNumber').tagsinput({
              allowDuplicates: false 
          });
          $("form.form-horizontal").validate();
          var token = "{{ Session::getToken() }}";
           $("#yes-button").on("click", function () {    
               if($("form.form-horizontal").valid()){    
                  if ($('#txtPassword').val() !== '') {
                      var salt = encrypt.makeSalt();
                      var hashed = encrypt.password($('#txtPassword').val(), salt);
                      $('input#salt').val(salt);
                      $('input#hashed').val(hashed);
                  }
                  if ($('#phoneNumber').val() !== '') {
                      var phones = $('#phoneNumber').tagsinput('items');
                      $(phones).each(function(idx, ele) {
                      $('<input name="phoneNumber[]" type="hidden" value="'+ele+'"/>').appendTo($('#phoneNumber').parent());
                      });
                  }
                  $(window).unbind('beforeunload');
                  $("form[name='profile']").submit();
                }else{
                    $("form-tabs_add{{$form_id}}").modal('hide');
                }
            });
            Dropzone.options.myAwesomeDropzone = !1, Dropzone.autoDiscover = !1,
            $("#api-cover-image").dropzone({
                url: "/panel/upload",
                paramName: "image",
                params: {
                    _token: token
                },
                maxFilesize: 2,
                maxThumbnailFilesize: .5,
                maxFiles: 1,
                uploadMultiple: false,
                addRemoveLinks: true,
                dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
                sending: function(file, xhr, formData) {
                    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                    formData.append("_token", $('[name=_token]').val()); // Laravel expect the token post value to be named _token by default
                    $('.dz-success-mark').hide();
                    $('.dz-error-mark').hide();
                },
                success: function (file, response) {
                    console.log(response);
                    $('#cover_img').val(response);
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                },
                // init: function() {
                //     this.on("addedfile", function(e) {
                //         this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e
                //     })
                // }
            });
            $("#api-profile-image").dropzone({
                url: "/panel/upload",
                paramName: "image",
                params: {
                    _token: token
                },
                maxFilesize: 2,
                maxThumbnailFilesize: .5,
                maxFiles: 1,
                uploadMultiple: false,
                addRemoveLinks: true,
                dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
                sending: function(file, xhr, formData) {
                    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                    // formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
                    $('.dz-success-mark').hide();
                    $('.dz-error-mark').hide();
                },
                success: function (file, response) {
                    console.log(response);
                    $('#profile_img').val(response);
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                },
                // init: function() {
                //     this.on("addedfile", function(e) {
                //         this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e
                //     })
                // }
            });
        })
    </script>
@endsection