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
@endsection

@section('content')
    <?php $form_id = $role == 'seller' ? 'Dealer' : 'Customer'; ?>
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">Add a {{$form_id}}</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="forms-wizard.html#">Super Admin Access</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="display: none;">
                        <div class="btn-group mt-5">
                            <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                                <li><a href="forms-wizard.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
                                <li><a href="forms-wizard.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
                                <li><a href="forms-wizard.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
                                <li><a href="forms-wizard.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
                                <li><a href="forms-wizard.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">

                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Add a {{$form_id}}</h3>
                    </div>
                    <div class="widget-body">

                        <form id="form-tabs_add{{$form_id}}" name="profile" method="post" action="/panel/add/user/register" class="form-horizontal" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name='salt' id='salt' type='hidden' />
                            <input name='hashed' id='hashed' type='hidden' />
                            <h3>Personal Infomation</h3>
                            <fieldset>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="col-sm-3 col-md-4 control-label">Username</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="username" name="username" type="text" class="form-control" class="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtUserRole" class="col-sm-3 col-md-4 control-label">User Role</label>
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
                                            <label for="txtEmailAddress" class="col-sm-3 col-md-4 control-label">Email</label>
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
                                            <label for="txtPassword" class="col-sm-3 col-md-4 control-label">Password</label>
                                            <div class="col-sm-9 col-md-8">

                                                <input id="txtPassword" type="password" name="txtPassword" placeholder="Enter password" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control required">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="txtConfirmPassword" class="col-sm-3 col-md-4 control-label">Confirm password</label>
                                            <div class="col-sm-9 col-md-8">

                                                <input id="txtConfirmPassword" type="password" name="txtConfirmPassword" placeholder="Enter confirm password" data-rule-required="true" data-rule-equalto="#txtPassword" class="form-control required">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-3 col-md-4 control-label">First Name</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="first_name" name="first_name" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class="col-sm-3 col-md-4 control-label">Last Name</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtCityBillingTab" class="col-sm-3 col-md-4 control-label">Location</label>
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
                                            <label for="txtStateProvinceBillingTab" class="col-sm-3 col-md-4 control-label">Language</label>
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
                                            <label for="ddlCountryBillingTab" class="col-sm-3 col-md-2 control-label">Price Display In</label>
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
                                    <h3>Company Information</h3>
                                    <fieldset>
                                        <div class="widget">
                                            <div class="widget-heading">
                                                <h5 class="m-0">Company Page Cover Image</h5>
                                            </div>
                                            <div class="widget-body">
                                                <div id="api-cover-image" class="dropzone text-center"></div>
                                                <input type="hidden" name="cover_img" id="cover_img" value="" />
                                            </div>
                                            <div class="widget-heading pt-0">
                                                <h6 class="m-0">For best results, upload high quality 16:9 landscape-oriented PNG or JPG files, each with a maximum file size of 10MB.</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 pull-right mb-20">
                                                <div class="widget">
                                                    <div class="widget-heading">
                                                        <h5 class="m-0">Company Logo</h5>
                                                    </div>
                                                    <div class="widget-body">
                                                        <div id="api-profile-image" class="dropzone text-center"></div>
                                                        <input type="hidden" name="profile_img" id="profile_img" value="" />
                                                    </div>
                                                    <div class="widget-heading pt-0">
                                                        <h6 class="m-0">For best results, upload high quality 3:2 landscape-oriented PNG or JPG files, each with a maximum file size of 10MB.</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group m-0">
                                                    <label for="txtFirstNameShippingTab" class="control-label">Company Name</label>
                                                    <div class="pt-15">
                                                        <input id="companyName" name="companyName" type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group m-0">
                                                    <label for="txtCompanyRegNum" class="control-label">Company Registration No.:</label>
                                                    <div class="pt-15">
                                                        <input id="companyRegNumber" name="companyRegNumber" type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group m-0">
                                                    <label for="companyAddress" class="control-label">Company Address</label>
                                                    <div class="pt-15">
                                                        <textarea name="companyAddress" id="companyAddress" cols="3" rows="3" class="form-control" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-0">
                                                    <label for="companySummary" class="control-label">Company Summary</label>
                                                    <div class="pt-15">
                                                        <textarea name="companySummary" id="companySummary" cols="3" rows="3" class="form-control" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-0">
                                                    <label for="contactDetails" class="control-label">Company Details</label>
                                                    <div class="pt-15">
                                                        <textarea name="contactDetails" id="contactDetails" cols="3" rows="3" class="form-control" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                @endif
                            @endif
                            <h3>Social Connections</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ml-0 mr-0">
                                            <label for="txtFacebookLink" class="control-label pb-10"><i class="fa fa-facebook-official"></i> Facebook</label>
                                            <div class="">
                                                <input id="txtFacebookLink" name="txtFacebookLink" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ml-0 mr-0">
                                            <label for="txtInstagramLink" class="control-label pb-10"><i class="fa fa-instagram"></i> Instagram</label>
                                            <div class="">
                                                <input id="txtInstagramLink" name="txtInstagramLink" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ml-0 mr-0">
                                            <label for="txtPinterestLink" class="control-label pb-10"><i class="fa fa-pinterest-square"></i> Pinterest</label>
                                            <div class="">
                                                <input id="txtPinterestLink" name="txtPinterestLink" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ml-0 mr-0">
                                            <label for="txtTwitterLink" class="control-label pb-10"><i class="fa fa-twitter-square"></i> Twitter</label>
                                            <div class="">
                                                <input id="txtTwitterLink" name="txtTwitterLink" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group ml-0 mr-0">
                                            <label for="txtWebsiteLink" class="control-label pb-10"><i class="fa fa-globe"></i> Website</label>
                                            <div class="">
                                                <input id="txtWebsiteLink" name="txtWebsiteLink" type="text" class="form-control">
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
    <script type="text/javascript" src="/js/bundle.js"></script>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("form.form-horizontal").validate();
            var token = "{{ Session::getToken() }}";
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
                    formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
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
