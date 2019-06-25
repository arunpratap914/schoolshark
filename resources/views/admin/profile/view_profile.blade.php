@extends('admin.layout.app')


@section('header_styles')
    <!--Plugin css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/vendors/fullcalendar/css/fullcalendar.min.css') }}"/>
    <!--End off plugin css-->
    <!--Page level css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/timeline2.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/calendar_custom.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/profile.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/gallery.css') }}"/>
@endsection


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
                                <div class="col-lg-6 m-t-35">
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumb_zoom zoom admin_img_width" id="uploaded_image">
                                                    <img src="{{ asset('admn/images') }}/{{$user->avatar}}" alt="admin" class="admin_img_width">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width"></div>
                                                <div class="alert" id="message" style="display: none"></div>
                                                <form method="post" id="upload_form" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="select_file" id="select_file">
                                                    <input class="btn btn-primary" type="submit" value="Submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 m-t-25">
                                    <div>
                                        <ul class="nav nav-inline view_user_nav_padding">
                                            <li class="nav-item card_nav_hover">
                                                <a class="nav-link active" href="#user" id="home-tab"
                                                   data-toggle="tab" aria-expanded="true">User
                                                    Details</a>
                                            </li>
                                        </ul>
                                        <div id="clothing-nav-content" class="tab-content m-t-10">
                                            <div role="tabpanel" class="tab-pane fade show active" id="user">
                                                <div id="display_details">
                                                    <table class="table" id="users">
                                                        <tr>
                                                            <td>Name</td>
                                                            <td class="inline_edit">
                                                            <span class="editable"
                                                                data-title="Edit User Name" name="name">{{$user->name}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Username</td>
                                                            <td class="inline_edit">
                                                            <span class="editable"
                                                                data-title="Edit User Name">{{$user->username}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>E-mail</td>
                                                            <td>
                                                                <span class="editable" data-title="Edit E-mail">{{$user->email}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number</td>
                                                            <td>
                                                                <span class="editable" data-title="Edit Phone Number">{{$user->phone or '---'}}</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div id="edit_detail_form" style="display:none;">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <form method="post" enctype="multipart/form-data" action="{{route('admin_update_detail')}}">
                                                    {{ csrf_field() }}
                                                        <div class="form-group row m-t-25">
                                                            <div class="col-lg-3 text-lg-right">
                                                                <label for="u-name" class="col-form-label">Name *</label>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i></span>
                                                                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-t-25">
                                                            <div class="col-lg-3 text-lg-right">
                                                                <label for="u-name" class="col-form-label">Username *</label>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i></span>
                                                                    <input type="text" name="username" id="username" value="{{$user->username}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-3 text-lg-right">
                                                                <label for="email" class="col-form-label">Email *</label>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                                                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-3 text-lg-right">
                                                                <label for="phone" class="col-form-label">Phone *</label>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-phone text-primary"></i></span>
                                                                    <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control">
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
                                                <div class="">
                                                    <button class="btn btn-primary" id="edit_details">Edit Details</button> 
                                                    <button class="btn btn-warning" id="cancel_edit_details" style="display:none;">Cancel</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.inner -->
        </div>

@if ($errors->any())
<script>
    $("#display_details").hide();
     $('#edit_detail_form').show();
     $('#cancel_edit_details').show();
     $('#edit_details').hide();
</script>
@endif

<script>

// $(document).ready(function(){
//     $('input[type="file"]').change(function(){
//         alert("A file has been selected.");
//     });
// });
$(document).ready(function(){
    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        //alert("bd");
        $.ajax({
            url:"{{route('admin_update_image')}}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
            }
        })
    });


    $("#edit_details").click(function(){
        $('#display_details').hide();
        $('#edit_detail_form').show();
        $('#cancel_edit_details').show();
        $('#edit_details').hide();
    });
    $("#cancel_edit_details").click(function(){
        $('#display_details').show();
        $('#edit_detail_form').hide();
        $('#cancel_edit_details').hide();
        $('#edit_details').show();
    });



});
</script>
@endsection

@section('footer_scripts')
<!--Plugin scripts-->
<script type="text/javascript" src="{{ asset('admn/vendors/slimscroll/js/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/bootstrap_calendar/js/bootstrap_calendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/fullcalendar/js/fullcalendar.min.js') }}"></script>
<!--End of Plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{ asset('admn/js/pages/mini_calendar.js') }}"></script>
<!--End of Page level scripts-->
@endsection