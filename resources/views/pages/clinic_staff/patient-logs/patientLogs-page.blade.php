@extends('layout.clinicstaff-master1')

@section('title')
    Patients Health Data
@stop

@section('content')
<style>
    .add-data{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px; 
        right:40px;
        background-color: #006dff;
        color: #ffffff;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        
    }
    .add-data i{
        margin-top:22px;
    }
    #userdash-header hr{
        margin-top: 0px;
    }
    #userdash-subhead a{
        color: #0266ea;
    }
    #userdash-subhead i{
        color: #1067d8;
        font-size: 22px;
    }
</style>

        {{session('rank')}}
        <div class="main-container">
            <div class="row mb-1" id="userdash-header">
                <div class="col-md-11" style="margin: auto;">
                    <div class="col-md-5">
                        <h5>User Management Dasboard</h5>
                    </div>
                    <div class="col-md-6"></div>  
                    <hr>
                </div>
            </div>
            <div class="row mb-4" id="userdash-subhead">
                <div class="col-md-11" style="margin: auto;">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-users"></i> <a href="{{route('/activity/login/logout')}}"> User Activity Logs</a>
                        </div>
                        <div class="col-md-3">
                            <i class="fa fa-plus"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#uploadUserAccount"> Upload Batch User</a>
                        </div>
                        <div class="col-md-4"></div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 userTable" style="margin: auto;">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Active Patient Users</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Inactive Patient Users</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card border border-top-0">
                                <div class="card-body mt-3">
                                    <table class="table table-hover" id="userTable">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white">User Name</th>
                                                <th class="bg-primary text-white">Email</th>
                                                <th class="bg-primary text-white">Role</th>
                                                <!-- <th class="bg-primary text-white text-center">Status</th> -->
                                                <th class="bg-primary text-white text-center">Modify User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activityLogs as $activityLog)
                                            @if($activityLog->archived == 0)
                                            <tr>
                                                <td>{{$activityLog->username}}</td>
                                                <td>{{$activityLog->email}}</td>
                                                <td >{{$activityLog->rank}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('edit-user-details', $activityLog->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#archiveUser"><i class="fas fa-trash-alt"></i></button>
                                        
                                                    <!-- Archive Modal -->
                                                    <div class="modal fade" id="archiveUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="row mb-1" style="text-align: left;">
                                                                        <p>Confirm To Archive Patient User Account.</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col"></div>
                                                                        <div class="col-md-4">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                                        <a href="{{route('archive-user-details', $activityLog->id)}}" class="btn btn-danger btn-sm">Archive</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card border border-top-0">
                                <div class="card-body mt-3">
                                    <table class="table table-hover" id="inactiveUserTable">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white">User Name</th>
                                                <th class="bg-primary text-white">Email</th>
                                                <th class="bg-primary text-white">Role</th>
                                                <!-- <th class="bg-primary text-white text-center">Status</th> -->
                                                <th class="bg-primary text-white text-center">Modify User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activityLogs as $activityLog)
                                            @if($activityLog->archived == 1)
                                            <tr>
                                                <td>{{$activityLog->username}}</td>
                                                <td>{{$activityLog->email}}</td>
                                                <td >{{$activityLog->rank}}</td>
                                                <td class="text-center">

                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#restoreUser"><i class="fa fa-arrow-rotate-left"></i></button>
                                        
                                                    <!-- Restore Modal -->
                                                    <div class="modal fade" id="restoreUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="row mb-1" style="text-align: left;">
                                                                        <p>Confirm To Restore Patient User Account.</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col"></div>
                                                                        <div class="col-md-4">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                                        <a href="{{route('restore-user-details', $activityLog->id)}}" class="btn btn-danger btn-sm">Restore</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser"><i class="fas fa-trash-alt"></i></button>
                                        
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="row mb-1" style="text-align: left;">
                                                                        <p>Confirm To Permanently Delete Patient User Account.</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col"></div>
                                                                        <div class="col-md-4">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                                        <a href="{{route('delete-user-details', $activityLog->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create User Modal -->
        <div class="modal fade" id="newUserAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Create User Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('create/account')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <div class="form-group input-group-sm">
                                <label for="username"><strong>User Name</strong></label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group input-group-sm">
                                <label for="email"><strong>Email</strong></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group input-group-sm">
                                <label for="password"><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Upload User Modal -->
        <div class="modal fade" id="uploadUserAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Batch User Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('user.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <div class="form-group input-group-sm">
                                <label for="file">Choose CSV File</label>
                                <input type="file" id="img" name="file" class="form-control"><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <a href="" class="add-data" data-bs-toggle="modal" data-bs-target="#newUserAccount">
            <i class="fas fa-plus"></i>
        </a>
    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        // $('.theHealthData').click(function(){
        //     window.location = $(this).data("href");
        // });

    });
  </script>
@stop

