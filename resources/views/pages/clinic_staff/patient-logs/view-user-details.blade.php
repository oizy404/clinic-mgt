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
</style>

        {{session('rank')}}
        <div class="main-container">
            <div class="col-md-11" style="margin: auto">
                <div class="row">
                    <div class="col-md-4">
                        <h5>User Details</h5>
                    </div>
                </div>
                <hr style="margin-top: 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Update User Details
                            </div>
                            
                            <form action="{{route('update-user-details', $activityLog->id)}}" method="post">
                                @csrf
                                @method('post')  
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm mb-3">
                                                <label for="user_name"><strong>User Name</strong></label>
                                            </div>
                                            <div class="form-group input-group-sm mb-3">
                                                <label for="email"><strong>Email Address</strong></label>
                                            </div>
                                            <div class="form-group input-group-sm mb-3">
                                                <label for="phone_number"><strong>Phone Number</strong></label>
                                            </div>
                                            <div class="form-group input-group-sm mb-3">
                                                <label for="status"><strong>Status</strong></label>
                                            </div>
                                            <div class="form-group input-group-sm mb-3">
                                                <label for="Role"><strong>Role</strong></label>
                                            </div>
                                        </div>
                                        <div class="col">       
                                            <div class="form-group input-group-sm mb-2">
                                                <input type="text" class="form-control" name="username" value="{{$activityLog->username}}">
                                            </div>
                                            <div class="form-group input-group-sm mb-2">
                                                <input type="text" class="form-control" name="email" value="{{$activityLog->email}}">
                                            </div>
                                            <div class="form-group input-group-sm mb-2">
                                                <input type="text" class="form-control" name="phone_number" value="{{$activityLog->phone_number}}">
                                            </div>
                                            <div class="form-group input-group-sm mb-2">
                                                <input type="text" class="form-control" name="status" value="{{$activityLog->status}}">
                                            </div>
                                            <div class="form-group input-group-sm mb-2">
                                                <input type="text" class="form-control" name="rank" value="{{$activityLog->rank}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer bg-white" style="border-top: none;">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
                                    <button type="button" class="btn btn-danger">Back</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>


        <a href="{{route('add-health-data')}}" class="add-data">
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

