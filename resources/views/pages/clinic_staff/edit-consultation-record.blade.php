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
                    <form action="" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group" id="health-evaluation" style="background-color: white;">
                            <div class="row">
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
                                                <option selected>---</option>
                                                <option>Employee</option>
                                                <option>Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" id="column2">   

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="height" class=""><b>Height</b></label>
                                        <input type="text" class="form-control" name="height" value="{{$record->height}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="weight" class=""><b>Weight</b></label>
                                        <input type="text" class="form-control" name="weight" value="{{$record->weight}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
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
                            <div class="form-group mt-2">
                                <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                <textarea class="form-control" name="doctors_note" value="{{$record->doctors_note}}" id="doctors_note" cols="10" rows="4">{{$record->doctors_note}}</textarea>
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
                        <table class="table table-hover table-bordered" style="width:100%" id="health-data">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th class="bg-info text-dark">ID Number</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr class="theData">
                                    <td style="display: none">{{$patient->id}}</td>
                                    <td>{{$patient->school_id}}</td>
                                    <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                    <td>{{$patient->patient_role}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        $('.theData').click(function(){
            var id =  $(this).find(":first-child").text();
            var complete_name =  $(this).find(":first-child").next().next().text();
            var role = $(this).find(":first-child").next().next().next().text();
            $('#patientModal').modal('hide');
            $('#id').val(id);
            $('#complete_name').val(complete_name);
            $('#patient_role').val(role);
            // alert(id);

            if(role == "Student"){
                $('#column2').append(
                    '<div class="form-group" id="department">'+
                        '<label for="role"><b>Grade/Year Level</b></label>'+
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
                                    '<option value="Kinder">Kinder</option>'+
                                    '<option value="Grade 1">Grade 1</option>'+
                                    '<option value="Grade 2">Grade 2</option>'+
                                    '<option value="Grade 3">Grade 3</option>'+
                                    '<option value="Grade 4">Grade 4</option>'+
                                    '<option value="Grade 5">Grade 5</option>'+
                                    '<option value="Grade 6">Grade 6</option>'+
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
                                    '<option value="Grade 7">Grade 7</option>'+
                                    '<option value="Grade 8">Grade 8</option>'+
                                    '<option value="Grade 9">Grade 9</option>'+
                                    '<option value="Grade 10">Grade 10</option>'+
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
                                    '<option value="Grade 11">Grade 11</option>'+
                                    '<option value="Grade 12">Grade 12</option>'+
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
                                    '<option value="Year 1">Year 1</option>'+
                                    '<option value="Year 2">Year 2</option>'+
                                    '<option value="Year 3">Year 3</option>'+
                                    '<option value="Year 4">Year 4</option>'+
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
            else if(role == "Employee"){
                $('#column2').append(
                    '<div class="form-group" id="employee">'+
                        '<label for="role"><b>Employee</b></label>'+
                        '<select class="form-select form-select-sm" name="personnel_position" aria-label=".form-select-sm example" id="employee-role">'+
                            '<option selected>-- Select --</option>'+
                            '<option value="NTP">Non-Teaching Personnel</option>'+
                            '<option value="TP">Teaching Personnel</option>'+
                        '</select>'+
                    '</div>'
                );
                $('#employee-role').change(function(){
                    if($(this).val() == "NTP"){
                        $('#column2').append(
                            '<div class="form-group" id="ntp">'+
                                '<label for="role"><b>Non-Teaching Personnel</b></label>'+
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
                    else if($(this).val() == "TP"){
                        $('#column2').append(
                            '<div class="form-group" id="tp">'+
                                '<label for="role"><b>Teaching Personnel</b></label>'+
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
                });
                
                $('#department').remove();
            }
        });
    });
  </script>
@stop