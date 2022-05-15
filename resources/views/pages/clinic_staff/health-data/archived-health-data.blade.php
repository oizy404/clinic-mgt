@extends('layout.clinicstaff-master1')

@section('title')
    Patients Health Data
@stop

@section('content')
        <div class="main-container">
            <div class="row mb-1" id="hlthdash-header">
                <div class="col-md-11 mt-4" style="margin: auto; padding: 0px;">
                    <div class="col-md-5">
                        <h5>ARCHIVED PATIENT HEALTH DATA</h5>
                    </div>
                    <div class="col-md-6"></div>  
                    <hr>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-11 health-data">
                    <table id="archive-health-data" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">ID Number</th>
                                <th class="bg-primary text-white">Name</th>
                                <th class="bg-primary text-white">Patient Status</th>
                                <th class="bg-primary text-white text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            @if($patient->archived == 1)
                            <tr>
                                <td class="theHealthData text-center" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->school_id}}</td>
                                <td class="theHealthData" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->first_name}} {{$patient->last_name}}</td>
                                <td class="theHealthData" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->patient_role}}</td>
                                <td class="text-center">
                                    <a href="{{route('restoreHealthData', $patient->id)}}" onclick="confirmRestore()" class="btn btn-warning" ><center><i class="fa fa-arrow-rotate-left"></i></center></a>
                                    <a href="{{route('delete-health-data', $patient->id)}}" onclick="confirmDelete()" class="btn btn-danger" ><center><i class="fa fa-trash"></i></center></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        $('.theHealthData').click(function(){
            window.location = $(this).data("href");
        });

    });
        function confirmRestore(){
            var result = confirm("Confirm to restore health data.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }
        function confirmDelete(){
            var result = confirm("Confirm to delete permanently health data.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }
  </script>
@stop