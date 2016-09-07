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
    </style>
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@lang('panel.optional_edit')</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="forms-wizard.html#">@lang('panel.optional_edit_admin')</a></li>
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
                        <h3 class="widget-title">@lang('panel.optional_edit1')</h3>
                    </div>
                    <div class="widget-body">
                        <form id="form-tabs" name="optionalfield" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                            {!! csrf_field() !!}                            
                            <h3>@lang('panel.optional_edit_detail')</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_title')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="title" name="title" type="text" class="form-control" placeholder="{{$formfields->title}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_name')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="{{$formfields->name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_label')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input id="" type="text" name="label"  class="form-control" placeholder="{{$formfields->label}}">                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meta_type" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_type')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <select id="meta_type" name="meta_type" class="form-control checktype" required>
                                                    <option value="">--Please Select--</option>
                                                    <option value="textField" {{func::selected($formfields->meta_type,'text')}}>Text</option>
                                                    <option value="number" {{func::selected($formfields->meta_type,'number')}}>Number</option>
                                                    <option value="textarea" {{func::selected($formfields->meta_type,'textarea')}}>Textarea</option>
                                                    <option value="select" {{func::selected($formfields->meta_type,'select')}}>Select</option>
                                                    <option value="dropdown" {{func::selected($formfields->meta_type,'dropdown')}}>Dropdown</option>
                                                    <option value="checkbox" {{func::selected($formfields->meta_type,'checkbox')}}>Checkbox</option>
                                                    <option value="radiobutton" {{func::selected($formfields->meta_type,'radiobutton')}}>Radio Button</option>
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
                                            <label for="description" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_desc')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <Textarea id="description" name="meta_description" class="form-control">{{$formfields->meta_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="col-sm-3 col-md-4 control-label">@lang('panel.optional_edit_place')</label>
                                            <div class="col-sm-9 col-md-8">
                                                <input type="text" class="form-control" name="placeholder" placeholder="{{$formfields->placeholder}}">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            <div class="row p-10 text-right">
                                <button id="save-btn" type="button"   class="btn btn-raised btn-success btn-lg">@lang('panel.optional_edit_save')</button>
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
        check_type();
        function check_type(){
            var check = $('.checktype').val();
            if(check =='select' ||check =='radiobutton' || check =='checkbox'|| check =='dropdown'){
                $('.optionValue').fadeIn('slow');
            }else{
                $('.optionValue').fadeOut('slow');
            }
        }

        $("#save-btn").on("click", function (){
            $("form[name='optionalfield']").submit();
        });
        var opindex = 0;
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
            $('body').find('.deletethis').click(function(){
                var int = $(this).attr('data-opin');
                $('#opindex_'+int).remove();
            });
        });
        <?php if($formfields->optionValues=='' || empty($formfields->optionValues)){
            $formfields->optionValues=array();
            $formfields->optionValues = json_encode($formfields->optionValues);
        }
        ?>
        arr = {!!$formfields->meta_value!!};
        if(arr.length>0){
            for (var i = 0; i < arr.length; i++){
                var appendval = '<div class="appchildval" id="opindex_'+opindex+'"><div class="col-md-2"><input type="text" name="idAtr[]" placeholder="" class="form-control" value="'+arr[i].idAtr+'"></div><div class="col-md-3"><input type="text" name="cssAtr[]" placeholder="" class="form-control" value="'+arr[i].cssAtr+'"></div><div class="col-md-3"><input type="text" name="value[]" placeholder="" class="form-control" value="'+arr[i].value+'"></div><div class="col-md-3"><input type="text" name="text[]" placeholder="" class="form-control" value="'+arr[i].text+'"></div><div class="col-md-1"><span data-opin="'+opindex+'" class=" deletethis btn btn-rounded btn-danger btn-sm"><i class="ti-minus"></i></span></div></div>';
                $('.appendhere').append(appendval);
                opindex +=1;
            }
        }
        $('body').find('.deletethis').click(function(){
            var int = $(this).attr('data-opin');
            $('#opindex_'+int).remove();
        });
        $('.checktype').change(function(){
            var check = $(this).val();
            if(check =='select' ||check =='radiobutton' || check =='checkbox' || check =='dropdown'){
                $('.optionValue').fadeIn('slow');
            }else{
                $('.optionValue').fadeOut('slow');
            }
        });


    });
    </script>
        
@endsection
