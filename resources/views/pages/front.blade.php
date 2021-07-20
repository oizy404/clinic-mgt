@extends('layout.master')

@section('title')
    ACD CLINIC
@stop

@section('content')
    <div class="front-container1" style="background-image: url('images/acdbuilding.jpg');">
        <div class="row-md">
            <div class="col-md-2 offset-md-5">
                <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo">
            </div>
        </div>
    </div>
    <div class="front-container2">
        <div class="row-md">
            <div class="col-md-2 offset-md-5">
                <button type="Add" class="btn btn-primary" id="btn-login">Log In</button>
            </div>
        </div>
    </div>

@include('pages.admin-login')
@stop