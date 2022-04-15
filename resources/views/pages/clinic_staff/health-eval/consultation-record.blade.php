@extends('layout.doctor-master1')

@section('title')
    Consultation Record
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
            <div class="consultation-record-dashboard">
                <div class="offset-md-1 consultation-record-addbtn">
                    <div class="col-md-4">
                        <!-- <button class="btn" id="btn-record"><i class="fas fa-plus"></i> Add Consultation Datum</button><br> -->
                        <button class="btn btn-info mt-1" id="btn-batchrecord"><i class="fas fa-plus"></i> Upload Batch Record</button>
                    </div>    
                    <div class="col-md-5 offset-md-3 consultation-record">
                        <h3>CONSULTATION RECORD</h3>
                    </div>
                </div>
                <div class="offset-md-1 consultation-records">
                    <table id="consultation-record" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">ID Number</th>
                                <th class="bg-primary text-white">Name</th>
                                <th class="bg-primary text-white">Role</th>
                                <th class="bg-primary text-white text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            @if($record->first()->archived == 0)
                            <tr class="theRecord" data-href="">
                                <td>{{$record->first()->patient->school_id}}</td>
                                <td>{{$record->first()->patient->last_name}}, {{$record->first()->patient->first_name}}</td>
                                <td>{{$record->first()->patient->patient_role}}</td>
                                <td class="text-center">
                                    <a href="{{route('show-consultation-record', $record->first()->patient_id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('archiveAll-consultation-record', $record->first()->patient_id)}}" onclick="confirmArchive()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
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

        $('.theRecord').click(function(){
            window.location = $(this).data("href");
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
