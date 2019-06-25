@extends('auth.layouts.app')


@section('content')
<div class="col-lg-10 push-lg-1 col-sm-10 push-sm-1 login_top_bottom">
    <div class="row">
        <div class="col-lg-6 push-lg-3 col-sm-10 push-sm-1">
            <div class="login_logo login_border_radius1">
                <h3 class="text-center">
                    <a href="/"><img src="{{ asset('admn/img/logo.png')}}" alt="josh logo" class="admire_logo"></a><span class="text-white"> <br/>
                        Sign Up</span>
                </h3>
            </div>
            <div class="bg-white login_content login_border_radius">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label for="name" class="col-form-label">Name *</label>
                            <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                            </span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                                {{-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label for="username" class="col-form-label">Username *</label>
                            <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                            </span>
                                <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required>

                                {{-- @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label for="email" class="col-form-label">Email *</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope text-primary"></i>
                            </span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>

                                {{-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label for="password" class="col-form-label text-sm-right">Password *</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key text-primary"></i>
                            </span>
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                {{-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="confirmpassword" class="col-form-label">Confirm Password *</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key text-primary"></i>
                            </span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="phone" class="col-form-label">Phone *</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone text-primary"></i>
                            </span>
                                <input type="text" id="phone" placeholder="Phone Number" name="phone" class="form-control"/>
                            </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label">Gender</label>
                        </div>
                        <div class="col-sm-2 col-12">
                            <label class="custom-control custom-radio">
                                <input type="radio" name="radio" class="custom-control-input form-control">
                                <span class="custom-control-indicator"></span>
                                <a class="custom-control-description">Male</a>
                            </label>
                        </div>
                        <div class="col-sm-2 col-12">
                            <label class="custom-control custom-radio">
                                <input type="radio" name="radio" class="custom-control-input form-control">
                                <span class="custom-control-indicator"></span>
                                <a class="custom-control-description">Female</a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input form-control">
                                <span class="custom-control-indicator"></span>
                                <a class="custom-control-description">Send me latest news and updates.</a>
                            </label>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="submit" value="Submit" class="btn btn-primary"/>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <label class="col-form-label">Already have an account?</label> <a href="{{route('login')}}" class="text-primary login_hover"><b>Log In</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
