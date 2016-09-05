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

    <style type="text/css">
    .appchildval{
        margin-top:5px;
        overflow:hidden;
    }
    .appendhere{
        margin-top:10px;
    }
    .createhere label{
        display:inline;
    }
    .hideslug{
        display: none;
    }
    .showslug{
        display: block;
    }

    .modal-content {
        border-radius: 0px;
    }
    .modal-body {
        padding: 25px;
    }
    #add-product-form .modal-dialog {
        height: 50%;
        min-height: 420px; 
    }

    #add-product-form .modal-content .modal-header > h5 {
        font-weight: 300;
        font-size: 15px; 
        text-align: center;
    }
    /*  mobile css end */
    @media (min-width: 768px) {
        #add-product-form .modal-dialog {
            width: 600px;
            height: 50%;
            min-height: 383px
        }

        #add-product-form .modal-content {
            background-color: white;
            margin: 40% auto;
            padding: 36px 73px;
            max-width: 800px;
            height: 55%;
            width: 493px;
            border: 2px solid #998967;
            border-radius: 0px;
        }

        .modal-content .modal-header {
            border-bottom: 0px solid #fff;
        }
        .modal-content .modal-body {
            padding: 0px!important;
        }


        .modal-content .modal-header > h2,h5 {
            color: #56616F;
        }

    }
  
    #add-product-form h2 {
        text-align: center;
        font-weight: 400;
        color: #56616F;
    }


    #add-product-form button{
        background-color: #998967;
        text-transform: uppercase;
        text-align: center;
        font-weight: 400;
        color: white;
        width: 139px;
        height: 30px;
        float: right;
        border: 0;
        box-shadow: none;
        margin-top: 5px;
        font-size: 10px;
        padding-top: 4px;
        margin-right: 33%;
    }
    </style>
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@lang('panel.optional_add')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="forms-wizard.html#">@lang('panel.optional_add_admin')</a></li>
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
                        <h3 class="widget-title">@lang('panel.optional_add1')</h3>
                    </div>
                    <div class="widget-body">
                        <form id="form-tabs" name="optionalfield" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                            {!! csrf_field() !!}                            
                            <h3>Optional Field Details</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_title')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="title" name="title" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_name')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="name" name="name" type="text" class="form-control"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_label')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="label" type="text" name="label"  class="form-control" required>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_type')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <select id="type" name="meta_type" class="form-control checktype" required>
                                                    <option value="">--Please Select--</option>
                                                    <option value="text">Text</option>
                                                    <option value="number">Number</option>
                                                    <option value="textarea">Textarea</option>
                                                    <option value="select">Select</option>
                                                    <option value="dropdown">Dropdown</option>
                                                    <option value="checkbox">Checkbox</option>
                                                    <option value="radiobutton">Radio Button</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row optionValue" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country" class="col-sm-3 col-md-2 control-label">Value</label>
                                            <div class="col-sm-9 col-md-10">
                                                <div class="row createhere">
                                                    <div class="col-md-2">
                                                        <label class="fs-12">Id Attribute :</label>
                                                        <input type="text" placeholder="" class="form-control op_id">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="fs-12">CSS Attribute :</label>
                                                        <input type="text" placeholder="" class="form-control op_css">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="fs-12">Value :</label>
                                                        <input type="text" placeholder="" class="form-control op_value">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="fs-12">Text :</label>
                                                        <input type="text" placeholder="" class="form-control op_text" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>&nbsp;</label>
                                                        <span class="addvalue btn btn-rounded btn-success btn-sm"><i class="ti-plus"></i></span>
                                                    </div>
                                                </div>
                                                <div class="appendhere row"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_desc')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <Textarea id="description" name="meta_description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_add_place')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input type="text" class="form-control" name="placeholder">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            <div class="row p-10 text-right">
                                <span id="save-btn" type="button" class="btn btn-raised btn-success btn-lg">@lang('panel.optional_add_save')</span>
                            </div>                                 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-product-form" tabindex="-1" role="dialog" aria-labelledby="addProductForm">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>New Optional Field Created!</h2>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="modal-body">
                        <button type="button" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')
    <!-- jQuery-->
    <script type="text/javascript" src="/db/js/jquery.min.js"></script>
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
    <script type="text/javascript">
    $(document).ready(function (){
        var opindex = 0;
        function validate(){
            el_id = ['title','name','label','type'];
            for (var i = 0; i < el_id.length; i++) {
                if($('#'+el_id[i]).val()==''){
                    $('#'+el_id[i]).focus();
                    return false;
                }
            }
            return true;
        }
        $(".addvalue").on("click", function (){
            var op_id = $('.op_id').val(),
                op_css = $('.op_css').val(),
                op_value = $('.op_value').val(),
                op_text = $('.op_text').val();
                if(op_value==''){
                    $('.op_value').focus();
                    return false;
                }
                if(op_text==''){
                    $('.op_text').focus();
                    return false;
                }
            var appendval = '<div class="appchildval" id="opindex_'+opindex+'"><div class="col-md-2"><input type="text" name="idAtr[]" placeholder="" class="form-control" value="'+op_id+'"></div><div class="col-md-3"><input type="text" name="cssAtr[]" placeholder="" class="form-control" value="'+op_css+'"></div><div class="col-md-3"><input type="text" name="value[]" placeholder="" class="form-control" value="'+op_value+'"></div><div class="col-md-3"><input type="text" name="text[]" placeholder="" class="form-control" value="'+op_text+'"></div><div class="col-md-1"><span data-opin="'+opindex+'" class=" deletethis btn btn-rounded btn-danger btn-sm"><i class="ti-minus"></i></span></div></div>';
            $('.appendhere').append(appendval);
            $('.op_id,.op_css,.op_value,.op_text').val('');
            opindex +=1;
            $('.deletethis').click(function(){
                var int = $(this).attr('data-opin');
                $('#opindex_'+int).remove();
            });
        });
        $('.checktype').change(function(){
            var check = $(this).val();
            if(check =='select' ||check =='radiobutton' || check =='checkbox' || check =='dropdown'){
                $('.optionValue').fadeIn('slow');
            }else{
                $('.optionValue').fadeOut('slow');
            }
        });
        $('#save-btn').click(function () {
            if(validate()){
                $("form[name='optionalfield']").submit();
            }
        });


    });
    </script>
        
@endsection
