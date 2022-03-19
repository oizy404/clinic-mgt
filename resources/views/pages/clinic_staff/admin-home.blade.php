@extends('layout.master')

@section('title')
    Admin Home
@stop

@section('content')

@include('shared.admin-header')
@include('shared.admin-sidenav') 
<style>
    #medical-inventory{
        padding: 5px;
    }
    #medical-inventory .card{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
    
    {{session('rank')}}
        <div class="row main-container" id="medical-inventory">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {!! $med_supplies->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        {!! $med_suppliess->container() !!}
                    </div>
                </div>
            </div>
            {!! $med_supplies->script() !!}
            {!! $med_suppliess->script() !!}
        </div>
        
    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
  </script>

@stop