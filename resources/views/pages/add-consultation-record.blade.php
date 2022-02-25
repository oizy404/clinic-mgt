@extends('layout.master')

@section('title')
    ADD CONSULTATION RECORD
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')
        <div class="main-container">
            <div class="add-consultation-record">
                <div class="acr-heading">
                    <div class="col-md-1">
                        <!-- <a href="#" id="btn-cancel" style="float:left; color: red;"><i class="fas fa-times-circle"></i></a> -->
                    </div>
                    <div class="col-md-5 offset-md-7 p-head">
                        <h4 class="mb-0">CONSULTATION FORM</h4>
                        <!-- <small>STUDENT</small> -->
                    </div>
                </div>
                <div class="" id="add-consultation-record">
                    <form action=" " method="post">
                        @csrf
                        @method('post')
                        <div class="form-group" id="health-evaluation" style="background-color: white;">
                            <!-- <div class="col-md-2 form-group">
                                <label for="idnumber" class=""><b>School ID Number</b></label>
                                <input type="text" class="form-control" name="idnumber">
                            </div> -->
                            <div class="row">
                                <div class="col column1">
                                    <div class="col form-group input-group-sm">
                                        <label for="student_idnumber" class=""><b>ID Number</b></label>
                                        <input type="text" class="form-control" name="student_idnumber">
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="patient-role">
                                                <option selected>Select</option>
                                                <option value="1">Employee</option>
                                                <option value="2">Student</option>
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
                                        <input type="text" class="form-control" name="height">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="weight" class=""><b>Weight</b></label>
                                        <input type="text" class="form-control" name="weight">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
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
                            <div class="form-group mt-2">
                                <label for="doctorsNotes" class=""><b>Doctor's Notes</b></label>
                                <textarea class="form-control" name="doctorsNotes" id="doctorsNotes" cols="10" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn" id="btn-add-consultation">Add</button>
                    </form>
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

        $('#patient-role').change(function(){
            if($(this).val() == "2"){
                $('#column2').append(
                    '<div class="form-group" id="grade-level">'+
                        '<label for="role"><b>Grade/Year Level</b></label>'+
                        '<select class="form-select form-select-sm" aria-label=".form-select-sm example">'+
                            '<option selected>-- Select Grade --</option>'+
                            '<option value="1">Elementary</option>'+
                            '<option value="2">Junior High School</option>'+
                            '<option value="3">Senior High School</option>'+
                            '<option value="4">College</option>'+
                        '</select>'+
                    '</div>'
                );
                $('#employee').remove();
                $('#tp').remove();
                $('#ntp').remove();
                
                $(".vaccines-info").show();
                $('.maintenance').hide();
            }
            else if($(this).val() == "1"){
                $(".vaccines-info").hide();
                $('.maintenance').show();

                $('#column2').append(
                    '<div class="form-group" id="employee">'+
                        '<label for="role"><b>Employee</b></label>'+
                        '<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="employee-role">'+
                            '<option selected>-- Select --</option>'+
                            '<option value="ntp">Non-Teaching Personnel</option>'+
                            '<option value="tp">Teaching Personnel</option>'+
                        '</select>'+
                    '</div>'
                );

                $('#employee-role').change(function(){
                    if($(this).val() == "ntp"){
                        $('#column2').append(
                            '<div class="form-group" id="ntp">'+
                                '<label for="role"><b>Non-Teaching Personnel</b></label>'+
                                '<select class="form-select form-select-sm" aria-label=".form-select-sm example">'+
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
                    else if($(this).val() == "tp"){
                        $('#column2').append(
                            '<div class="form-group" id="tp">'+
                                '<label for="role"><b>Teaching Personnel</b></label>'+
                                '<select class="form-select form-select-sm" aria-label=".form-select-sm example">'+
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
                
                $('#grade-level').remove();
            }
        });
    });
  </script>
@stop