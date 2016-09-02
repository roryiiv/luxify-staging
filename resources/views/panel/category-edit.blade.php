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
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">
    <!-- Sweet Alert-->
    <link rel="stylesheet" type="text/css" href="/db/css/sweet-alert.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- jQuery Steps-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.steps.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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
    #sortable1, #sortable2 {
        min-height: 280px;
        width: 100%;
        list-style-type: none;
        margin: 0;
        padding: 5px 0 0 0;
        float: left;
        margin-right: 10px;
    }
    .wrap-sortable{
        overflow: auto;
        width: 100%;
        padding:5px;
        border: 1px solid#ddd;
        max-height:300px;
    }
    #sortable1 li, #sortable2 li {
        list-style-type: none;
        margin: 0 5px 5px 5px;
        padding: 5px;
        border:1px solid#ddd;
        font-size: 1.2em;
        background: #fff;
    }
    .btn-action-copy{
        padding-top:130px;
    }
    #sortable1 li.active,#sortable2 li.active{
        background-color: #988866;
        color:#fff;
    }

    h2 {
    color: #737373 !important;
    font-weight: 300 !important;
    margin-top: -12px !important;
    margin-bottom: 10px !important;
    font-size: 30px !important;
  }
    </style>
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@lang('panel.category_editcategory')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="forms-wizard.html#">@lang('panel.category_editcategory_setting')</a></li>
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
                        <h3 class="widget-title">@lang('panel.category_editcategory2')</h3>
                    </div>
                    <div class="widget-body">
                        <form id="form-tabs" name="category" method="post" action="/panel/category" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$category->id}}"></input>
                            {!! csrf_field() !!}
                            
                            <h3>@lang('panel.category_editcategory_detail')</h3>
                            <fieldset>
                            <div class="col-md-6">
                                    <div class="row">
                                            <div class="form-group">
                                                <label for="txtFirstNameBillingTab" class="col-sm-3 col-md-4 control-label">@lang('panel.category_editcategory_name')</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <input id="txtNameCategory" name="txtNameCategory" type="text" class="form-control" value="{{$category->name}}" >
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="form-group">
                                                <label for="txtEmailAddress" class="col-sm-3 col-md-4 control-label">@lang('panel.category_editcategory_slug')</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <input id="txtSlugCategory" name="txtSlugCategory" type="text" class="form-control" value="{{$category->slug}}" > 
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="form-group">
                                                <label for="txtPassword" class="col-sm-3 col-md-4 control-label">@lang('panel.category_editcategory_label')</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <input id="txtLabelCategory" type="text" name="txtLabelCategory"  class="form-control" value="{{$category->label}}"> 
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="form-group">
                                                <label for="first_name" class="col-sm-3 col-md-4 control-label">@lang('panel.category_editcategory_desc')</label>
                                                <div class="col-sm-9 col-md-8">
                                                <textarea id="txtDescription" name="txtDescription" rows="4" cols="50" class="form-control" >{{$category->description}}</textarea>  
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="form-group">
                                                <label for="country" class="col-sm-3 col-md-4 control-label">@lang('panel.category_editcategory_parent')</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select id="parent" name="parent" class="form-control" required>
                                                    <option value="{{$category->parent}}">--Please Select--</option>
                                                    <?php
                                                    $data = DB::table('category_2')->whereNotIn('id',[$category->id])->get();
                                                    foreach ($data as $value) {
                                                     echo "<option value='".$value->id."'>".$value->name."</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 pull-right mb-20">
                                        <div class="widget">
                                            <div class="widget-heading">
                                                <h5 class="m-0">@lang('panel.category_editcategory_image')</h5>
                                            </div>
                                            <div class="widget-body">
                                                <div id="api-profile-image" class="dropzone text-center"></div>
                                                <input type="hidden" name="profile_img" id="profile_img" value="" />
                                            </div>
                                            <div class="widget-heading pt-0">
                                                <h6 class="m-0">@lang('panel.category_editcategory_best')</h6>
                                            </div>
                                            <div class="widget-body">
                                                <h6>@lang('panel.category_editcategory_currents')</h6>
                                                <div id="current-cover-image" class="text-center">
                                                    @if(!empty($category->mainImageURL))
                                                        <img src="{{func::img_url($category->mainImageURL, 425, '')}}" alt="{{$category->mainImageURL}}" />
                                                    @else
                                                    <p>@lang('panel.category_editcategory_imagesyet')</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            <div class="row p-10 text-right">
                                <button type="button"   class="btn btn-raised btn-success btn-lg update-btn">@lang('panel.category_editcategory_update')</button>
                            </div>                                 
                            </fieldset>
                           
                            <h3>@lang('panel.category_editcategory_opt')</h3>
                            <fieldset>
                                <h5>@lang('panel.category_editcategory_selectopt')</h5>
                                <div class="row">
                                    <div class="col-md-5">
                                        @lang('panel.category_editcategory_activeopt')
                                            <?php
                                            $exclude_id = json_decode($category->optional_field);
                                            if(is_array($exclude_id)){
                                                $exclude_id = $exclude_id;
                                                $optionalvalues = implode(",", $exclude_id);
                                            }else{
                                                $exclude_id =array();
                                                $optionalvalues='';
                                            }
                                            ?>
                                        <div class="wrap-sortable">
                                        <input type="hidden" class="optioalfield" name="optionalfield" value="{{$optionalvalues}}">
                                            <ul id="sortable1" class="connectedSortable">
                                            <?php
                                            foreach ($exclude_id as $value) {
                                                $data = DB::table('category_meta')->where('id',$value)->first();
                                                echo '<li data-id="'.$data->id.'">'.$data->title.'</li>';
                                            }
                                            ?>
                                            </ul>
                                        </div>
 

                                    </div>
                                    <div class="col-md-1">
                                        <div class="btn-action-copy">
                                            <span class="btn btn-default btn-outline btn-sm copy-right btn-block">
                                                <i class="ti-angle-right"></i>
                                            </span><br>
                                            <span class="btn btn-default btn-outline btn-sm copy-left btn-block">
                                                <i class="ti-angle-left"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        @lang('panel.category_editcategory_available')
                                        <div class="wrap-sortable">
                                            <ul id="sortable2" class="connectedSortable">
                                            <?php
                                            $exclude_id = json_decode($category->optional_field);
                                            if(is_array($exclude_id)){
                                                $exclude_id = $exclude_id;
                                            }else{
                                                $exclude_id =array();
                                            }
                                            $optionalfields = DB::table('category_meta')
                                                ->whereNotIn('id',$exclude_id)
                                                ->get();
                                            foreach ($optionalfields as $value) {
                                                $label = (empty($value->title) || $value->title=='' )?$value->label:$value->title;
                                                echo '<li data-id="'.$value->id.'">'.$label.'</li>';
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-10 text-right">
                                    <button type="button"   class="btn btn-raised btn-success btn-lg update-btn">@lang('panel.category_editcategory_updates')</button>
                                </div>
                            </fieldset>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
@include('inc.update-message')
@endsection

@section('scripts')
    <!-- jQuery-->
    <script type="text/javascript" src="/db/js/jquery.min.js"></script>
    <script type="text/javascript" src="/db/js/jquery-ui.js"></script>
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
    <!-- DropzoneJS-->
    <script type="text/javascript" src="/db/js/dropzone.min.js"></script>
    <!-- Sweet Alert-->
    <script type="text/javascript" src="/db/js/sweetalert.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/forms-wizard.js"></script>
    <script type="text/javascript" src="/db/js/dropzone-js.js"></script>
    <script type="text/javascript" src="/db/js/sweet-alert.js"></script>
    <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/js/bundle.js"></script>
    <!-- Booostraps_tagit input plugin -->
    <script type="text/javascript" src="/plugins/typeahead.js/dist/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function (){
        redrawactive();
        $(".update-btn").on("click", function (){
            $("form[name='category']").submit();
        });
        var updateIndex = function(e, ui) {
            redrawactive();
        }
        $( "#sortable1, #sortable2" ).sortable({
            stop: updateIndex,
        }).disableSelection();
        function redrawactive(){
            console.log('redrawactive');
            clone = $('#sortable1').find('li').clone();
            $('#sortable1').find('li').remove();
            $('#sortable1').append(clone);
            clone2 = $('#sortable2').find('li').clone();
            $('#sortable2').find('li').remove();
            $('#sortable2').append(clone2);
            $('#sortable1,#sortable2').find('li').click(function(){
                $(this).toggleClass('active');
            });
            data_id =[];
            $('#sortable1 li').each(function(){
                id = $(this).attr('data-id');
                data_id.push(id);
            });
            $('.optioalfield').val(data_id.toString());
        }
        $('.copy-right').click(function(){
            count = $('#sortable1').find('li.active').length;
            if(count>0){
                copy = $('#sortable1').find('li.active').clone().end();
                $('#sortable1').find('li.active').remove();
                $('#sortable2').prepend(copy);
                redrawactive();
            }else{
                redrawactive();
            }
        });
        $('.copy-left').click(function(){
            count = $('#sortable2').find('li.active').length;
            if(count>0){
                copy = $('#sortable2').find('li.active').clone().end();
                $('#sortable2').find('li.active').remove();
                $('#sortable1').prepend(copy);
                redrawactive();
            }else{
                redrawactive();
            }
        });

        var token = "{{ Session::getToken() }}";
        Dropzone.options.myAwesomeDropzone = !1, Dropzone.autoDiscover = !1,
        $("#api-profile-image").dropzone({
                url: "/upload",
                paramName: "image",
                maxFiles: 1,
                uploadMultiple: false,
                addRemoveLinks: true,
                dictDefaultMessage: "<i class='icon-dz fa fa-file-o'></i>Drop files here to upload",
                sending: function(file, xhr, formData) {
                    $("#image-form").modal('show');
                      var elem = document.getElementById("proccess");
                      var width = 10;
                      var id = setInterval(frame, 10);
                      function frame() {
                        if (width >= 100) {
                          clearInterval(id);
                        } else {
                          width++;
                          elem.style.width = width + '%';
                          document.getElementById("label").innerHTML = width * 1  + '%';
                        }
                      }
                                        /*swal({
                        title: "Uploading Images",
                        text: "Currently Uploading Images.",
                        //   timer: 2000,
                        showConfirmButton: false
                    });*/

                    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                    formData.append("_token", $('[name=_token').val()); // Laravel expect the token post value to be named _token by default
                    $('.dz-success-mark').hide();
                    $('.dz-error-mark').hide();
                },
                success: function (file, response) {
                    console.log(response);
                    swal.close();
                    $('#profile_img').val(response);
                },
                error: function (file, response) {
                    swal.close();
                    file.previewElement.classList.add("dz-error");
                },
                init: function() {
                    this.on("addedfile", function(e) {
                        this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e
                    })
                }
            });
    });
    </script>
        
@endsection
