@extends('layout.master')

@section('title')
    ADD CONSULTATION RECORD
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')
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
                    <form action="{{route('store-consultation-record')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group" id="health-evaluation" style="background-color: white;"> 
                            <div class="row">
                                <div class="col column1">
                                    <div class="col form-group input-group-sm">
                                        <label for="complete_name" class=""><b>Patient Name</b></label>
                                        <input type="text" class="form-control" name="complete_name" id="complete_name" data-bs-toggle="modal" data-bs-target="#patientModal">
                                        <input type="hidden" class="form-control" name="id" id="id">
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" name="patient_role" aria-label=".form-select-sm example" id="patient_role">
                                                <option selected>---</option>
                                                <option>Employee</option>
                                                <option>Visitor</option>
                                                <option>Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" id="column2">   

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="height" class=""><b>Height</b></label>
                                                <input type="text" class="form-control" name="height">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="weight" class=""><b>Weight</b></label>
                                                <input type="text" class="form-control" name="weight">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="temperature"><b>Temperature</b></label>
                                                <input type="text" class="form-control" name="temperature">
                                            </div>
                                        </div>          
                                    </div>
                                    <div class="row">                              
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="bmi" class=""><b>Body Mass Index</b></label>
                                                <input type="text" class="form-control" name="bmi">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                                                <input type="text" class="form-control" name="bloodpressure">
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
                                        <input type="checkbox" name="complaints[]" value="1">
                                        <label for="complaints">Head Ache</label><br>
                                        <input type="checkbox" name="complaints[]" value="2">
                                        <label for="complaints">Stomach Ache</label><br>
                                        <input type="checkbox" name="complaints[]" value="3">
                                        <label for="complaints">Tooth Ache</label><br>
                                        <input type="checkbox" name="complaints[]" value="4">
                                        <label for="complaints">Difficulty Breathing</label><br>
                                        <input type="checkbox" name="complaints[]" value="5">
                                        <label for="complaints">Abdominal Pain</label><br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="complaints[]" value="6">
                                        <label for="complaints">Fever</label><br>
                                        <input type="checkbox" name="complaints[]" value="7">
                                        <label for="complaints">Dizziness</label><br>
                                        <input type="checkbox" name="complaints" value="8">
                                        <label for="complaints">Dysmenorrhea</label><br>
                                        <input type="checkbox" name="complaints[]" value="9">
                                        <label for="complaints">Diarhea</label><br>
                                        <input type="checkbox" name="complaints[]" value="10">
                                        <label for="complaints">Vomiting</label>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="othercomplaints"><b>Others: Please Specify</b></label>
                                        <input type="text" class="form-control" name="other_complaint">
                                    </div>
                                </div>
                            </div> 
                                
                            <div class="form-group mt-2">
                                <label for="doctors_note" class=""><b>Doctor's Notes</b></label>
                                <textarea class="form-control" name="doctors_note" id="doctors_note" cols="10" rows="2"></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="nurse_note" class=""><b>Nurse Notes</b></label>
                                <textarea class="form-control" name="nurse_note" id="nurse_note" cols="10" rows="2"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-add-consultation">Submit</button>
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