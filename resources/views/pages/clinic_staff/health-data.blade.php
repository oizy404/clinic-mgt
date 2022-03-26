@extends('layout.master')

@section('title')
    HEALTH DATA
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

@include('shared.admin-header')
@include('shared.admin-sidenav')

        {{session('rank')}}
        <div class="main-container">
            <div class="hlth-dashboard">
                <div class="offset-md-1 health-data-addbtn">
                    <div class="col-md-4">
                        <!-- <button class="btn" id="btn-data"><i class="fas fa-plus"></i> Add Health Datum</button><br>
                        <button class="btn" id="btn-batchdata"><i class="fas fa-plus"></i> Add Batch Health Data</button> -->
                    </div>    
                    <div class="col-md-4 offset-md-3 hlth-dta">
                        <h3>PATIENT HEALTH DATA</h3>
                    </div>
                </div>
                <div class="offset-md-1 patient-role-btn">
                    <button class="btn-success" id="pr-btn1">Employee</button>
                    <button class="btn-primary" id="pr-btn2">Students</button>
                </div>
                <div class="offset-md-1 health-data">
                    <table id="health-data" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Date Recorded</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            @if($patient->archived == 0)
                            <tr>
                                <td>{{$patient->school_id}}</td>
                                <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                <td>{{$patient->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-health-data', $patient->id)}}" id="btn-record"><center><i class="far fa-edit"></i></center></a>
                                </td>
                                <td><center><i class="far fa-eye"></center></i></td>
                                <td>
                                <a href="{{route('archiveHealthData', $patient->id)}}"><center><i class="fas fa-trash-alt"></i></center></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Date Recorded</th>
                                <th>Edit</th>
                                <th>View</th>
                            </tr>
                        </tfoot>
                    </table>
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
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
      
  </script>
@stop

