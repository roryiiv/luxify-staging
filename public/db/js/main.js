$(document).ready(function () {
    //add product form
    var addProductForm = $('#form-tabs_approduct').show();
    addProductForm.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        enableFinishButton: true,
        enablePagination: true,
        enableAllSteps: true,
        titleTemplate: "#title#",
        cssClass: "tabcontrol",
        onStepChanging: function (event, curIdx, newIdx) {
            if (curIdx > newIdx) {
                return true;
            }
            // Needed in some cases if the user went back (clean up)
            if (curIdx < newIdx)
            {
                // To remove error styles
                addProductForm.find(".body:eq(" + newIdx + ") label.error").remove();
                addProductForm.find(".body:eq(" + newIdx + ") .error").removeClass("error");
            }
            addProductForm.validate().settings.ignore = ":disabled,:hidden";
            return addProductForm.valid();
        },
        onFinishing: function (event, currentIndex) {
            // swal({
            //     title: "New Listing Created!",
            //     text: "Admin will review your listing soon.",
            //     type: "success",
            //     confirmButtonClass: "btn-raised btn-success",
            //     confirmButtonText: "OK"
            // });
            addProductForm.submit();
            return true;
        },
        labels: {
            finish: "Submit"
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.after(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });


  var editProductForm = $('#form-tabs_edit_product').show();
    editProductForm.steps({
      headerTag: "h3",
      bodyTag: "fieldset",
      transitionEffect: "slideLeft",
      enableFinishButton: true,
      enablePagination: true,
      enableAllSteps: true,
      showFinishButtonAlways: true,
      titleTemplate: "#title#",
      cssClass: "tabcontrol",
      onStepChanging: function (event, curIdx, newIdx) {
        return editProductForm.valid();
      },
      onFinishing: function (event, currentIndex) {
      	$(window).unbind('beforeunload');
        // swal({
        //   title: "Good job!",
        //   text: "You have updated the listing.",
        //   type: "success",
        //   confirmButtonClass: "btn-raised btn-success",
        //   confirmButtonText: "OK"
        // });
        editProductForm.submit();
        return true;
      },
      labels: {
        finish: "Save"
      }
    }).validate({
      errorPlacement: function errorPlacement(error, element) { element.after(error); },
      rules: {
        confirm: {
          equalTo: "#password-2"
        }
      }
    });

    $("#form-tabs_addCustomer").validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            txtEmailAddress: {
              required: true,
              email: true
            },
            username: {
              required: true,
              minlength: 4
            },
            confirm: {
                equalTo: "#password"
            },
        }
    });
    $("#form-tabs_addCustomer").steps({
        headerTag: "h3"
        , bodyTag: "fieldset"
        , transitionEffect: "slideLeft"
        , enableFinishButton: true
        , enablePagination: true
        , enableAllSteps: true
        , titleTemplate: "#title#"
        , cssClass: "tabcontrol"
        ,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            $("#form-tabs_addCustomer").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-tabs_addCustomer").valid();
        },
        onFinishing: function (event, currentIndex) {
            var token = $('input[name=_token]').val();

            $.ajax({
                type: "POST",
                url: "/login",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    email: $('input#txtEmailAddress').val(),
                    action: 'get_email'
                },
                dataType: 'json',
                success: function (data) {
                    if(data.result === 0) {
                        var salt = encrypt.makeSalt();
                        var hashed = encrypt.password($('#txtPassword').val(), salt);
                        $('input#salt').val(salt);
                        $('input#hashed').val(hashed);
                        swal({
                            title: "Add a Customer",
                            text: "You are about to add a Customer, OK?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#A1D9F2",
                            confirmButtonText: "Yes!",
                            cancelButtonText: "No!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(){
                            $("#form-tabs_addCustomer").submit();
                        });
                    }
                }
            });
            return true
        }
        , labels: {

            finish: "Create"

        }
    });

    $("#form-tabs_addDealer").validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            txtEmailAddress: {
              required: true,
              email: true
            },
            username: {
              required: true,
              minlength: 4
            },
            confirm: {
                equalTo: "#password"
            },
        }
    });
    $("#form-tabs_addDealer").steps({
        headerTag: "h3"
        , bodyTag: "fieldset"
        , transitionEffect: "slideLeft"
        , enableFinishButton: true
        , enablePagination: true
        , enableAllSteps: true
        , titleTemplate: "#title#"
        , cssClass: "tabcontrol"
        , onStepChanging: function (event, currentIndex, newIndex)
        {
            $("#form-tabs_addDealer").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-tabs_addDealer").valid();
        }
        , onFinishing: function (event, currentIndex) {
            var token = $('input[name=_token]').val();
            $.ajax({
                type: "POST",
                url: "/login",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    email: $('input#txtEmailAddress').val(),
                    action: 'get_email'
                },
                dataType: 'json',
                success: function (data) {
                    if(data.result === 0) {
                        var salt = encrypt.makeSalt();
                        var hashed = encrypt.password($('#txtPassword').val(), salt);
                        $('input#salt').val(salt);
                        $('input#hashed').val(hashed);
                        swal({
                            title: "Add a Dealer",
                            text: "You are about to add a Dealer, OK?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#A1D9F2",
                            confirmButtonText: "Yes!",
                            cancelButtonText: "No!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(){
                            $("#form-tabs_addDealer").submit();
                        });
                    }
                }
            });
            return true;
        }
        , labels: {
            finish: "Create"
        }
    });


    $("#form-tabs_admin").steps({
        headerTag: "h3"
        , bodyTag: "fieldset"
        , transitionEffect: "slideLeft"
        , enableFinishButton: false
        , enablePagination: false
        , enableAllSteps: true
        , titleTemplate: "#title#"
        , cssClass: "tabcontrol"
        , onFinishing: function (event, currentIndex) {
            swal({
                title: "Good job!"
                , text: "You have updated the settings"
                , type: "success"
                , confirmButtonClass: "btn-raised btn-success"
                , confirmButtonText: "OK"
            })

            return true;

        }
    });

    $('.publish').on('click', function () {
        swal("Good job!", "You have updated the details", "success");
    });

    $('.publish_admin').on('click', function () {
        swal("Good job!", "You have updated the details", "success");
    });

    $('.title_details').on('click', function () {
        var arrow = $(this).find('i');
        arrow.removeClass();
        var slideBox = $('.details_box');
        slideBox.toggleClass('active');
        if (slideBox.hasClass('active')) {
            slideBox.slideDown();
            arrow.addClass('fa fa-chevron-up');
        } else {
            slideBox.slideUp();
            arrow.addClass('fa fa-chevron-down')
        }
    });
    $("#sweet-1").on("click", function () {
        swal({
            title: "Here's a message!"
            , confirmButtonClass: "btn-raised btn-primary"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-2").on("click", function () {
        swal({
            title: "Here's a message!"
            , text: "It's pretty, isn't it?"
            , confirmButtonClass: "btn-raised btn-primary"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-3, .sweet-3").each(function () {
        $(this).on("click", function () {
            console.log('hi');
            swal({
                title: "Good job!"
                , text: "You have updated the settings"
                , type: "success"
                , confirmButtonClass: "btn-raised btn-success"
                , confirmButtonText: "OK"
            })
        })

    }), $("#sweet-4").on("click", function () {
        swal({
            title: "Good job!"
            , text: "You have updated the settings"
            , type: "info"
            , confirmButtonClass: "btn-raised btn-info"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-5").on("click", function () {
        swal({
            title: "Good job!"
            , text: "You have updated the settings"
            , type: "warning"
            , confirmButtonClass: "btn-raised btn-warning"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-6").on("click", function () {
        swal({
            title: "Good job!"
            , text: "You have updated the settings"
            , type: "error"
            , confirmButtonClass: "btn-raised btn-danger"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-7").on("click", function () {
        swal({
            title: "Are you sure?"
            , text: "Your will not be able to recover this image!"
            , type: "warning"
            , showCancelButton: !0
            , cancelButtonClass: "btn-raised btn-default"
            , cancelButtonText: "Cancel!"
            , confirmButtonClass: "btn-raised btn-danger"
            , confirmButtonText: "Yes, delete it!"
            , closeOnConfirm: !1
        }, function () {
            swal({
                title: "Deleted!"
                , text: "Your image has been deleted."
                , type: "success"
                , confirmButtonClass: "btn-raised btn-success"
                , confirmButtonText: "OK"
            })
        })
    }), $("#sweet-8, .sweet-8").each(function () {
        console.log($(this).html())
        $(this).on("click", function () {
            swal({
                title: "Are you sure?"
                , text: "You will not be able to recover this image!"
                , type: "warning"
                , showCancelButton: !0
                , confirmButtonClass: "btn-raised btn-danger"
                , confirmButtonText: "Yes, delete it!"
                , cancelButtonClass: "btn-raised btn-default"
                , cancelButtonText: "No, cancel please!"
                , closeOnConfirm: !1
                , closeOnCancel: !1
            }, function (t) {
                t ? swal({
                    title: "Deleted!"
                    , text: "Your image has been deleted."
                    , type: "success"
                    , confirmButtonClass: "btn-raised btn-success"
                    , confirmButtonText: "OK"
                }) : swal({
                    title: "Cancelled"
                    , text: "Your image is safe :)"
                    , type: "error"
                    , confirmButtonClass: "btn-raised btn-danger"
                    , confirmButtonText: "OK"
                })
            })
        })

    }), $("#sweet-9").on("click", function () {
        swal({
            title: "Auto close alert!"
            , text: "I will close in 2 seconds."
            , timer: 2e3
            , confirmButtonClass: "btn-raised btn-primary"
            , confirmButtonText: "OK"
        })
    }), $("#sweet-10").on("click", function () {
        swal({
            title: "Sweet!"
            , text: "Here's a custom image."
            , imageUrl: "../build/images/icons/01.png"
            , confirmButtonClass: "btn-raised btn-primary"
            , confirmButtonText: "OK"
        })
    })
});

$.fn.selectRange = function (start, end) {
    if (typeof end === 'undefined') {
        end = start;
    }
    return this.each(function () {
        if ('selectionStart' in this) {
            this.selectionStart = start;
            this.selectionEnd = end;
        } else if (this.setSelectionRange) {
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};