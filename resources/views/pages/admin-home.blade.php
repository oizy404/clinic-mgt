@extends('layout.master')

@section('title')
    Admin Home
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav') 
 
    <div class="admin-dashboard">
        {{session('rank')}}
    </div>

@stop
