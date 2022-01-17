@extends('layout.master')

@section('title')
    ACD CLINIC
@stop

@section('content')
    <div class="front-container">
        <div class="col-md-4 offset-md-4 front-cont">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-5 mt-3">
                        <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo"><br>
                    </div>
                    <div class="form-group login-btn">
                        <button type="Add" class="btn btn-primary" id="btn-acdstaff">Clinic Staff</button>
                        <button type="Add" class="btn btn-success" id="btn-acdpatient">Patient</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('pages.loginStaff')
@include('pages.registerPatient')
@include('pages.loginPatient')
@stop