@extends('layout.master')

@section('title')
    CONSULTATION RECORD
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
@include('shared.doctor-sidenav')

        {{session('rank')}}
        <div class="main-container">
            <div class="consultation-record-dashboard">
                <div class="offset-md-1 consultation-record-addbtn">
                    <div class="col-md-4">
                        <!-- <button class="btn" id="btn-record"><i class="fas fa-plus"></i> Add Consultation Datum</button><br> -->
                        <button class="btn mt-1" id="btn-batchrecord"><i class="fas fa-plus"></i> Add Batch Consultation Record</button>
                    </div>    
                    <div class="col-md-5 offset-md-3 consultation-record">
                        <h3>CONSULTATION RECORD</h3>
                    </div>
                </div>
                <div class="offset-md-1 consultation-records">
                    <table id="consultation-record" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Date Recorded</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            @if($record->archived == 0)
                            <tr>
                                <td>{{$record->patient->school_id}}</td>
                                <td>{{$record->patient->last_name}}, {{$record->patient->first_name}}</td>
                                <td>{{$record->patient->patient_role}}</td>
                                <td>{{$record->created_at}}</td>
                                <td><a href="{{route('edit-consultation-record', $record->id)}}"><i class="far fa-edit"></i></a></td>
                                <td><a href="{{route('show-consultation-record', $record->id)}}"><i class="far fa-eye"></i></a></td>
                                <td>
                                    <a href="{{route('archive-consultation-record', $record->id)}}"><center><i class="fas fa-trash-alt"></i></center></a>
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
        <a href="{{route('add-consultation-record')}}" class="add-data">
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
