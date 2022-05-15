@extends('layout.clinicstaff-master1')

@section('title')
    Update Consultaion Record
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
            <div class="add-consultation-record">
                <div class="row acr-heading">
                    <div class="col-md-3 p-head-btn">
                    </div>
                    <div class="col-md-5 offset-md-4 p-head">
                        <h3 class="mb-0">CONSULTATION FORM</h3>
                    </div>
                </div>
                <div class="" id="add-consultation-record">
                    <form action="{{route('clinicstaff/update/consultation-record', $record->id)}}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group" id="health-evaluation" style="background-color: white;"> 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <p><strong>Date Recorded:</strong> {{$record->eval_date}}</p>
                                    </div>
                                </div>
                                <div class="col-md-7"></div>
                            </div>
                            <div class="row">
                                <div class="col column1">
                                    <div class="col form-group input-group-sm">
                                        <label for="complete_name" class=""><b>Patient Name</b></label>
                                        <input type="text" class="form-control" name="complete_name" id="complete_name" value="{{$record->patient->first_name}} {{$record->patient->last_name}}" data-bs-toggle="modal" data-bs-target="#patientModal">
                                        <input type="hidden" class="form-control" name="id" value="{{$record->patient_id}}" id="id">
                                    </div>
                                    <div class="col form-group input-group-sm" id="employeeStatColumn">
                                        <label for="patient_status" class=""><b>Patient Status</b></label>
                                        <input type="text" class="form-control" id="patient_status" value="{{$record->patient->patient_role}}">
                                    </div>
                                </div>
                                <div class="col" id="column2">  
                                    
                                        @if($record->patient->patient_role == "Student")
                                            @foreach($record->position as $positions)
                                                <div class="form-group" id="department">
                                                    <label for="role"><b>Department</b></label>
                                                    <select class="form-select form-select-sm" name="department" id="department-id" aria-label=".form-select-sm example">
                                                        <option value="{{$positions->department_id}}" readonly="readonly">{{$positions->department->department}}</option>
                                                    </select>
                                                </div>
                                                @if($positions->department_id == "1")
                                                    <div class="form-group" id="elementary">
                                                        <label for="grade_level"><b>Grade Level</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                    
                                                @elseif($positions->department_id == "2")
                                                    <div class="form-group" id="juniorhigh">
                                                        <label for="grade_level"><b>Grade Level</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                                @elseif($positions->department_id == "3")
                                                    <div class="form-group" id="seniorhigh">
                                                        <label for="grade_level"><b>Grade Level</b></label>
                                                        <select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">
                                                            <option value="{{$positions->yearLevel_id}}" readonly="readonly">{{$positions->yearlevel->grade_level}}</option>
                                                        </select>
                                                    </div>
                                                
                                                @elseif($positions->department_id == "4")
                                                    <div class="form-group" id="college">
                                                        <label for="grade_level"><b>Year Level</b></label>
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
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group input-group-sm">
                                                        <label for="height" class=""><b>Height <small><i>(in m)</i></small></b></label>
                                                        <input type="text" class="form-control" name="height" value="{{$record->height}}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group input-group-sm">
                                                        <label for="weight" class=""><b>Weight <small><i>(in kg)</i></small></b></label>
                                                        <input type="text" class="form-control" name="weight"  value="{{$record->weight}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                                                <input type="text" class="form-control" name="bloodpressure" value="{{$record->BP}}">
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
                                                <label for="temperature"><b>Temperature</b></label>
                                                <input type="text" class="form-control" name="temperature" value="{{$record->temperature}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="chief-complaints"><b>Chief Complaints</b></label>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="complaints[]" value="1"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 1 ? ' checked' : '') }}
                                            @endforeach
                                            > Head Ache<br>
                                        <input type="checkbox" name="complaints[]" value="2"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 2 ? ' checked' : '') }}
                                            @endforeach
                                            > Stomach Ache<br>
                                        <input type="checkbox" name="complaints[]" value="3"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 3 ? ' checked' : '') }}
                                            @endforeach
                                            > Tooth Ache<br>
                                        <input type="checkbox" name="complaints[]" value="4"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 4 ? ' checked' : '') }}
                                            @endforeach
                                            > Difficulty Breathing<br>
                                        <input type="checkbox" name="complaints[]" value="5"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 5 ? ' checked' : '') }}
                                            @endforeach
                                            > Abdominal Pain<br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="complaints[]" value="6"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 6 ? ' checked' : '') }}
                                            @endforeach
                                            > Fever<br>
                                        <input type="checkbox" name="complaints[]" value="7"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 7 ? ' checked' : '') }}
                                            @endforeach
                                            > Dizziness<br>
                                        <input type="checkbox" name="complaints" value="8"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 8 ? ' checked' : '') }}
                                            @endforeach
                                            > Dysmenorrhea<br>
                                        <input type="checkbox" name="complaints[]" value="9"
                                            @foreach($record->complaint as $complaints)
                                                {{ ($complaints->chief_complaints_id == 9 ? ' checked' : '') }}
                                            @endforeach
                                            > Diarhea<br>
                                        <input type="checkbox" name="complaints[]" value="10"
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
                                        <input type="text" class="form-control" name="other_complaint" value="{{$other_complaint->other_chief_complaint}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                        <textarea class="form-control" name="doctors_note" id="doctors_note" cols="10" rows="2">{{$record->doctors_note}}</textarea>
                                    </div>
                                    <div class="form-group input-group-sm mt-2">
                                        <label for="doctors_name"><b>Doctor's Complete Name</b></label>
                                        <input type="text" name="doctors_name" class="form-control" value="{{$record->doctors_name}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="nurse_note" class=""><b>Nurse Notes</b></label>
                                        <textarea class="form-control" name="nurse_note" id="nurse_note" cols="10" rows="2">{{$record->nurse_note}}</textarea>
                                    </div>
                                    <div class="form-group input-group-sm mt-2">
                                        <label for="nurse_name"><b>Nurse Complete Name</b></label>
                                        <input type="text" name="nurse_name" class="form-control" value="{{$record->nurse_name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group input-group-sm mt-2">
                                <label for=""><b>Follow Up Check Up Schedule</b></label>
                                <input type="date" name="nextCheckup" class="form-control" value="{{$record->followupCheckup}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-add-consultation">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Student</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Employee</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Visitor</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
                                <table class="table table-hover table-bordered" style="width:100%" id="studentModal-table">
                                    <thead>
                                        <tr>
                                            <th style="display:none">ID</th>
                                            <th class="bg-info text-dark">ID Number</th>
                                            <th class="bg-info text-dark">Name</th>
                                            <th class="bg-info text-dark">Patient Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            @if($patient->patient_role == "Student" && $patient->archived == 0)
                                            <tr class="theStudentData">
                                                <td style="display: none">{{$patient->id}}</td>
                                                <td>{{$patient->school_id}}</td>
                                                <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                                <td>{{$patient->patient_role}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
                                <table class="table table-hover table-bordered" style="width:100%" id="employeeModal-table">
                                    <thead>
                                        <tr>
                                            <th style="display:none">ID</th>
                                            <th class="bg-info text-dark">ID Number</th>
                                            <th class="bg-info text-dark">Name</th>
                                            <th class="bg-info text-dark">Patient Status</th>
                                            <th class="bg-info text-dark">Employee Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            @if($patient->patient_role == "Employee" && $patient->archived == 0)
                                            <tr class="theEmployeeData">
                                                <td style="display: none">{{$patient->id}}</td>
                                                <td>{{$patient->school_id}}</td>
                                                <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                                <td>{{$patient->patient_role}}</td>
                                                <td>{{$patient->employee_status}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
                                <table class="table table-hover table-bordered" style="width:100%" id="visitorModal-table">
                                    <thead>
                                        <tr>
                                            <th style="display:none">ID</th>
                                            <th class="bg-info text-dark">Name</th>
                                            <th class="bg-info text-dark">Patient Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($visitors as $visitor)
                                            @if($visitor->patient_role == "Visitor" && $visitor->archived == 0)
                                            <tr class="theVisitorData">
                                                <td style="display: none">{{$visitor->id}}</td>
                                                <td>{{$visitor->last_name}}, {{$visitor->first_name}}</td>
                                                <td>{{$visitor->patient_role}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

        $('#studentModal-table').DataTable();
        $('#employeeModal-table').DataTable();
        $('#visitorModal-table').DataTable();

        $('.theStudentData').click(function(){
            var id =  $(this).find(":first-child").text();
            var complete_name =  $(this).find(":first-child").next().next().text();
            var role = $(this).find(":first-child").next().next().next().text();
            $('#patientModal').modal('hide');
            $('#id').val(id);
            $('#complete_name').val(complete_name);
            $('#patient_role').val(role);

            
            $('#tpEmployeeStat').remove();
            $('#ntpEmployeeStat').remove();
            $('#tp').remove();
            $('#ntp').remove();

            if(role == "Student"){
                $('#employeeStatColumn').append(
                    '<div class="form-group" id="department">'+
                        '<label for="role"><b>Department</b></label>'+
                        '<select class="form-select form-select-sm" name="department" id="department-id" aria-label=".form-select-sm example">'+
                            '<option selected>-- Select Grade --</option>'+
                            '<option value="1">Elementary</option>'+
                            '<option value="2">Junior High School</option>'+
                            '<option value="3">Senior High School</option>'+
                            '<option value="4">College</option>'+
                        '</select>'+
                    '</div>'
                );
                $('#department-id').change(function(){
                    if($(this).val()=="1"){
                        $('#column2').append(
                            '<div class="form-group" id="elementary">'+
                                '<label for="grade_level"><b>Elementary</b></label>'+
                                '<select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">'+
                                    '<option selected>-- Select Grade --</option>'+
                                    '<option value="1">Kinder</option>'+
                                    '<option value="2">Grade 1</option>'+
                                    '<option value="3">Grade 2</option>'+
                                    '<option value="4">Grade 3</option>'+
                                    '<option value="5">Grade 4</option>'+
                                    '<option value="6">Grade 5</option>'+
                                    '<option value="7">Grade 6</option>'+
                                '</select>'+
                            '</div>'
                        )
                    $('#juniorhigh').remove();
                    $('#seniorhigh').remove();
                    $('#college').remove();
                    }
                    else if($(this).val()=="2"){
                        $('#column2').append(
                            '<div class="form-group" id="juniorhigh">'+
                                '<label for="grade_level"><b>Junior High School</b></label>'+
                                '<select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">'+
                                    '<option selected>-- Select Grade --</option>'+
                                    '<option value="8">Grade 7</option>'+
                                    '<option value="9">Grade 8</option>'+
                                    '<option value="10">Grade 9</option>'+
                                    '<option value="11">Grade 10</option>'+
                                '</select>'+
                            '</div>'
                        )
                    $('#elementary').remove();
                    $('#seniorhigh').remove();
                    $('#college').remove();
                    }
                    else if($(this).val()=="3"){
                        $('#column2').append(
                            '<div class="form-group" id="seniorhigh">'+
                                '<label for="grade_level"><b>Senior High School</b></label>'+
                                '<select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">'+
                                    '<option selected>-- Select Grade --</option>'+
                                    '<option value="12">Grade 11</option>'+
                                    '<option value="13">Grade 12</option>'+
                                '</select>'+
                            '</div>'
                        )
                    $('#elementary').remove();
                    $('#juniorhigh').remove();
                    $('#college').remove();
                    }
                    else if($(this).val()=="4"){
                        $('#column2').append(
                            '<div class="form-group" id="college">'+
                                '<label for="grade_level"><b>College</b></label>'+
                                '<select class="form-select form-select-sm" name="grade_level" id="grade-level" aria-label=".form-select-sm example">'+
                                    '<option selected>-- Select Year --</option>'+
                                    '<option value="14">Year 1</option>'+
                                    '<option value="15">Year 2</option>'+
                                    '<option value="16">Year 3</option>'+
                                    '<option value="17">Year 4</option>'+
                                '</select>'+
                            '</div>'
                        )
                    $('#elementary').remove();
                    $('#juniorhigh').remove();
                    $('#seniorhigh').remove();
                    }
                });
                $('#employee').remove();
                $('#tp').remove();
                $('#ntp').remove();
            }
        
        });
        $('.theEmployeeData').click(function(){
            var id =  $(this).find(":first-child").text();
            var complete_name =  $(this).find(":first-child").next().next().text();
            var role = $(this).find(":first-child").next().next().next().text();
            var employeeStat = $(this).find(":first-child").next().next().next().next().text();
            $('#patientModal').modal('hide');
            $('#id').val(id);
            $('#complete_name').val(complete_name);
            $('#patient_role').val(role);

            
            if(employeeStat == "NTP"){

                $('#employeeStatColumn').append(
                '<div class="form-group" id="ntpEmployeeStat">'+
                    '<label for="role"><b>Employee Status</b></label>'+
                    '<select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">'+
                        '<option value="NTP">Non-Teaching Personnel</option>'+
                    '</select>'+
                '</div>'
                );

                $('#column2').append(
                    '<div class="form-group" id="ntp">'+
                        '<label for="role"><b>Non-Teaching Status</b></label>'+
                        '<select class="form-select form-select-sm" name="personnel_rank" aria-label=".form-select-sm example">'+
                            '<option selected>-- Select --</option>'+
                            '<option value="ma">M.A</option>'+
                            '<option value="admin">Admin</option>'+
                            '<option value="supervisor">Supervisor</option>'+
                            '<option value="faculty">Faculty</option>'+
                        '</select>'+
                    '</div>'
                );
                $('#tp').remove();
            }
            else if(employeeStat == "TP"){

                $('#employeeStatColumn').append(
                '<div class="form-group" id="tpEmployeeStat">'+
                    '<label for="role"><b>Employee Status</b></label>'+
                    '<select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">'+
                        '<option value="TP">Teaching Personnel</option>'+
                    '</select>'+
                '</div>'
                );

                $('#column2').append(
                    '<div class="form-group" id="tp">'+
                        '<label for="role"><b>Teaching Department</b></label>'+
                        '<select class="form-select form-select-sm" name="department" aria-label=".form-select-sm example">'+
                            '<option selected>-- Select Department --</option>'+
                            '<option value="1">GHS</option>'+
                            '<option value="2">JHS</option>'+
                            '<option value="3">SHS</option>'+
                            '<option value="4">COLLEGE</option>'+
                            '<option value="5">MWSP</option>'+
                            '<option value="6">APCSM</option>'+
                        '</select>'+
                    '</div>'
                );
                $('#ntp').remove();
            }
                
            $('#department').remove();
        });

        $('.theVisitorData').click(function(){
            var id =  $(this).find(":first-child").text();
            var complete_name =  $(this).find(":first-child").next().text();
            var role =  $(this).find(":first-child").next().next().text();
            $('#patientModal').modal('hide');
            $('#id').val(id);
            $('#complete_name').val(complete_name);
            $('#patient_role').val(role);
            $('#tpEmployeeStat').remove();
            $('#ntpEmployeeStat').remove();
            $('#tp').remove();
            $('#ntp').remove();

        });
    });
  </script>
@stop