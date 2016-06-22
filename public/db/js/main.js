$(document).ready(function () {
    $("#form-tabs_approduct").steps({
        headerTag: "h3"
        , bodyTag: "fieldset"
        , transitionEffect: "slideLeft"
        , enableFinishButton: true
        , enablePagination: true
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
        , labels: {

            finish: "Submit"

        }
    });

    $("#form-tabs_addcustomer").steps({
        headerTag: "h3"
        , bodyTag: "fieldset"
        , transitionEffect: "slideLeft"
        , enableFinishButton: true
        , enablePagination: true
        , enableAllSteps: true
        , titleTemplate: "#title#"
        , cssClass: "tabcontrol"
        , onFinishing: function (event, currentIndex) {
            swal({
                title: "Good job!"
                , text: "You have created an user."
                , type: "success"
                , confirmButtonClass: "btn-raised btn-success"
                , confirmButtonText: "OK"
            })

            return true;

        }
        , labels: {

            finish: "Create"

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
        , onFinishing: function (event, currentIndex) {
            swal({
                title: "Good job!"
                , text: "You have created a dealer."
                , type: "success"
                , confirmButtonClass: "btn-raised btn-success"
                , confirmButtonText: "OK"
            })

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