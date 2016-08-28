@extends('layouts.authForms')

@section('content')
        <!-- BEGIN : LOGIN PAGE 5-2 -->
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <img class="login-logo login-6" src="{{ asset('assets/pages/img/login/fountain.png') }}" />
            <div class="login-content">
                <h1>Fountain Micro Finance - Admin Login</h1>
                <p>
                    Welcome To The Fountain Micro Finance System U.I Demo. Please note that this demo serves to show the client what the system will look like and how it will perform.
                    If unavailable please contact dntonga@apptitudetech.net for login information.
                </p>
                <form action="{{ url('/login') }}" class="login-form" method="post">
                    {{ csrf_field() }}
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        @if ($errors->has('username'))
                                        <strong>{{ $errors->first('username') }}</strong>
                        @endif
                        @if ($errors->has('password'))

                                <strong>{{ $errors->first('password') }}</strong>

                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-6 ">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="username" name="username" required/>
                        </div>
                        <div class="col-xs-6 form-group">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="remember" value="1" /> Remember me
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                            </div>
                            <button class="btn blue" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>

                <!-- BEGIN FORGOT PASSWORD FORM -->
                <form class="forget-form" action="javascript:;" method="post">
                    <h3>Forgot Password ?</h3>
                    <p> Enter your e-mail address below to reset your password. </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                        <button type="submit" class="btn blue uppercase pull-right">Submit</button>
                    </div>
                </form>
                <!-- END FORGOT PASSWORD FORM -->
            </div>
            <div class="login-footer">
                <div class="row bs-reset">

                    <div class="col-xs-7 bs-reset">
                        <div class="login-copyright text-right">
                            <p>Copyright &copy; 2016 Apptitude Tech Systems </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg"> </div>
        </div>
    </div>
</div>
<!-- END : LOGIN PAGE 5-2 -->

@endsection
