@extends('layout.master')

@section('title')
    Admin Home
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav') 
<style>
    #medical-inventory{
        padding: 20px;
    }
    #medical-inventory .card{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
</style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
<div class="row" id="medical-inventory">
        {{session('rank')}}
    <div class="col-md-3 offset-md-2 mt-5">
        <div class="card">
            <div class="card-body">
                {!! $med_supplies->container() !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="card-body">
                {!! $med_suppliess->container() !!}
            </div>
        </div>
    </div>
    {!! $med_supplies->script() !!}
    {!! $med_suppliess->script() !!}
</div>

@stop
