@extends('layout.master')

@section('acdclinic')
    ACD CLINIC
@stop

@section('content')
    <div class="front-container1">
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo">
            </div>
        </div>
    </div>
    <div class="front-container2">
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <center>
                    <button type="Add" class="btn btn-primary" id="btn-login">Log In</button>
                </center>
            </div>
        </div>
    </div>
@stop