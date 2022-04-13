@extends('layout.doctor-master1')

@section('title')
    Doctor Dashboard
@stop

@section('content')
@include('shared.doctor-header')
@include('shared.doctor-sidenav') 
 
    <div class="doctor-dashboard">
        {{session('rank')}}
    </div>

@stop
