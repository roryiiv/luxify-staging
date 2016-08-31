// page init
$(document).ready( function(){
    //all page
    //control header position
    initFixedHeader();
    changeHeaderSelectMenu();
    initNavbarToggle();
    countUp();
    luxifyParallax();

    //hidden on 2016 08 30
    ////initBackgroundImage();
    ////initIonRangeSlider();

    //login and register
    initCustomForms();
    //estates and lisiting
    initSlick();
    initLightbox();
    // initFitVids();
    initFixedScroll();
    initSmoothScroll();

    // custom scripts by Cole M.
    //index
    clientsCarousel();
    mailChimpSub();
    //index ca
    suggestedSearchResults();
    openApplicationForm();


    search_ico();

});

//////base funciton


function isMobile(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))?true:false;
}
function search_ico(){
    $('.search-wrapper').hover(function() {
        $(".category-search").addClass('category-icoColor');
    },function(){
        $(".category-search").removeClass('category-icoColor');
    });
    $('#search_query').bind('focus', function() {
        $(".category-search").addClass('category-icoColor');
    }).focusout(function(){
        $(".category-search").removeClass('category-icoColor');
    });

}
function openApplicationForm(){
    $('#apply-btn-one, #apply-btn-two').click(function(){
        $('#application-form').slideDown();
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });
}

function suggestedSearchResults(){
    var timer;
    $( '#search_query' ).on('input', function() {
        var val = $('input#search_query').val();
        var token = $('input[name=_token]').val();
        var dataA = {search: val, action: 'search', _token: token};
        // console.log(dataA);
        $('#search-left').html('');
        // Set timeout for after user finish typing.
        if(val.length >= 3) {
            window.clearTimeout(timer);
            timer = setTimeout(function(){
                $.ajax({
                    type: "POST",
                    url: "/searchAjax",
                    headers: {'X-CSRF-TOKEN': token},
                    data: dataA,
                    dataType: "html",
                    // contentType: "application/json; charset=utf-8",
                    success: function(data){
                        // alert('it is a success');
                        if(data){
                            $('#search-left').html(data);
                            setTimeout(function() {
                                $('img.result-img').unveil(300, function() {
                                    $(this).load(function() {
                                        $(this).hide();
                                        $(this).fadeIn('slow');
                                    });
                                });
                            }, 200);
                        }else{
                            $('#search-left').html('<p>No data found</p>');
                        }
                        /*
                         $("img.result-img").unveil(300, function() {
                         $(this).load(function() {
                         $(this).hide();
                         $(this).fadeIn('slow');
                         });
                         });
                         */
                    },
                    failure: function(errMsg){
                        alert(errMsg);
                    }
                });
                $( '.suggested-results' ).fadeIn( 800 );
                $( '.search-term > strong' ).text( $('.search-tracker').val() );
            }, 700);
        }
    });
    $( '#search_query').on('blur', function() {
        setTimeout(function(){
            $( '.suggested-results' ).fadeOut( 1200 );
            $( '.search-term > strong' ).text( '' );
        }, 1000);
    });
    $('.suggested-results').mouseover(function(){
        $('.suggested-results').show();
    });

    $('.suggested-results').mouseleave(function(){
        // $('.suggested-results').fadeOut(1000);
    });
}

function luxifyParallax(){
    $('.parallax').jarallax({
        speed: 0.5,
        //imgWidth: 1366,
        //imgHeight: 768,
        position: 'top bottom',
        type: 'scroll',
        noAndroid: true,
    });
    if(isMobile()){
        $('section.parallax, .benefit-block, .imageinfo-block').toggleClass('mobileBg');
    }
}

function clientsCarousel(){
    $(".owl-carousel").owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:2500,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:3,
            },
            600:{
                items:5,
            },
            1000:{
                items:7,
            }
        }
    });
}

function mailChimpSub(){
    $('#mailchimp').ajaxChimp({
        callback: mailchimpCallback,
        url: "http://luxify.us8.list-manage.com/subscribe/post?u=43de99b343f47ff032f021519&amp;id=40bee79be6"
        //http://oscodo.us9.list-manage.com/subscribe/post?u=aef5e76b30521b771cf866464&id=f9f9e8db45
    });
    function mailchimpCallback(resp) {
        if (resp.result === 'success') {
            $('#mailchimp .subscription-success').html('<i class="icon_check_alt2"></i>' + resp.msg).slideDown(1000);
            $('#mailchimp .subscription-error').slideUp(500);

        } else if(resp.result === 'error') {
            $('#mailchimp .subscription-success').slideUp(500);
            $('#mailchimp .subscription-error').html('<i class="icon_close_alt2"></i>' + resp.msg).slideDown(1000);
        }
    }
}


function countUp() {
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
};

function initSmoothScroll() {
    $('a.smooth-scroll[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });
}

function initFixedScroll() {
    var scrollBLock = $(".filter-block");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= (window.innerHeight - 145) ) {
            scrollBLock.addClass("fixed");
        } else {
            scrollBLock.removeClass("fixed");
        }
    });
}


// fancybox modal popup init
function initLightbox() {
    jQuery('a.lightbox, a[rel*="lightbox"]').fancybox({
        helpers: {
            overlay: {
                css: {
                    background: 'rgba(0, 0, 0, 0.65)'
                }
            }
        },
        afterLoad: function(current, previous) {
            // handle custom close button in inline modal
            if(current.href.indexOf('#') === 0) {
                jQuery(current.href).find('a.close').off('click.fb').on('click.fb', function(e){
                    e.preventDefault();
                    jQuery.fancybox.close();
                });
            }
        },
        padding: 0
    });
}


function initSlick() {
    jQuery('.slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    dots: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false
                }
            }
        ]
    });

    jQuery('.slide-holder').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        arrows: true,
        dots: false
    });
}

// function initIonRangeSlider() {
//   jQuery("#range").ionRangeSlider({
//       hide_min_max: true,
//       keyboard: true,
//       min: 1,
//       max: 1000000000,
//       from: 1,
//       to: 1000000000,
//       type: 'double',
//       step: 100000,
//       prefix: "$",
//       grid: false,
//       prettify_enabled: true,
//       prettify_separator: ","
//   });
// }

// fixed header
function initFixedHeader() {
    var $win = $(window);

    var onSCroll = function() {
        var sticky = $('#header'),
            scroll = $win.scrollTop();
        sticky.toggleClass('fixed-position', scroll >= sticky.height());
    };
    $win.scroll(onSCroll);
    onSCroll();
}

// navbar toggle add class on body
function initNavbarToggle() {
    $('.navbar-toggle').on('click', function(e) {
        e.preventDefault();
        $('body').toggleClass('nav-active');

    });
}

// initialize custom form elements
function initCustomForms() {
    jcf.setOptions('Select', {
        wrapNative: false
    });
    jcf.replaceAll();
}

// initialize background image
function initBackgroundImage() {
    window.onload = function(){

        //function add class
        function addClass(elem, cname) {
            var cArr = elem.className.split(" ");
            cArr.push(cname);
            elem.className = cArr.join(" ");
        }

        //function that add background image on parent block
        function setBgImage(pBlockClass){
            var elem = pBlockClass.getElementsByTagName('img')[0];
            if(elem){
                var imgloc = elem.getAttribute('src');
                pBlockClass.setAttribute('style','background-image: url('+imgloc.toString()+')');
            }
        }

        //main program that call function
        var setImg = document.getElementsByClassName('bg-img');
        for(var i = 0; i<setImg.length; i++){
            setBgImage(setImg[i]);
        }
    }
}
function changeHeaderSelectMenu(){

    $('#currSelect').on('change', function(){
        var code = $(this).val();
        // alert(code);
        window.location.href = '/api/currency/switch/' + code;
    });
    $('#langSelect').on('change', function(){
        var code = $(this).val();
        // alert(code);
        window.location.href = '/api/lang/switch/' + code;
    });

}