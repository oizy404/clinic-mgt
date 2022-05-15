@extends('layout.clinicstaff-master1')

@section('title')
    Clinic Staff Dashboard
@stop

@section('content')
<style>
    #graphs hr{
        margin-top: 3px;
    }
    #graphs .card{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
    #graphs #year .col{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        padding: 20px;
        border-radius: 5px;
    }
    #graphs #month .col{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        padding: 20px;
        border-radius: 5px;
    }
    #graphs #week .col{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        padding: 20px;
        border-radius: 5px;
    }
    #graphs #day .col{
        background-color: #FFFFFF;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        padding: 20px;
        border-radius: 5px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   

    {{session('rank')}}
        <div class="main-container" id="graphs">

            <div class="col-md-11" style="margin: auto; padding: 0px;">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="day-tab" data-bs-toggle="tab" data-bs-target="#day" type="button" role="tab" aria-controls="day" aria-selected="true">DAY</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="week-tab" data-bs-toggle="tab" data-bs-target="#week" type="button" role="tab" aria-controls="week" aria-selected="false">WEEK</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="month-tab" data-bs-toggle="tab" data-bs-target="#month" type="button" role="tab" aria-controls="month" aria-selected="false">MONTH</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button" role="tab" aria-controls="year" aria-selected="false">YEAR</button>
                    </li>
                    <div class="col"></div>
                    
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="print-tab" data-bs-toggle="tab" data-bs-target="#print" type="button" role="tab" aria-controls="print" aria-selected="false">PRINT</button>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade" id="day" role="tabpanel" aria-labelledby="day-tab"><br>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="col mb-3">
                                    <h5>Patient School Department Chart</h5><hr>
                                
                                    {!! $patientDept->container() !!}
                                </div>
                                <div class="col">
                                    <h5>Patient School Year Level Chart</h5><hr>
                                
                                    {!! $patientGrade->container() !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card patientDay">
                                    <div class="card-header">
                                        <h5>Patient Chart</h5><hr>
                                    </div>
                                    <div class="card-body">
                                        {!! $patient->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <h5>Chief Complaints Chart</h5><hr>
                            
                                {!! $chief_compt->container() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Medical Products Quantity and Stocks Chart</h5><hr>

                                {!! $med_suppliess->container() !!}
                            </div>
                        </div>
                        {!! $patientDept->script() !!}
                        {!! $patientGrade->script() !!}
                        {!! $patient->script() !!}
                        {!! $med_suppliess->script() !!}
                        {!! $chief_compt->script() !!}
                    </div>

                    <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab"><br>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="col mb-3">
                                    <h5>Patient School Department Chart</h5><hr>
                                
                                    {!! $patientDept_week->container() !!}
                                </div>
                                <div class="col">
                                    <h5>Patient School Year Level Chart</h5><hr>
                                
                                    {!! $patientGrade_week->container() !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card patientWeek">
                                    <div class="card-header">
                                        <h5>Patient Chart</h5><hr>
                                    </div>
                                    <div class="card-body">
                                        {!! $patient_week->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <h5>Chief Complaints Chart</h5><hr>
                            
                                {!! $chief_compt_week->container() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Medical Products Quantity and Stocks Chart</h5><hr>
                            
                                {!! $med_suppliess_week->container() !!}
                            </div>
                        </div>
                        {!! $patientDept_week->script() !!}
                        {!! $patientGrade_week->script() !!}
                        {!! $patient_week->script() !!}
                        {!! $med_suppliess_week->script() !!}
                        {!! $chief_compt_week->script() !!}
                    </div>

                    <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-tab"><br>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="col mb-3">
                                    <h5>Patient School Department Chart</h5><hr>
                                
                                    {!! $patientDept_month->container() !!}
                                </div>
                                <div class="col">
                                    <h5>Patient School Year Level Chart</h5><hr>
                                
                                    {!! $patientGrade_month->container() !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card patientMonth">
                                    <div class="card-header">
                                        <h5>Patient Chart</h5><hr>
                                    </div>
                                    <div class="card-body">
                                        {!! $patient_month->container() !!}
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <h5>Chief Complaints Chart</h5><hr>
                            
                                {!! $chief_compt_month->container() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Medical Products Quantity and Stocks Chart</h5><hr>
                            
                                {!! $med_suppliess_month->container() !!}
                            </div>
                        </div>
                        {!! $patientDept_month->script() !!}
                        {!! $patientGrade_month->script() !!}
                        {!! $patient_month->script() !!}
                        {!! $med_suppliess_month->script() !!}
                        {!! $chief_compt_month->script() !!}
                    </div>

                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab"><br>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="col mb-3">
                                    <h5>Patient School Department Chart</h5><hr>
                                
                                    {!! $patientDept_year->container() !!}
                                </div>
                                <div class="col">
                                    <h5>Patient School Year Level Chart</h5><hr>
                                
                                    {!! $patientGrade_year->container() !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card patientYear">
                                    <div class="card-header">
                                        <h5>Patient Chart</h5><hr>
                                    </div>
                                    <div class="card-body">
                                        {!! $patient_year->container() !!}
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <h5>Chief Complaints Chart</h5><hr>
                            
                                {!! $chief_compt_year->container() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Medical Products Quantity and Stocks Chart</h5><hr>
                            
                                {!! $med_suppliess_year->container() !!}
                            </div>
                        </div>
                        {!! $patientDept_year->script() !!}
                        {!! $patientGrade_year->script() !!}
                        {!! $patient_year->script() !!}
                        {!! $chief_compt_year->script() !!}
                        {!! $med_suppliess_year->script() !!}
                    </div>
                    
                </div>
                                
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
