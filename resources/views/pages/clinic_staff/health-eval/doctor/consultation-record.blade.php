@extends('layout.doctor-master1')

@section('title')
    Consultation Record
@stop

@section('content')
<style>
    .add-data{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px; 
        right:40px;
        background-color: #006dff;
        color: #ffffff;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        
    }
    .add-data i{
        margin-top:22px;
    }
    #evaldash-header hr{
        margin-top: 0px;
    }
    #evaldash-subhead a{
        color: #0266ea;
    }
    #evaldash-subhead i{
        color: #1067d8;
        font-size: 22px;
    }
</style>
        {{session('rank')}}
        <div class="main-container">

                <div class="row mb-3" id="evaldash-header">
                    <div class="col-md-11" style="margin: auto; padding: 0px;">
                        <div class="col-md-5">
                            <h5>CONSULTATION RECORD</h5>
                        </div>
                        <div class="col-md-6"></div>  
                        <hr>
                    </div>
                </div>
                <!-- <div class="row mb-4" id="evaldash-subhead">
                    <div class="col-md-11" style="margin: auto;">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-box-archive"></i> <a href="">Archived</a>
                            </div>
                            <div class="col-md-4"></div> 
                        </div>
                    </div>
                </div> -->
            <div class="row">
                <div class="col-md-11 consultation-records">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Employee</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Visitor</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
                            <table id="studentConsultation-record" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">ID Number</th>
                                        <th class="bg-primary text-white">Name</th>
                                        <th class="bg-primary text-white">Patient Status</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($patientsRecords as $patientsRecord)
                                    @foreach($patients as $patient)
                                        @if($patientsRecord->first()->patient_id == $patient->id)
                                            @if($patientsRecord->first()->archived == 0 && $patient->patient_role == "Student")
                                            <tr class="theRecord" data-href="">
                                                <td>{{$patient->school_id}}</td>
                                                <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                                <td>{{$patient->patient_role}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('doctor/show/consultation-record', $patientsRecord->first()->patient_id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('doctor/archiveAll/consultation-record', $patientsRecord->first()->patient_id)}}" onclick="confirmArchive()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
                            <table id="employeeConsultation-record" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">ID Number</th>
                                        <th class="bg-primary text-white">Name</th>
                                        <th class="bg-primary text-white">Patient Status</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($patientsRecords as $patientsRecord)
                                    @foreach($patients as $patient)
                                        @if($patientsRecord->first()->patient_id == $patient->id)
                                            @if($patientsRecord->first()->archived == 0 && $patient->patient_role == "Employee")
                                            <tr class="theRecord" data-href="">
                                                <td>{{$patient->school_id}}</td>
                                                <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                                <td>{{$patient->patient_role}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('doctor/show/consultation-record', $patientsRecord->first()->patient_id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('doctor/archiveAll/consultation-record', $patientsRecord->first()->patient_id)}}" onclick="confirmArchive()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
                            <table id="visitorConsultation-record" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">Name</th>
                                        <th class="bg-primary text-white">Patient Status</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($visitorsRecords as $visitorsRecord)
                                    @foreach($visitors as $visitor)
                                        @if($visitorsRecord->first()->visitor_id == $visitor->id)
                                            @if($visitor->archived == 0)
                                            <tr class="theRecord" data-href="">
                                                <td>{{$visitor->last_name}}, {{$visitor->first_name}}</td>
                                                <td>{{$visitor->patient_role}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('doctor/showVisitor/consultation-record', $visitorsRecord->first()->visitor_id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('doctor/archiveAll/consultation-record', $visitorsRecord->first()->visitor_id)}}" onclick="confirmArchive()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>  
            <!-- </div> -->
            </div>
        </div>

        <a href="{{route('doctor/add/consultation-record')}}" class="add-data">
            <i class="fas fa-plus"></i>
        </a>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        $('.theRecord').click(function(){
            window.location = $(this).data("href");
        });

        function confirmArchive(){
            var result = confirm("Confirm to archive All Health Evaluation Records.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }
      
  </script>
@stop
