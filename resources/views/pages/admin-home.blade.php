@extends("layouts.master")
    @section('title')
        Home
@stop
    @section('content')
    @include("layouts.navbar")

<div class="container">
   	<center>
       <h1>Admin Home Page</h1>
        {{session('rank')}}
        <br>
</div>
    </center>

@stop