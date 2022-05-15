@extends('layout.master')

@section('title')
    ACD CLINIC
@stop


@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<div class="front-container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="images/acdLogo.png" alt="acd logo" class="rounded-circle" id="acdLogo"><br>
            </div>
            <div class="card-body">
            {!! Toastr::message() !!}
                <form action="{{route('login')}}" method="post" id="page1">
                    @csrf
                    @method('post')
                    <div id="">
                        <label for=""><h5><strong>Clinic Management System</strong></h5></label>
                        <div class="form-group input-group-sm mt-1">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <!-- <span class="fas fa-user"></span> -->
                        </div>
                        <div class="form-group input-group-sm mb-3 mt-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <!-- <span class="fas fa-lock"></span> -->
                        </div>
                        <button id="btnn1">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>
@stop