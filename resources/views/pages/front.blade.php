@extends('layout.master')

@section('title')
    ACD CLINIC
@stop

@section('content')
    <div class="front-container">
        <div class="col-md-4 offset-md-4 front-cont">
            <div class="card">
                <div class="card-header">
                    <div class="form-group login-btn">
                        <button type="Add" class="btn" id="btn-acdstaff"><strong>Clinic Staff</strong></button>
                        <button type="Add" class="btn" id="btn-acdpatient"><strong>Patient</strong></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group mb-5 mt-3">
                        <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo"><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('pages.loginStaff')
@include('pages.registerPatient')
@include('pages.loginPatient')
@stop