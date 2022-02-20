@extends('layout.master')

@section('title')
    Patient Dashboard
@stop

@section('content')
@include('shared.admin-header')
@include('shared.patient-sidenav') 
 
    <div class="patient-dashboard main-container">
        {{session('rank')}}
    </div>


@include('pages.add-student-health-data')
@include('pages.messaging.message-patient')   

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
  </script>
@stop
