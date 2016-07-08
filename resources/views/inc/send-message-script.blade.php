<script src="/db/js/jquery.validate.min.js"></script>
<script src="/js/bundle.js"></script>
<script>
$(document).ready(function(){
    $('#message-form').validate({
      rules: {
        content: {
          required: true
        }
      }
    });

    $('#login-form-ajax').validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true
        }
      }
    });

    $('#sign-in-btn').click(function(e){
      e.preventDefault();
      var email = $('input#email').val(), pass = $('input#password').val();
      var token = $('input[name=_token]').val();
      var dataA = {email: email, action: 'get_email'};

      if ($('#login-form-ajax').valid() && !$('#sign-in-btn').prop('disabled')){
        $('#sign-in-btn').prop('disabled', true);
        $('div.ajax-loading').show();
        $.ajax({
            type: "POST",
            url: "/login",
            headers: {'X-CSRF-TOKEN': token},
            data: dataA,
            dataType: "json",
            success: function(data){
                if (data.result === 1) {
                    var hashed = encrypt.password(pass, data.salt);
                    var salt = data.salt;
                    var _ref = $('input[name=_ref]').val();
                    $.ajax({
                      type: "POST",
                      url: "/login",
                      headers: {'X-CSRF-TOKEN': token},
                      data: {
                        action: 'login_ajax',
                        email: email,
                        salt: salt,
                        hashed: hashed,
                        _ref: _ref
                      },
                      dataType: 'json',
                      success: function(res) {
                        $('#sign-in-btn').prop('disabled', false);
                        $('div.ajax-loading').hide();
                        if (res.result === 0) {
                          $("p.login-error").html(res.message).slideDown('fast');
                          $('#login-form-ajax input[name=password]').select();
                          setTimeout(function(){
                            $("p.login-error").slideUp('fast');
                          }, 5000);
                        } else {
                          window.location = _ref;
                        }
                      }
                    });
                }else{
                    $('#sign-in-btn').prop('disabled', false);
                    $('div.ajax-loading').hide();
                    $('p.login-error').html(data.message).show().slideDown('fast');
                    $('#login-form-ajax input[name=email]').select();
                    setTimeout(function() {
                      $("p.login-error").slideUp('fast');
                    }, 5000);
                }
            },
            failure: function(errMsg){
                alert(errMsg);
            }
        });
        return false;
      }
    });

    $('#message-send-btn').click(function(e){
      e.preventDefault();
      var listingId = $('input#listing-id').val();
      console.log(listingId);
      var token = $('input[name=_token]').val();
      if($('#message-form').valid() && !$('#message-send-btn').prop('disabled')) {
        $('#message-send-btn').prop('disabled', true);
        $('#message-form textarea').prop('disabled', true);
        $('div.ajax-loading').show();
        $.ajax({
          type: 'POST',
          url: '/contact/dealer/{{$dealer->id}}',
          headers: {'X-CSRF-TOKEN': token},
          dataType: 'json',
          data: {
            message: $('textarea[name=content]').val(),
            listingId: listingId
          },
          success: function(res) {
              console.log(res);
            if (res.result === 1) {
              $('#message-send-btn').prop('disabled', false);
              $('div.ajax-loading').hide();
              $('#message-form textarea').val('').prop('disabled', false);
              $('#contact-dealer-form').modal('toggle');
              $('#message-sent-form').modal('toggle');
            } else {
              $('#message-send-btn').prop('disabled', false);
              $('div.ajax-loading').hide();
              $('p.login-error').html(res.message).show().slideDown('fast');
              $('textarea').select();
              setTimeout(function() {
                $("p.login-error").slideUp('fast');
              }, 5000);
            }
          }
        });
      }
    });

    // insert title to the message box
    var title = $('[data-listing-title]');
    if (title.length > 0) {
       $('#contact-dealer-form h2').after($('<h5>Re: '+title.attr('data-listing-title') +'</h5>'));
    }

});
</script>
