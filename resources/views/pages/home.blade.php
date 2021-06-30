@extends('layout.master')

@section('title')
    Home
@stop

@section('content')

<div class="col-md-4 offset-md-4 pt-5">
    <form action="{{route('display')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full name</label>
            <input type="text" class="form-control" name="full_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age">
        </div> 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@stop