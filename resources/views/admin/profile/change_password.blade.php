@extends('admin.layout.app')

@section('content')

<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-user"></i>
                        User Profile
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1.html">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Users</a>
                        </li>
                        <li class="active breadcrumb-item">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-12 m-t-35">
                            <div id="edit_detail_form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" enctype="multipart/form-data" action="{{route('admin_update_password')}}">
                                {{ csrf_field() }}
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="u-name" class="col-form-label">Current Password *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-lock text-primary"></i></span>
                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="u-name" class="col-form-label">New Password *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-lock text-primary"></i></span>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="email" class="col-form-label">Confirm Password *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-9 push-lg-3">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- /.inner -->
</div>

@endsection