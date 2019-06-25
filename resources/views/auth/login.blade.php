@extends('auth.layouts.app')

@section('content')
<div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif


            <div class="login_logo login_border_radius1">
                <h3 class="text-center">
                    <a href="/"><img src="{{ asset('admn/img/logo.png')}}" alt="josh logo" class="admire_logo"></a><span class="text-white"> <br/>
                        Login</span>
                </h3>
            </div>
            <div class="bg-white login_content login_border_radius">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-form-label"> E-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon input_email"><i class="fa fa-envelope text-primary"></i></span>
                            <input id="email" type="text" class="form-control form-control-md" name="email" value="{{ old('email') }}" placeholder="E-mail" autofocus>
                            {{-- @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <!--</h3>-->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon addon_password"><i class="fa fa-lock text-primary"></i></span>
                            <input id="password" type="password" class="form-control form-control-md" name="password" placeholder="Password">
                            {{-- @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">
                            </div>
                        </div>
                    </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  class="custom-control-input form-control" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="custom-control-indicator"></span>
                                <a class="custom-control-description">Keep me logged in</a>
                            </label>
                        </div>
                        <div class="col-6 text-right forgot_pwd">
                            <a href="{{ route('password.request') }}" class="custom-control-description forgottxt_clr">Forgot password?</a>
                        </div>
                    </div>
                </div>
                </form>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 m-t-10">
                            <div class="icon-white btn-facebook icon_padding loginpage_border">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <span class="text-white icon_padding text-center question_mark">Log In With Facebook</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 pull-lg-right m-t-10">
                            <div class="icon-white btn-google icon_padding loginpage_border">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                <span class="text-white icon_padding question_mark">Log In With Google+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Don't you have an Account? </label>
                    <a href='{{ route('register') }}' class="text-primary"><b>Sign Up</b></a>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
