@extends('layout.clinicstaff-master1')

@section('title')
    View Consultaion Record
@stop

@section('content')
<style>
    .con-rec p{
        margin: 0px;
    }
    .dropdown-check-list {
        display: inline-block;
    }

    .dropdown-check-list .anchor {
        position: relative;
        cursor: pointer;
        display: inline-block;
        padding: 3px 140px 3px 140px;
        border: 1px solid #complaintsc;
        border-radius: 2px;
    }

    .dropdown-check-list .anchor:after {
        position: absolute;
        content: "";
        border-left: 2px solid black;
        border-top: 2px solid black;
        padding: 5px;
        right: 10px;
        top: 20%;
        -moz-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        -o-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }
    .dropdown-check-list .anchor:active:after {
        right: 8px;
        top: 21%;
    }

    .dropdown-check-list ul.items {
        padding: 2px;
        display: none;
        margin: 0;
        border: 1px solid #complaintsc;
        border-top: none;
    }

    .dropdown-check-list ul.items li {
        list-style: none;
    }

    .dropdown-check-list.visible .anchor {
        color: #0094ff;
    }

    .dropdown-check-list.visible .items {
        display: block;
    }
</style>

    <div class="main-container">
        <div class="print-healtheval-data">
            <div class="col-md-3 offset-md-9 mb-4">
                <a href="{{route('doctor/printVisitorAll/consultation-record', $visitor_id)}}" id="print-healtheval-data" style="margin-left: 40px;"><i class="fa fa-print"></i>&nbsp Print All Record</i></a>
            </div>
        </div>
        @foreach($records as $record)
        <div class="row mb-3" style="padding: 0px 50px 0px 50px;">
            <div class="col-md-10 con-rec">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Date Recorded: </strong>{{$record->eval_date}}</p>
                        <div class="row">
                            <div class="col">
                                <p><strong>Patient Name: </strong>{{$record->visitor->first_name}} {{$record->visitor->last_name}}</p>
                            
                                @if($record->followupCheckup)
                                    <p><strong>Follow Up Check Up Date: </strong>{{date('F d, Y', strtotime($record->followupCheckup))}}</p>
                                @else
                                    <p><strong>Follow Up Check Up Date: </strong>N/A</p>
                                @endif
                            </div>
                            <div class="col">
                                @if($record->doctors_name)
                                    <p><strong>Evaluated by:</strong> Dr. {{$record->doctors_name}}</p>
                                @elseif($record->nurse_name)
                                    <p><strong>Evaluated by:</strong> Nurse {{$record->nurse_name}}</p>
                                @endif
                                <a href="{{route('doctor/editVisitor/consultation-record', $record->id)}}"><i class="fa fa-edit"></i> Edit Evaluation</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-1 con-rec-printOne">
                <div class="form-group">
                    <a href="{{route('doctor/print/consultation-record', $record->id)}}" class="btn btn-success btn-sm" id="con-rec-printOne"><i class="fa fa-print"></i></a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <a href="{{route('doctor/archive/consultation-record', $record->id)}}" onclick="confirmArchive()" class="btn btn-danger btn-sm" ><center><i class="fas fa-trash-alt"></i></center></a>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>

    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });
    });

    function confirmArchive(){
        var result = confirm("Confirm to archive Health Evaluation Record.");
        if (result != true) {
            event.preventDefault();
            returnToPreviousPage();
            return false;
        }
        return true;
    }
  </script>
@stop