@extends('layout.doctor-master1')

@section('title')
    Edit Consultaion Record
@stop

@section('content')
<style>
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
            <div class="col-md-2 offset-md-10 mb-4">
                <a href="{{route('doctor/printAll/consultation-record', $patient_id)}}" id="print-healtheval-data"><i class="fa fa-print"></i>&nbsp Print All Record</i></a>
            </div>
        </div>
        @foreach($records as $record)
        <div class="row mb-3">
            <div class="col-md-10 con-rec">
                <div class="show1-consultation-record">
                    <div class="row acr-heading">
                        <div class="col-md-2 p-head-btn">
                        </div>
                        <div class="col-md-6 offset-md-4 p-head">
                            <h3 class="mb-0">CONSULTATION RESULT</h3>
                        </div>
                    </div>
                    <div class="" id="show1-consultation-record">
                        <form action="" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group" id="health-evaluation" style="background-color: white;"> 
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <p><strong>Date Recorded:</strong> {{date('F d, Y', strtotime($record->created_at))}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <div class="row">
                                    <div class="col column1">
                                        <div class="col form-group input-group-sm">
                                            <label for="complete_name" class=""><b>Patient Name</b></label>
                                            <input type="text" class="form-control" name="complete_name" value="{{$record->patient->first_name}} {{$record->patient->last_name}}" id="complete_name" data-bs-toggle="modal" data-bs-target="#patientModal">
                                            <input type="hidden" class="form-control" name="id" value="{{$record->patient_id}}" id="id">
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="role"><b>Patient Role</b></label>
                                                <select class="form-select form-select-sm" name="patient_role" aria-label=".form-select-sm example" id="patient_role">
                                                    <option value="{{$record->patient->patient_role}}">{{$record->patient->patient_role}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" id="column2">
                                        @if($record->patient->patient_role == "Student")
                                            @foreach($record->position as $positions)
                                                <div class="form-group" id="department">
                                                    <label for="role"><b>Grade/Year Level</b></label>
                                                    <select class="form-select form-select-sm" name="department" id="department-id" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->department_id}}">{{$positions->department->department}}</option>
                                                    </select>
                                                </div>
                                                @if($positions->department_id == "1")
                                                    <div class="form-group" id="elementary">
                                                        <label for="grade_level"><b>Elementary</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                    
                                                @elseif($positions->department_id == "2")
                                                    <div class="form-group" id="juniorhigh">
                                                        <label for="grade_level"><b>Junior High School</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                                @elseif($positions->department_id == "3")
                                                    <div class="form-group" id="seniorhigh">
                                                        <label for="grade_level"><b>Senior High School</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                                
                                                @elseif($positions->department_id == "4")
                                                    <div class="form-group" id="college">
                                                        <label for="grade_level"><b>College</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @elseif($record->patient->patient_role == "Employee")
                                            @foreach($record->position as $positions)
                                                <div class="form-group" id="employee">
                                                    <label for="role"><b>Employee</b></label>
                                                    <select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">
                                                        <option value="{{$positions->personnel_position}}">{{$positions->personnel_position}}</option>
                                                    </select>
                                                </div>
                                                @if($positions->personnel_position == "NTP")
                                                    <div class="form-group" id="ntp">
                                                        <label for="role"><b>Non-Teaching Personnel</b></label>
                                                        <select class="form-select form-select-sm" name="personnel_rank" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->personnel_rank}}">{{$positions->personnel_rank}}</option>
                                                        </select>
                                                    </div>
                                                @elseif($positions->personnel_position == "TP")
                                                    <div class="form-group" id="tp">
                                                        <label for="role"><b>Teaching Personnel</b></label>
                                                        <select class="form-select form-select-sm" name="department" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->department_id}}">{{$positions->department->department}}</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group input-group-sm">
                                                    <label for="height" class=""><b>Height</b></label>
                                                    <input type="text" class="form-control" name="height" value="{{$record->height}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group input-group-sm">
                                                    <label for="weight" class=""><b>Weight</b></label>
                                                    <input type="text" class="form-control" name="weight" value="{{$record->weight}}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group input-group-sm">
                                                    <label for="temperature"><b>Temperature</b></label>
                                                    <input type="text" class="form-control" name="temperature" value="{{$record->temperature}}">
                                                </div>
                                            </div>          
                                        </div>
                                        <div class="row">                              
                                            <div class="col">
                                                <div class="form-group input-group-sm">
                                                    <label for="bmi" class=""><b>Body Mass Index</b></label>
                                                    <input type="text" class="form-control" name="bmi" value="{{$record->BMI}}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group input-group-sm">
                                                    <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                                                    <input type="text" class="form-control" name="bloodpressure" value="{{$record->BP}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group mt-2">
                                    <label for="chief-complaints"><b>Chief Complaints</b></label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        @foreach($chief_complaints as $chief_complaint)
                                            @if($chief_complaint->id >=1 && $chief_complaint->id <= 5)
                                            <div class="form-group input-group-sm">
                                                <input type="checkbox" name="complaints[]" value="{{$chief_complaint->id}}"
                                                    @foreach($record->complaint as $complaints)
                                                        <?php
                                                            if( in_array($chief_complaint->id, $complaints->pluck('chief_complaints_id')->toArray())){
                                                                echo 'checked="checked"'; 
                                                            }
                                                        ?>
                                                    @endforeach
                                                >
                                                {{ $chief_complaint->chief_complaint }}
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            @foreach($chief_complaints as $chief_complaint)
                                                @if($chief_complaint->id >= 6 && $chief_complaint->id <= 10)
                                                <div class="form-group input-group-sm">
                                                    <input type="checkbox" name="complaints[]" value="{{$chief_complaint->id}}"
                                                        @foreach($record->complaint as $complaints)
                                                            <?php
                                                                if( in_array($chief_complaint->id, $complaints->pluck('chief_complaints_id')->toArray())){
                                                                    echo 'checked="checked"'; 
                                                                }
                                                            ?>
                                                        @endforeach
                                                    >
                                                    {{ $chief_complaint->chief_complaint }}
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col">
                                        @foreach($record->otherComplaint as $other_complaint)
                                        <div class="form-group input-group-sm">
                                            <label for="othercomplaints"><b>Others: Please Specify</b></label>
                                            <input type="text" class="form-control" name="other_complaint" value="{{$other_complaint->other_chief_complaint}}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div> 
                                <hr>
                                <div class="form-group mt-2">
                                    <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                    <textarea class="form-control" name="doctors_note" id="doctors_note" cols="10" rows="2">{{$record->doctors_note}}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nurse_note" class=""><b>Nurse Notes</b></label>
                                    <textarea class="form-control" name="nurse_note" id="nurse_note" cols="10" rows="2">{{$record->nurse_note}}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 con-rec-printOne">
                <div class="form-group">
                    <a href="{{route('doctor/print/health-eval', $record->id)}}" class="btn btn-success" id="con-rec-printOne"><i class="fa fa-print"></i></a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <a href="{{route('doctor/archive/   consultation-record', $record->id)}}" onclick="confirmArchive()" class="btn btn-danger" ><center><i class="fas fa-trash-alt"></i></center></a>
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