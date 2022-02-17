@extends('layout.master')

@section('title')
    ACD CLINIC
@stop
<style>

</style>
@section('content')
<div class="front-container">
    <div class="container">
        <div class="switch">
            <div class="loginn" onclick="tab1();">CLINIC STAFF</div>
            <div class="signupp" onclick="tab2();">PATIENT</div>
        </div>
        <div class="outer">
            <div class="form-group mt-3 mb-1">
                <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo"><br>
            </div>
            <form action="{{route('login')}}" method="post" id="form">
                @csrf
                @method('post')
                <div id="page">
                    <label for=""><h6><strong>Login Staff</strong></h6></label>
                    <div class="element">
                        <input type="text" name="username" placeholder="Username">
                        <span class="fas fa-user"></span>
                    </div>
                    <div class="element">
                        <input type="password" name="password" placeholder="Password">
                        <span class="fas fa-lock"></span>
                    </div>
                    <button id="btnn1">Login</button>
                </div>

                <div id="page">
                    <label for=""><h6><strong>Login Patient</strong></h6></label>
                    <div class="element">
                        <input type="text" placeholder="Username">
                        <span class="fas fa-user"></span>
                    </div>
                    <div class="element">
                        <input type="password" placeholder="Password">
                        <span class="fas fa-lock"></span>
                    </div>
                    <button id="btnn2">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- @include('pages.loginStaff')
@include('pages.registerPatient')
@include('pages.loginPatient') -->
@stop