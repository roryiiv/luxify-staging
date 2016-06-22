@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" id='register-form' role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <input name='salt' id='salt' type='hidden' />
                        <input name='hashed' id='hashed' type='hidden' />

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="fullname" required type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" required type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" required type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" required class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                          <p class="bg-danger" id='error-msg'></p>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id='submit-btn' type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="/js/bundle.js"></script>
  <script type="text/javascript" src="/db/js/jquery.validate.min.js"></script>
  <script>
  $('#submit-btn').on('click', function(e) {
    var token = $('input[name=_token]').val();
    e.preventDefault();
    $('#register-form').validate({
      rules: {
        email: {
          required: true,
          email: true 
        },
        name: {
          required: true,
          minlength: 4 
        },
        password: {
          required: true,
        },
        password_confirmation: {
          required: true, 
        } 
      } 
    });

    if ($('#register-form').valid()) {
      $.ajax({
        type: "POST",
        url: "/login",
        dataType: "json",
        headers: {'X-CSRF-TOKEN': token},
        data: {
          email: $('input#email').val(),
          action: 'get_email'
        },
        dataType: 'json',
        success: function (data) {
          if(data.result === 0) {
            var salt = encrypt.makeSalt();
            var hashed = encrypt.password($('#password').val(), salt);  
            $('input#salt').val(salt);
            $('input#hashed').val(hashed);
            $('form#register-form').submit();
          } 
        }
       
      });
    } else {
    }
    

  });
    
  </script>

@endsection
