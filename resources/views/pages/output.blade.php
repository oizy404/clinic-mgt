@extends('layout.master')

@section('title')
    Output
@stop

@section('content')
    <div class="col-md-6 offset-md-3">
        <h2>Hi, {{$fullname}}</h2>
        @if($valid === null)
            <div class="alert alert-danger" role="alert">
                Please enter a valid age!
            </div>
        @elseif($valid === true)
            <p>You are obliged to vote.</p>
        @elseif($valid === false)
            <p>You are a minor, you can't vote.</p>
        @endif
    </div>
@stop