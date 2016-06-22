@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form name="form_login" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="login_btn" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <input type="hidden" id="action" name="action" value="" />
                                <input type="hidden" id="salt" name="salt" value="" />
                                <input type="hidden" id="hashed" name="hashed" value="" />

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
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
    <script>
    $(document).ready(function() {
        $('#login_btn').click(function(event){
            event.preventDefault();
            console.log('stop the default action first');

            var email = $('input#email').val(), pass = $('input#password').val();
            var token = $('input[name=_token]').val();
            var dataA = {email: email, action: 'get_email'};

            // prepping first AJAX call
            $.ajax({
                type: "POST",
                url: "/login",
                headers: {'X-CSRF-TOKEN': token},
                data: dataA,
                // contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data){
                  if (data.result) {
                    var hashed = encrypt.password(pass, data.salt);
                    $('input#action').val('login');
                    $('input#salt').val(data.salt);
                    $('input#hashed').val(hashed);
                    $('form[name="form_login"]').submit();
                  }
                },
                failure: function(errMsg){
                  alert(errMsg);
                }
          });
            return false;
        });
    });

    </script>
@endsection
