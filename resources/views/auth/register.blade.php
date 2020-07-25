@extends('layouts.layout')

@section('content')


<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="theme-card">
                    <h3 class="text-center">Create account</h3>
                    <form class="theme-form"  method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="review">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" required="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Password</label>
                                <input name="password" type="password" class="form-control" id="review" placeholder="Enter your password" required="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="review">Conform Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                
                            </div>
                            <div class="col-md-12 form-group"><button type="submit" class="btn btn-normal">create Account</button></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 ">
                                <p >Have you already account? <a href="login.html" class="txt-default">click</a> here to &nbsp;<a href="login.html" class="txt-default">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
