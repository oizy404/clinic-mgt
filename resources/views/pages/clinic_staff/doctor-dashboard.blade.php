@extends('layout.master')

@section('title')
    Doctor Dashboard
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav') 
 
    <div class="doctor-dashboard">
        {{session('rank')}}
    </div>

@stop
