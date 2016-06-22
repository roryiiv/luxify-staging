@extends('front.master')

@section('title', 'Login')

@section('content')
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form method="POST" action="{{url('login')}}">
                                {{-- cyphering method basic by laravel --}}
                                {!! csrf_field() !!}
                                <input type="email" name="email" id="email" placeholder="Email Address" />
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <span>
                                    <input name="remember" id="remember" type="checkbox" class="checkbox">
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                            <p>
                                <a href="oauth/redirect/facebook">Login with Facebook</a><br />
                                <a href="oauth/redirect/twitter">Login with Twitter</a>
                            </p>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form method="POST" action="{{url('register')}}">
                                {!! csrf_field() !!}
                                <input type="text" name="name" id="name"  placeholder="Name">
                                <input type="email" name="email" placeholder="Email Address"/>
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                            <p>
                                <a href="oauth/redirect/facebook">Login with Facebook</a><br />
                                <a href="oauth/redirect/twitter">Login with Twitter</a>
                            </p>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection
@section('scripts')
    <script>
    var AES = require("crypto-js/aes");
    var SHA256 = require("crypto-js/sha256");
    console.log(SHA256("Message"));
    </script>
@endsection
