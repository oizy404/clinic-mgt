@extends('layout.master')

@section('title')
    ACD CLINIC
@stop

@section('content')
    <!-- <div class="front-container1">
        <div class="row-md">
            <div class="col-md-2 offset-md-5">
                <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo">
            </div>
        </div>
    </div>
    <div class="front-container2">
        <div class="row-md">
            <div class="col-md-8 offset-md-4">
                <button type="Add" class="btn btn-primary" id="btn-adminlogin">Admin</button>
                <button type="Add" class="btn btn-primary" id="btn-doctorlogin">Doctor</button>
                <button type="Add" class="btn btn-primary" id="btn-supervisorlogin">Supervisor</button>
                <button type="Add" class="btn btn-primary" id="btn-patient">Patient</button>
                <button type="Add" class="btn btn-primary" id="btn-registerPatient">Register Patient</button>
            </div>
        </div>
    </div> -->
    <div class="front-container">
        <div class="col-md-4 offset-md-4 front-cont">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-5 mt-3">
                        <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo"><br>
                    </div>
                    <div class="form-group login-btn">
                        <button type="Add" class="btn btn-primary" id="btn-acdstaff">Patient</button>
                        <button type="Add" class="btn btn-success" id="btn-acdpatient">Clinic Staff</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('pages.loginAdmin')
@include('pages.loginDoctor')
@include('pages.loginSupervisor')
@include('pages.registerPatient')
@include('pages.loginPatient')
@stop