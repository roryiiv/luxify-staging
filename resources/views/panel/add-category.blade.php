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
    </style>
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">Add a Category</h4>
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
                        <h3 class="widget-title">Add a Category</h3>
                    </div>
                    <div class="widget-body">
                        <form id="form-tabs" name="category" method="post" action="/panel/categories" class="form-horizontal" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            
                            <h3>Category Details</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtFirstNameBillingTab" class="col-sm-3 col-md-4 control-label">Name</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="txtNameCategory" name="txtNameCategory" type="text" class="form-control" value="" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtEmailAddress" class="col-sm-3 col-md-4 control-label">Slug</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="txtSlugCategory" name="txtSlugCategory" type="text" class="form-control" value="" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtPassword" class="col-sm-3 col-md-4 control-label">Label</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="txtLabelCategory" type="text" name="txtLabelCategory"  class="form-control">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-3 col-md-4 control-label">Description</label>
                                            <div class="col-sm-9 col-md-8">
                                            <textarea id="txtDescription" name="txtDescription" rows="4" cols="50" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="col-sm-3 col-md-4 control-label">Parent</label>
                                            <div class="col-sm-9 col-md-8">
                                                <select id="parent" name="parent" class="form-control" required>
                                                <option value="">--Please Select--</option>
                                                <?php
                                                $data = DB::table('category_2')->get();
                                                foreach ($data as $value) {
                                                 echo "<option value='".$value->id."'>".$value->name."</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            <div class="row p-10 text-right">
                                <button id="save-btn" type="button" class="btn btn-raised btn-success btn-lg">Save</button>
                            </div>                                 
                            </fieldset>
                           
                            <h3>Optional Fields</h3>
                            <fieldset>
                                <h5>Please Select Optional Fields</h5>
                                <div class="row">
                                    <div class="col-md-5">
                                        active optional fields:
                                        <div class="wrap-sortable">
                                        <input type="hidden" class="optioalfield" name="optionalfield" value="">
                                            <ul id="sortable1" class="connectedSortable">

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
                                        optional fields available:
                                        <div class="wrap-sortable">
                                            <ul id="sortable2" class="connectedSortable">
                                            <?php 
                                            $optionalfields = DB::table('category_meta')->get();
                                            foreach ($optionalfields as $value) {
                                                $label = (empty($value->title) || $value->title=='' )?$value->label:$value->title;
                                                echo '<li data-id="'.$value->id.'">'.$label.'</li>';
                                            }
                                            ?>
                                            </ul>
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
    <!-- jquery draganddropsortable -->
    <script type="text/javascript">

    $(document).ready(function (){
        redrawactive();
        $("#save-btn").on("click", function (){
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
    });

</script>
        
@endsection
