@extends('admin.layout.app')

@section('header_styles')

    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/vendors/select2/css/select2.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/dataTables.bootstrap.css') }}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/tables.css') }}" />
@endsection


@section('content')
<div id="content" class="bg-container">
                <header class="head">
                    <div class="main-bar">
                       <div class="row no-gutters">
                           <div class="col-lg-6 col-sm-4">
                               <h4 class="nav_top_align">
                                   <i class="fa fa-user"></i>
                                   User Grid
                               </h4>
                           </div>
                           <div class="col-lg-6 col-sm-8 col-12">
                               <ol class="breadcrumb float-right  nav_breadcrumb_top_align">
                                   <li class="breadcrumb-item">
                                       <a href="index1.html">
                                           <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                       </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                       <a href="#">Users</a>
                                   </li>
                                   <li class="active breadcrumb-item">User Grid</li>
                               </ol>
                           </div>
                       </div>
                    </div>
                </header>
                <div class="outer">
                    <div class="inner bg-container">
                        <div class="card">
                            <div class="card-header bg-white">
                                User Grid
                            </div>
                            <div class="card-block m-t-35" id="user_body">
                                <div class="table-toolbar">
                                    <div class="btn-group">
                                        <a href="add_user.html" id="editable_table_new" class=" btn btn-default">
                                            Add User  <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group float-right users_grid_tools">
                                        <div class="tools"></div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Name</th>
                                                <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">E-Mail</th>
                                                <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Username</th>
                                                <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">City</th>
                                                <th class="sorting wid-15" tabindex="0" rowspan="1" colspan="1">Status</th>
                                                <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($users as $key => $user)
                                                <tr role="row" class="even">
                                                    <td>{{$key+1}}</td>
                                                    <td class="sorting_1">{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td class="center">{{$user->city}}</td>
                                                    <td class="center">{{$user->status}}</td>
                                                    <td>
                                                        <a href="view_user.html" data-toggle="tooltip" data-placement="top" title="View User"><i class="fa fa-eye text-success"></i></a>
                                                        &nbsp; &nbsp;
                                                        <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>
                                                        &nbsp; &nbsp;
                                                        <a class="delete hidden-xs hidden-sm" data-toggle="tooltip" data-placement="top" title="Delete" href="delete_user.html"><i class="fa fa-trash text-danger"></i></a>
                                                        {{-- <button class="btn btn-primary btn-sm">Edit</button> 
                                                        <button class="btn btn-danger btn-sm">Delete</button>  --}}
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="7">No User</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
                <!-- Modal -->
                <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <form>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="float-right" aria-hidden="true">&times;</span>
                                </button>
                                <div class="input-group search_bar_small">
                                    <input type="text" class="form-control" placeholder="Search..." name="search">
                                    <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection



@section('footer_scripts')

<!--Plugin scripts-->
<script type="text/javascript" src="{{ asset('admn/vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/buttons.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admn/vendors/datatables/js/buttons.print.min.js') }}"></script>
<!--End of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{ asset('admn/js/pages/users.js') }}"></script>
<!-- end page level scripts -->
@endsection