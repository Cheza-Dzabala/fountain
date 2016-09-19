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

                    <div class="form-group has-feedback has-feedback-left form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback has-feedback-left form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn blue uppercase pull-right">Login</button>
                    </div>
                </form>

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
