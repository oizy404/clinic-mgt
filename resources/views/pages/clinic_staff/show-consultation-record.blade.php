@extends('layout.master')

@section('title')
    ADD CONSULTATION RECORD
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')
        <div class="main-container">
            <div class="add-consultation-record">
                <div class="row acr-heading">
                    <div class="col-md-3 p-head-btn">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Search Patient <i class="fas fa-search"></i></button> -->
                    </div>
                    <div class="col-md-5 offset-md-4 p-head">
                        <h3 class="mb-0">CONSULTATION FORM</h3>
                        <!-- <small>STUDENT</small> -->
                    </div>
                </div>
                <div class="" id="add-consultation-record">
                        <div class="form-group" id="health-evaluation" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-3 form-group input-group-sm">
                                    <label for=""><b>Consultation Date</b></label>
                                    <input type="text" class="form-control" value="{{$record->created_at}}">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 10px;">
                                <div class="col column1">
                                    <div class="col form-group input-group-sm">
                                        <!-- <a class="btn btn-info ml-2" data-toggle="modal" data-target="#tableModal" href="#"><i data-feather="search"></i> Search</a>   -->
                                        <label for="complete_name" class=""><b>Patient Name</b></label>
                                        <input type="text" class="form-control" name="complete_name" value="{{$record->patient->first_name}} {{$record->patient->last_name}}" id="complete_name" data-bs-toggle="modal" data-bs-target="#patientModal">
                                        <input type="hidden" class="form-control" name="id" value="{{$record->patient_id}}" id="id">
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" name="patient_role" aria-label=".form-select-sm example" id="patient_role">
                                                <option id="patient_roleval">{{$record->patient->patient_role}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" id="column2">   
                                    @if($record->patient->patient_role == 'Student')
                                        <div class="form-group" id="department">
                                            <label for="role"><b>Grade/Year Level</b></label>
                                            <select class="form-select form-select-sm" name="department" id="department-id" aria-label=".form-select-sm example">
                                                @foreach($record->position as $positionn)
                                                    <option>{{$positionn->department->department}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($positionn->department_id == '1')
                                            <div class="form-group" id="elementary">
                                                <label for="grade_level"><b>Elementary</b></label>
                                                <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                        <option selected>{{$positionn->yearlevel->grade_level}}</option>
                                                </select>
                                            </div>  
                                        @elseif($positionn->department_id == '2')
                                            <div class="form-group" id="juniorhigh">
                                                <label for="grade_level"><b>Junior High School</b></label>
                                                <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                <option selected>{{$positionn->yearlevel->grade_level}}</option>
                                                </select>
                                            </div>
                                        @elseif($positionn->department_id == '3')
                                            <div class="form-group" id="seniorhigh">
                                                <label for="grade_level"><b>Senior High School</b></label>
                                                <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                    <option selected>{{$positionn->yearlevel->grade_level}}</option>
                                                </select>
                                            </div>
                                        @elseif($positionn->department_id == '4')
                                        <div class="form-group" id="college">
                                            <label for="grade_level"><b>College</b></label>
                                            <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                <option selected>{{$positionn->yearlevel->grade_level}}</option>
                                            </select>
                                        </div>
                                        @endif
                                    @elseif($record->patient->patient_role == 'Employee')
                                        @foreach($record->position as $positionn)
                                            <div class="form-group" id="employee">
                                                <label for="role"><b>Employee</b></label>
                                                <select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">
                                                    <option selected>{{$positionn->personnel_position}}</option>
                                                </select>
                                            </div>
                                            @if($positionn->personnel_position == 'NTP')
                                            <div class="form-group" id="ntp">
                                                <label for="role"><b>Non-Teaching Personnel</b></label>
                                                <select class="form-select form-select-sm" name="personnel_rank" aria-label=".form-select-sm example">
                                                    <option selected>{{$positionn->personnel_rank}}</option>
                                                </select>
                                            </div>
                                            @elseif($positionn->personnel_position == 'TP')
                                            <div class="form-group" id="tp">
                                                <label for="role"><b>Teaching Personnel</b></label>
                                                <select class="form-select form-select-sm" name="department" aria-label=".form-select-sm example">
                                                    <option selected>{{$positionn->department->department}}</option>
                                                </select>
                                            </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3" style="border-top: 1px solid lightgray; padding-top: 10px;">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                        <textarea class="form-control" name="doctors_note" value="{{$record->doctors_note}}" id="doctors_note" cols="5" rows="7">{{$record->doctors_note}}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="height" class=""><b>Height</b></label>
                                        <input type="text" class="form-control" name="height" value="{{$record->height}}">
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for="weight" class=""><b>Weight</b></label>
                                        <input type="text" class="form-control" name="weight" value="{{$record->weight}}">
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for="bmi" class=""><b>Body Mass Index</b></label>
                                        <input type="text" class="form-control" name="bmi" value="{{$record->BMI}}">
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                                        <input type="text" class="form-control" name="bloodpressure" value="{{$record->BP}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
      
  </script>
@stop