@extends("layouts.master")
    @section('title')
        Home 
@stop
    @section('content')
    @include("layouts.user-navbar")

<div class="container">
    <center>
        <h1>Supervisor Home Page</h1>
        {{session('rank')}}
        
        <br>


</div>
    </center>
@stop            
