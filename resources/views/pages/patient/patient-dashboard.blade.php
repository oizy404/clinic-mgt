@extends('layout.master')

@section('title')
    Patient Dashboard
@stop

@section('content')
@include('shared.admin-header')
@include('shared.patient-sidenav') 
 
    <div class="patient-dashboard">
        {{session('rank')}}
    </div>


@include('pages.add-student-health-data')
@include('pages.messaging.message-patient')
@stop
