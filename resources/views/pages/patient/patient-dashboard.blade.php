@extends('layout.master')

@section('title')
    Patient Dashboard
@stop

@section('content')
{{session('rank')}}
@include('shared.patient-header')
@include('shared.patient-sidenav') 
    <div class="patient-dashboard main-container">

    </div>


@include('pages.messaging.message-patient')   

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
         $(document).ready(function(){
             
            $(".hamburger").click(function(){
                $(".wrapper").toggleClass("active")
            });
            
            $(".message-patient-btn").click(function(){
                $(".message-patient").fadeIn(500);
            });
            $("#btn-compose-cancel").click(function(){
                $(".message-patient").fadeOut(500);
            });
        });

  </script>
@stop
