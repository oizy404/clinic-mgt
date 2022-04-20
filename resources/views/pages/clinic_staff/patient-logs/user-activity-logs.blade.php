@extends('layout.clinicstaff-master1')

@section('title')
    Patients Health Data
@stop

@section('content')
<style>
    
    #act-header hr{
        margin-top: 0px;
    }
    #act-subhead a{
        color: #0266ea;
    }
    #act-subhead i{
        color: #1067d8;
        font-size: 20px;
    }
</style>
        {{session('rank')}}
        <div class="main-container">
            <div class="row mb-3" id="act-header">
                <div class="col-md-11" style="margin: auto;">
                    <div class="col-md-5">
                        <h5>User Activity Logs</h5>
                    </div>
                    <div class="col-md-6"></div>  
                    <hr style="margin-top: 0px;">
                </div>
            </div>
            <div class="row mb-4" id="act-subhead">
                <div class="col-md-11" style="margin: auto;">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-print"></i> <a href="" > Print Activity Logs</a>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-4"></div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 userTable" style="margin: auto;">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">User Name</th>
                                        <th class="bg-primary text-white">Email</th>
                                        <th class="bg-primary text-white">Description</th>
                                        <th class="bg-primary text-white">Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activityLogs as $activityLog)
                                    <tr>
                                        <td>{{$activityLog->user_name}}</td>
                                        <td>{{$activityLog->email}}</td>
                                        <td>{{$activityLog->description}}</td>
                                        <td>{{$activityLog->date_time}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

