$( document ).ready(function() {
    $("#form-tabs_approduct").steps({
	    headerTag: "h3",
	    bodyTag: "fieldset",
	    transitionEffect: "slideLeft",
	    enableFinishButton: false,
	    enablePagination: false,
	    enableAllSteps: true,
    	titleTemplate: "#title#",
	    cssClass: "tabcontrol"
	});

	$("#form-tabs_admin").steps({
	    headerTag: "h3",
	    bodyTag: "fieldset",
	    transitionEffect: "slideLeft",
	    enableFinishButton: false,
	    enablePagination: false,
	    enableAllSteps: true,
    	titleTemplate: "#title#",
	    cssClass: "tabcontrol"
	});

	$("#form-tabs").validate({

       rules:{

            password:{
                required: true,
                minlength: 4,
                maxlength: 16
            },
            company_address: {
            	required: true,
                minlength: 4,
                maxlength: 16
            },
            password_user: {
            	required: true,
                minlength: 4,
                maxlength: 16
            },
            password_user_confirm: {
            	required: true,
                minlength: 4,
                maxlength: 16
            }
       },

       messages:{

            password:{
                required: "Enter your password"
            },
            password_user:{
                required: "Enter your password"
            },
            password_user_confirm: {
            	required: "Please confirm your password"
            },
            company_address: {
            	required: "Enter your address"
            }
       }

    });

	$('.publish').on('click', function () {
		swal("Your setting has been updated.");
	});

	$('.publish_profile').on('click', function () {
		swal("Your setting has been updated.");
	});

	$('.publish_admin').on('click', function () {
		swal("Your setting has been updated.");
	});

	$('.title_details').on('click', function () {
		var arrow = $(this).find('i');
		arrow.removeClass();
		var slideBox = $('.details_box');
		slideBox.toggleClass('active');
		if(slideBox.hasClass('active')) {
			slideBox.slideDown();
			arrow.addClass('fa fa-chevron-up');
		}else {
			slideBox.slideUp();
			arrow.addClass('fa fa-chevron-down')
		}
	});
});