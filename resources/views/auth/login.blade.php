@extends('layouts.layout')

@section('content')




<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center ">Login</h3>
                    <form class="theme-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email" required="">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="review">Password</label>
                            <input type="password" name="password" class="form-control" id="review" placeholder="Enter your password" required="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-normal">Login</button>
                        <a class="float-right txt-default mt-2" href="forget-pwd.html" id="fgpwd">Forgot your password?</a>
                    </form>
                    <p class="mt-3 ">Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p>
                    <a href="register.html" class=" pt-3 d-block">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
