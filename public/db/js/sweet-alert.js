$(document).ready(function () {

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
        }),
        /*$("#sweet-3, .sweet-3").each(function () {
            $(this).on("click", function () {
                console.log('hi');
                swal({
                    title: "Update Profile",
                    text: "Are you sure to update your profile?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#A1D9F2",
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                    $("form[name='profile']").submit();
                });
            });
        }),*/
        $("#sweet-user, .sweet-user").each(function () {
            $(this).on("click", function () {
                console.log('hi');
                swal({
                    title: "Good job!"
                    , text: "You have created a user"
                    , type: "success"
                    , confirmButtonClass: "btn-raised btn-success"
                    , confirmButtonText: "OK"
                })
            })

        }),

        $("#sweet-4").on("click", function () {
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
                    , cancelButtonText: "No, cancel plx!"
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
