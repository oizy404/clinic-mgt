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
                            <i class="fa fa-users"></i> <a href="{{route('/activity/login/logout')}}" > User Activity Logs</a>
                        </div>
                        <div class="col-md-3">
                            <i class="fa fa-plus"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#newUserAccount"> Upload Batch User</a>
                        </div>
                        <div class="col-md-4"></div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 userTable" style="margin: auto;">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">User Name</th>
                                        <th class="bg-primary text-white">Email</th>
                                        <th class="bg-primary text-white">Phone Number</th>
                                        <th class="bg-primary text-white">Role</th>
                                        <th class="bg-primary text-white text-center">Status</th>
                                        <th class="bg-primary text-white text-center">Modify User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activityLogs as $activityLog)
                                    <tr>
                                        <td>{{$activityLog->username}}</td>
                                        <td>{{$activityLog->email}}</td>
                                        <td>{{$activityLog->phone_number}}</td>
                                        <td >{{$activityLog->rank}}</td>
                                        @if($activityLog->status == null)
                                            <td class="text-center">
                                                <small class="rounded bg-warning" style="padding: 3px 12px;">N/A</small>
                                            </td>
                                        @elseif($activityLog->status == true)
                                            <td class="text-center">
                                                <small class="rounded bg-success" style="padding: 3px 6px;">{{$activityLog->status}}</small>
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{route('edit-user-details', $activityLog->id)}}" class="rounded bg-success text-dark" style="padding: 3px 10px;">Update</a>
                                            <a href="" class="rounded bg-danger text-dark" style="padding: 3px 10px;">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
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

        $('.theHealthData').click(function(){
            window.location = $(this).data("href");
        });

    });
        function confirmArchive(){
            var result = confirm("Confirm to archive All Health Evaluation Records.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }
  </script>
@stop

