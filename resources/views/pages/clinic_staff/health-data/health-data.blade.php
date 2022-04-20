@extends('layout.clinicstaff-master1')

@section('title')
    Patients Health Data
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
    #hlthdash-header hr{
        margin-top: 0px;
    }
    #hlthdash-subhead a{
        color: #0266ea;
    }
    #hlthdash-subhead i{
        color: #1067d8;
        font-size: 22px;
    }
</style>

        {{session('rank')}}
        <div class="main-container">
            <!-- <div class="row hlth-dashboard"> -->
                <div class="row mb-1" id="hlthdash-header">
                    <div class="col-md-11" style="margin: auto; padding: 0px;">
                        <div class="col-md-5">
                            <h5>PATIENT HEALTH DATA</h5>
                        </div>
                        <div class="col-md-6"></div>  
                        <hr>
                    </div>
                </div>
                <div class="row mb-4" id="hlthdash-subhead">
                    <div class="col-md-11" style="margin: auto;">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-box-archive"></i> <a href="{{route('archived-health-data')}}">Archived</a>
                            </div>
                            <div class="col-md-3">
                                <i class="fa fa-plus"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#uploadHealthData"> Upload Batch User</a>
                            </div>
                            <div class="col-md-4"></div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 health-data">
                        <table id="health-data" class="table table-hover" style="width:100%">
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
                                @if($patient->archived == 0)
                                <tr>
                                    <td class="theHealthData text-center" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->school_id}}</td>
                                    <td class="theHealthData" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->first_name}} {{$patient->last_name}}</td>
                                    <td class="theHealthData" data-href="{{route('show-health-data', $patient->id)}}">{{$patient->patient_role}}</td>
                                    <!-- <td class="text-center"><a href="" class="btn btn-success"><center><i class="far fa-print"></center></a></i></td> -->
                                    <td class="text-center">
                                        <a href="{{route('edit-health-data', $patient->id)}}" class="btn btn-warning" id="btn-edit-healthdata"><center><i class="far fa-edit"></i></center></a>
                                
                                        <a href="{{route('archiveHealthData', $patient->id)}}" onclick="confirmArchive()" class="btn btn-danger" ><center><i class="fas fa-trash-alt"></i></center></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            <!-- </div> -->


        </div>

        <!-- Upload User Modal -->
        <div class="modal fade" id="uploadHealthData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Batch Health Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('student.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <div class="form-group input-group-sm">
                                <label for="file">Choose CSV File</label>
                                <input type="file" id="img" name="file" class="form-control"><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <a href="{{route('add-health-data')}}" class="add-data">
        <i class="fas fa-plus"></i>
        </a>
    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
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

