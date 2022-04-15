@extends('layout.clinicstaff-master1')

@section('title')
    Clinic Staff Dashboard
@stop

@section('content')
<style>
    #graphs{
        padding: 5px;
        background-color: #fff;
    }
    #graphs .card{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   

    {{session('rank')}}
        <div class="row main-container" id="graphs">
            <div class="row mb-4" id="hdata">
                <div class="col-md-7">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                {!! $patientDept->container() !!}
                            </div>
                            <div class="card-footer">
                                Patient School Department Chart
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                {!! $patientGrade->container() !!}
                            </div>
                            <div class="card-footer">
                                Patient School Year Level Chart
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            {!! $patient->container() !!}
                        </div>
                        <div class="card-footer">
                            Patient Chart
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="inventory">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            {!! $med_suppliesReleased->container() !!}
                        </div>
                        <div class="card-footer">
                            Released Medical Products Chart
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            {!! $med_suppliess->container() !!}
                        </div>
                        <div class="card-footer">
                            Medical Products Quantity and Stocks Chart
                        </div>
                    </div>
                </div>
                {!! $patientDept->script() !!}
                {!! $patientGrade->script() !!}
                {!! $patient->script() !!}
                {!! $med_suppliesReleased->script() !!}
                {!! $med_suppliess->script() !!}
            </div>
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
