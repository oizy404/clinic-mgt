@extends('layout.print-master')

@section('title')
    Print All Consultaion Record
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
                <div class="print-link mb-3 mt-5">
                    <div class="col-md-1 offset-md-11">
                        <a href="#" class="btn btn-success" id="printall-health-eval"><i class="fa fa-print"></i></a>
                    </div>
                </div>
                <div class="row print-acr-heading">
                    <div class="col-md-8">
                        <img src="/images/acdheader.jpg" style="width: 100%;">
                    </div>
                    <div class="col-md-4 p-head">
                        <div id="acr-heading">
                            <h3 class="mb-0" style="text-align: center;">HEALTH EVALUATION RECORDS</h3>
                        </div>
                    </div>
                </div>
@foreach($records as $record)
            <div class="show-consultation-record">
                <div class="" id="show-consultation-record">
                        <div class="form-group" id="health-evaluation" style="background-color: white;"> 
                            <div class="row mt-2 mb-1">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <p><strong>Date Recorded:</strong> {{date('F d, Y', strtotime($record->created_at))}}</p>
                                    </div>
                                </div>
                                <div class="col-md-9"></div>
                            </div>
                            <div class="row">
                                <div class="col column1">
                                    <div class="col form-group input-group-sm">
                                        <label for="complete_name" class=""><b>Patient Name</b></label>
                                        <input type="text" class="form-control" name="complete_name"  readonly="readonly" value="{{$record->patient->first_name}} {{$record->patient->last_name}}" id="complete_name" data-bs-toggle="modal" data-bs-target="#patientModal">
                                        <input type="hidden" class="form-control" name="id" value="{{$record->patient_id}}" id="id">
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" name="patient_role" aria-label=".form-select-sm example"  readonly="readonly" id="patient_role">
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
                                                    <option value="{{$positions->department_id}}" readonly="readonly">{{$positions->department->department}}</option>
                                                </select>
                                            </div>
                                            @if($positions->department_id == "1")
                                                <div class="form-group" id="elementary">
                                                    <label for="grade_level"><b>Elementary</b></label>
                                                    <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                    </select>
                                                </div>
                                
                                            @elseif($positions->department_id == "2")
                                                <div class="form-group" id="juniorhigh">
                                                    <label for="grade_level"><b>Junior High School</b></label>
                                                    <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                    </select>
                                                </div>
                                            @elseif($positions->department_id == "3")
                                                <div class="form-group" id="seniorhigh">
                                                    <label for="grade_level"><b>Senior High School</b></label>
                                                    <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                    </select>
                                                </div>
                                            
                                            @elseif($positions->department_id == "4")
                                                <div class="form-group" id="college">
                                                    <label for="grade_level"><b>College</b></label>
                                                    <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                    </select>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($record->patient->patient_role == "Employee")
                                        @foreach($record->position as $positions)
                                            @if($record->patient->employee_status == "NTP")
                                                <div class="form-group" id="employee">
                                                    <label for="role"><b>Employee Status</b></label>
                                                    <select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">
                                                        <option>Non-Teaching Personnel</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="ntp">
                                                    <label for="role"><b>Non-Teaching Personnel</b></label>
                                                    <select class="form-select form-select-sm" name="personnel_rank" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->personnel_rank}}" readonly="readonly">{{$positions->personnel_rank}}</option>
                                                    </select>
                                                </div>
                                            @elseif($record->patient->employee_status == "TP")
                                                <div class="form-group" id="employee">
                                                    <label for="role"><b>Employee Status</b></label>
                                                    <select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">
                                                        <option>Teaching Personnel</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="tp">
                                                    <label for="role"><b>Teaching Department</b></label>
                                                    <select class="form-select form-select-sm" name="department" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->department_id}}" readonly="readonly">{{$positions->department->department}}</option>
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
                                                <input type="text" class="form-control" name="height" value="{{$record->height}}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="weight" class=""><b>Weight</b></label>
                                                <input type="text" class="form-control" name="weight" value="{{$record->weight}}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="temperature"><b>Temperature</b></label>
                                                <input type="text" class="form-control" name="temperature" value="{{$record->temperature}}" readonly="readonly">
                                            </div>
                                        </div>          
                                    </div>
                                    <div class="row">                              
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="bmi" class=""><b>Body Mass Index</b></label>
                                                <input type="text" class="form-control" name="bmi" value="{{$record->BMI}}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                                                <input type="text" class="form-control" name="bloodpressure" value="{{$record->BP}}" readonly="readonly"> 
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
                                    <div class="form-group">
                                        <input type="checkbox" name="complaints[]" value="1" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 1 ? ' checked' : '') }}
                                            @endforeach
                                            > Head Ache<br>
                                        <input type="checkbox" name="complaints[]" value="2" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 2 ? ' checked' : '') }}
                                            @endforeach
                                            > Stomach Ache<br>
                                        <input type="checkbox" name="complaints[]" value="3" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 3 ? ' checked' : '') }}
                                            @endforeach
                                            > Tooth Ache<br>
                                        <input type="checkbox" name="complaints[]" value="4" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 4 ? ' checked' : '') }}
                                            @endforeach
                                            > Difficulty Breathing<br>
                                        <input type="checkbox" name="complaints[]" value="5" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 5 ? ' checked' : '') }}
                                            @endforeach
                                            > Abdominal Pain<br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="complaints[]" value="6" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 6 ? ' checked' : '') }}
                                            @endforeach
                                            > Fever<br>
                                        <input type="checkbox" name="complaints[]" value="7" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 7 ? ' checked' : '') }}
                                            @endforeach
                                            > Dizziness<br>
                                        <input type="checkbox" name="complaints" value="8" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 8 ? ' checked' : '') }}
                                            @endforeach
                                            > Dysmenorrhea<br>
                                        <input type="checkbox" name="complaints[]" value="9" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 9 ? ' checked' : '') }}
                                            @endforeach
                                            > Diarhea<br>
                                        <input type="checkbox" name="complaints[]" value="10" onclick="return false"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 10 ? ' checked' : '') }}
                                            @endforeach
                                            > Vomiting
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    @foreach($record->otherComplaint as $other_complaint)
                                    <div class="form-group input-group-sm">
                                        <label for="othercomplaints"><b>Others: Please Specify</b></label>
                                        <input type="text" class="form-control" name="other_complaint" value="{{$other_complaint->other_chief_complaint}}" readonly="readonly">
                                    </div>
                                    @endforeach
                                </div>
                            </div> 
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                        <textarea class="form-control" name="doctors_note" id="doctors_note" cols="10" rows="2" readonly="readonly">{{$record->doctors_note}}</textarea>
                                    </div>
                                    <div class="form-group input-group-sm mt-2">
                                        <label for="doctors_name"><b>Doctor's Complete Name</b></label>
                                        <input type="text" name="doctors_name" class="form-control" value="{{$record->doctors_name}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="nurse_note" class=""><b>Nurse Notes</b></label>
                                        <textarea class="form-control" name="nurse_note" id="nurse_note" cols="10" rows="2" readonly="readonly">{{$record->nurse_note}}</textarea>
                                    </div>
                                    <div class="form-group input-group-sm mt-2">
                                        <label for="nurse_name"><b>Nurse Complete Name</b></label>
                                        <input type="text" name="nurse_name" class="form-control" value="{{$record->nurse_name}}" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            @if($record->followupCheckup)
                                <div class="form-group input-group-sm mt-2">
                                    <label for=""><b>Follow Up Check Up Schedule</b></label>
                                    <input type="date" name="nextCheckup" class="form-control" value="{{$record->followupCheckup}}" readonly="readonly">
                                </div>
                            @else
                                <div class="form-group input-group-sm mt-2">
                                    <label for=""><b>Follow Up Check Up Schedule</b></label>
                                    <input type="text" name="nextCheckup" class="form-control" value="N/A" readonly="readonly">
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
@endforeach
    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>

    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });
    $('#printall-health-eval').click(function(){
        $('#printall-health-eval').hide();
        window.print();
    })

    });
  </script>
@stop