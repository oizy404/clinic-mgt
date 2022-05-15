@extends('layout.clinicstaff-master1')

@section('title')
    Add Health Data
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
    #hds-header{
        margin-top: 60px;
    }
    #hds-header hr{
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

        <div class="main-container">
            <div class="row mb-1" id="hds-header">
                <div class="col-md-11" style="margin: auto; padding: 0px;">
                    <div class="col-md-5">
                        <h5> HEALTH DATA SHEET</h5>
                    </div>
                    <div class="col-md-6"></div>  
                    <hr>
                </div>
            </div>
            <div class="" id="create-health-data">
                <form action="{{route('create-health-data')}}" method="post">
                    @csrf
                    @method('post')
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner" id="allItems">
                            <div class="carousel-item active" id="item1">
                                <!-- Start of Patients Personal Info -->
                                <div class="form-group" id="patients-personalinfo" style="background-color: white;">
                                    <h5>PATIENT PROFILE</h5>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group input-group-sm">
                                                <label for="role"><b>Patient Status</b></label>
                                                <select class="form-select form-select-sm shadow-sm" name="role" aria-label=".form-select-sm example" id="patient-role">
                                                    <option selected>-- Select --</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Visitor">Visitor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="patient-idnum">
                                            <div class="form-group input-group-sm">
                                                <label for="idnumber" class=""><b>School ID Number</b></label>
                                                <input type="text" class="form-control shadow-sm" name="idnumber">
                                            </div>
                                        </div>
                                        <div class="col" id="employeeStatus" style="display:none;">
                                            <div class="form-group" id="employee">
                                                <label for="role"><b>Employee Status</b></label>
                                                <select class="form-select form-select-sm shadow-sm" name="employee_status" aria-label=".form-select-sm example" id="employee-role">
                                                    <option selected>-- Select --</option>
                                                    <option value="NTP">Non-Teaching Personnel</option>
                                                    <option value="TP">Teaching Personnel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="patient-lnk" style="display:none;">
                                            <div class="form-group input-group-sm">
                                                <label for="patient-connection"><b>School Patient</b></label>
                                                <input type="hidden" id="patient_IDnum" name="patient_IDnum">
                                                <input type="text" class="form-control shadow-sm" id="patient-completeName" data-bs-toggle="modal" data-bs-target="#patientModal">
                                            </div>
                                        </div>
                                        <div class="col" id="patientRelationship" style="display:none;">
                                            <div class="form-group input-group-sm">
                                                <label for="patient-relationship"><b>Relationship to the Patient</b></label>
                                                <input type="text" class="form-control shadow-sm" name="patientRelationship">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="first_name" class=""><b>First Name</b></label>
                                                <input type="text" class="form-control shadow-sm" name="first_name" oninput="this.value = this.value.toUpperCase()" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="middle_name" class=""><b>Middle Name</b></label>
                                                <input type="text" class="form-control shadow-sm" name="middle_name" oninput="this.value = this.value.toUpperCase()" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="last_name" class=""><b>Last Name</b></label>
                                                <input type="text" class="form-control shadow-sm" name="last_name" oninput="this.value = this.value.toUpperCase()" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="birthday" class=""><b>Date of Birth</b></label>
                                                <input type="date" class="form-control shadow-sm" name="birthday" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="sex" class=""><b>Sex</b></label> 
                                                <select name="sex" class="form-control shadow-sm" id="sex" >
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="address" class=""><b>Complete Address</b></label>
                                                <input type="text" class="form-control shadow-sm" name="address" oninput="this.value = this.value.toUpperCase()" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="contact_number" class=""><b>Contact Number</b></label>
                                                <input type="tel" class="form-control shadow-sm" name="contact_number" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="status" class=""><b>Civil Status</b></label>
                                                <input type="text" class="form-control shadow-sm" name="status" oninput="this.value = this.value.toUpperCase()" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="religion" class=""><b>Religion</b></label>
                                                <input type="text" class="form-control shadow-sm" name="religion" oninput="this.value = this.value.toUpperCase()" >
                                            </div> 
                                        </div>
                                        <div class="col mb-3">
                                            <div class="form-group input-group-sm">
                                                <label for="nationality" class=""><b>Nationality</b></label>
                                                <input type="text" class="form-control shadow-sm" name="nationality" oninput="this.value = this.value.toUpperCase()" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of patient's Persnal Info -->
                                <button class="btn btn-primary" type="button" id="next" style="float:right;" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">Next</button>
                            </div>

                            <!-- <div class="carousel-item" id="item2"> -->
                                <!-- Family data -->
                            <!-- </div> -->

                            <div class="carousel-item" id="last-item">
                                <!-- start of Patients Medical History -->
                                <div class="form-group patients-medic-data1" style="background-color: white;">
                                    <small><i><strong>Please put a check mark on the box that corresponds the answer to the questions:</strong></i></small>
                                    <!-- start of desease info -->
                                    <div class="form-group" id="patients-medic-data1">
                                        <div class="form-group heredo-heading">
                                            <h6><strong>HEREDO-FAMILIAL DISEASES</strong></h6>
                                            <small><i>(Have any members of the family had these illneses?)</i></small>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group input-group-sm">
                                                    <input type="checkbox" id="desease1" name="deseases[]" value="1"> 
                                                    <label for="desease1">Diabetes</label><br>
                                                    <input type="checkbox" id="desease2" name="deseases[]" value="2">
                                                    <label for="desease2">Asthma</label><br>
                                                    <input type="checkbox" id="desease3" name="deseases[]" value="3">
                                                    <label for="desease3">Mental Disorder/ Psychological Problem</label><br>
                                                    <input type="checkbox" id="desease4" name="deseases[]" value="4">
                                                    <label for="desease4">Hypertension or High Blood Pressure</label><br>
                                                    <input type="checkbox" id="desease5" name="deseases[]" value="5">
                                                    <label for="desease5">Tuberculosis</label><br>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group  input-group-sm">
                                                    <label for="desease6" class="">Cancer of the</label><br>
                                                    <textarea class="form-control shadow-sm" id="desease6" name="cancer" cols="10" rows="1"></textarea>
                                                    <label for="desease7" class="" >Others: Please Specify</label><br>
                                                    <textarea class="form-control shadow-sm" id="desease7" name="otherDesease" cols="10" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- end of desease info -->
                                        <div class="form-group" id="patients-medic-data2">
                                            <!-- start of immunization info -->
                                            <div class="vaccines-info">
                                                <div class="form-group vaccine-heading">
                                                    <h6><strong>IMMUNIZATION RECORD</strong></h6>
                                                    <small><i>(Have your child have had any of the following immunization?)</i></small>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6><strong>NAME OF VACCINE</strong></h6><hr>
                                                    </div>
                                                    <div class="col">
                                                        <h6><strong>NAME OF DISEASE</strong></h6><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine1" name="vaccines[]" value="1">
                                                        <label for="vaccine1">BCG</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Tuberculosis</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine2" name="vaccines[]" value="2">
                                                        <label for="vaccine2">HEPATITIS B</label><hr>
                                                    </div>
                                                    <div class="col">  
                                                        <p>Hepatitis B</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine3" name="vaccines[]" value="3">
                                                        <label for="vaccine3">PENTAVALENT VACCINE(DPT-HEP BIP)</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Diptheria (Dipterya), Tetanus (Tetano), Hepatitis B, Pertussis, Pnuemonia (Pulmonya), Meningitis</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine4" name="vaccines[]" value="4">
                                                        <label for="vaccine4">ORAL POLIO VACCINE (OPV)</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Polio</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine5" name="vaccines[]" value="5">
                                                        <label for="vaccine5">INACTIVATED POLIO VACCINE (IPV)</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Polio</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine6" name="vaccines[]" value="6">
                                                        <label for="vaccine6">PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Pnuemonia (Pulmonya), Meningitis</p><hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" id="vaccine7" name="vaccines[]" value="7">
                                                        <label for="vaccine7">MEASLES, MUMPS, RUBELLA (MMR)</label><hr>
                                                    </div>
                                                    <div class="col">
                                                        <p>Measles (Tigdas), Mumps (Beke/ Bayuok), Rebella (German Measles)</p><hr>
                                                    </div>
                                                </div>
                                                <small><i><strong>Note: Please attach a photocopy of immnization record if available</strong></i></small><br>
                                                <input type="file" id="img" name="file">
                                            </div><br>
                                            <!-- end of immunization info -->
                                            <!-- start maintenance info -->
                                            <div class="maintenance" style="display:none;">
                                                <div class="form-group med-history-heading">
                                                    <small><strong>Note: </strong> If you have any <strong><u>maintenance</u></strong> or is on <strong><u>ongoing medication</u></strong></small>
                                                    <small>it is advised that you bring it all times.</small>
                                                </div>
                                                <div class="row mt-2 mb-3">
                                                    <div class="col">
                                                        <div class="form-group input-group-sm">
                                                            <label for="medication_name" class=""><b>Name of Medication</b></label>
                                                            <input type="text" class="form-control shadow-sm" name="medication_name" oninput="this.value = this.value.toUpperCase()">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group input-group-sm">
                                                            <label for="dosage" class=""><b>Dosage</b></label>
                                                            <input type="text" class="form-control shadow-sm" name="dosage" oninput="this.value = this.value.toUpperCase()">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group input-group-sm">
                                                            <label for="frequency" class=""><b>Frequency</b></label>
                                                            <input type="text" class="form-control shadow-sm" name="frequency" oninput="this.value = this.value.toUpperCase()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end maintenance info -->
                                        </div>
                                        <!-- start of past medical history info -->
                                        <div class="form-group patients-medic-data2" style="background-color: white;">
                                            <div class="form-group med-history-heading">
                                                <h6><strong>PAST MEDICAL HISTORY</strong></h6>
                                                <small><i>(Have your child had any of the following illnesses?)</i></small>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="mdhistory1" name="illnesses[]" value="1">
                                                    <label for="mdhistory1">Chickenpox (Hangga)</label><br>
                                                    <input type="checkbox" id="mdhistory2" name="illnesses[]" value="2">
                                                    <label for="mdhistory2">Measles (Tigdas/Tipdas)</label><br>
                                                    <input type="checkbox" id="mdhistory3" name="illnesses[]" value="3">
                                                    <label for="mdhistory3">Mumps (Beke/Bayuok)</label><br>
                                                    <input type="checkbox" id="mdhistory4" name="illnesses[]" value="4">
                                                    <label for="mdhistory4">Dengue Fever</label><br>
                                                    <input type="checkbox" id="mdhistory5" name="illnesses[]" value="5">
                                                    <label for="mdhistory5">Asthma (Hubak/Hika)</label><br>
                                                    <input type="checkbox" id="mdhistory6" name="illnesses[]" value="6">
                                                    <label for="mdhistory6">Pneumonia (Pulmonya)</label><br>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="mdhistory7" name="illnesses[]" value="7">
                                                    <label for="mdhistory7">Primary Complex</label><br>
                                                    <input type="checkbox" id="mdhistory8" name="illnesses[]" value="8">
                                                    <label for="mdhistory8">Tuberculosis</label><br>
                                                    <input type="checkbox" id="mdhistory9" name="illnesses[]" value="9">
                                                    <label for="mdhistory9">Hearing Problems</label><br>
                                                    <input type="checkbox" id="mdhistory10" name="illnesses[]" value="10">
                                                    <label for="mdhistory10">Speech Problem</label><br>
                                                    <input type="checkbox" id="mdhistory11" name="illnesses[]" value="11">
                                                    <label for="mdhistory11">Visual Problem</label><br>
                                                    <input type="checkbox" id="mdhistory12" name="illnesses[]" value="12">
                                                    <label for="mdhistory12">Ear Discharge</label><br>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="mdhistory13" name="illnesses[]" value="13">
                                                    <label for="mdhistory13">Tonsilitis</label><br>
                                                    <input type="checkbox" id="mdhistory14" name="illnesses[]" value="14">
                                                    <label for="mdhistory14">Anemia</label><br>
                                                    <input type="checkbox" id="mdhistory15" name="mdhistory15" value="15">
                                                    <label for="mdhistory15">G6PD (Glucose-6-phosphate)</label><br>
                                                    <label for="mdhistory15">(dehydrogenase deficiency)</label><br>
                                                    <input type="checkbox" id="mdhistory16" name="illnesses[]" value="16">
                                                    <label for="mdhistory16">Bleeding Problems</label><br>
                                                    <input type="checkbox" id="mdhistory17" name="illnesses[]" value="17">
                                                    <label for="mdhistory17">Urinary Tract Infection (UTI)</label><br>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="mdhistory18" name="illnesses[]" value="18">
                                                    <label for="mdhistory19">Kidney Desease</label><br>
                                                    <input type="checkbox" id="mdhistory19" name="illnesses[]" value="19">
                                                    <label for="mdhistory20">Diabetes</label><br>
                                                    <input type="checkbox" id="mdhistory20" name="illnesses[]" value="20">
                                                    <label for="mdhistory21">Recurrent Indigestion</label><br>
                                                    <input type="checkbox" id="mdhistory21" name="illnesses[]" value="21">
                                                    <label for="mdhistory22">Heart or Cardiac Desease</label><br>
                                                    <input type="checkbox" id="mdhistory22" name="illnesses[]" value="22">
                                                    <label for="mdhistory23">Seizures (Patol)</label><br>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory23" class=""><b>Allergy: </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="allergy">
                                                </div>
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory24" class=""><b>Fracture in </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="fracture">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory25" class=""><b>Operation of the </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="operation">
                                                </div>
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory26" class=""><b>Hospitalization </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="hospitalization">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory27" class=""><b>Behavioral/ Psychological Problems </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="behavior">
                                                </div>
                                                <div class="col input-group-sm">
                                                    <label for="mdhistory28" class=""><b>Others: Please Specify: </b></label>
                                                    <input type="text" class="form-control shadow-sm" name="otherIllness">
                                                </div>
                                            </div>
                                            <!-- end of past medical history info -->
                                            <small><i><strong>NOTE: - If your child/children has <u>maintenance</u> or is on <u>ongoing medication</u> , it is advised that they bring it all the times.</strong></i></small>
                                            <!-- start of remarks -->
                                            <div class="form-group  input-group-sm mb-2">
                                                <label for="remark" class=""><b>Other Special Remarks: </b></label>
                                                <textarea class="form-control shadow-sm" name="remark" id="remark" cols="10" rows="2"></textarea>
                                            </div>
                                            <!-- end of remarks -->
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="button" id="prev" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">Previous</button>
                                <button type="submit" class="btn btn-primary" style="float:right;" id="submitForm" >Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered" style="width:100%" id="health-data">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th class="bg-info text-dark">ID Number</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr class="theData">
                                    <td style="display: none">{{$patient->id}}</td>
                                    <td>{{$patient->school_id}}</td>
                                    <td>{{$patient->last_name}}, {{$patient->first_name}}</td>
                                    <td>{{$patient->patient_role}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        var famForm = 
                `
                    <div class="carousel-item" id="item2">
                        <!-- Start of Family data -->
                        <h5>FAMILY DATA</h5>
                        <div class="form-group" id="patients-family-data" style="background-color: white;">
                            <!-- start of Father's info -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <input type="hidden" name="fatherRelationship" value="Father">
                                        <label for="parentsComplete_name" class=""><b>Father's Complete Name</b></label>
                                        <input type="text" class="form-control shadow-sm" name="fatherComplete_name" oninput="this.value = this.value.toUpperCase()" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsBirthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control shadow-sm" name="fatherBirthday" placeholder="MM/DD/YYYY" > 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control shadow-sm" name="fatherContact_number" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control shadow-sm" name="fatherOccupation" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control shadow-sm" name="fatherEmployment_address" oninput="this.value = this.value.toUpperCase()" > 
                                    </div>
                                </div>
                            </div>
                            <!-- end of Father's Info -->
                            <!-- Start of Mother's info -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <input type="hidden" name="motherRelationship" value="Mother">
                                        <label for="parentsComplete_name" class=""><b>Mother's Name</b></label>
                                        <input type="text" class="form-control shadow-sm" name="motherComplete_name" oninput="this.value = this.value.toUpperCase()" > 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="Mbirthdate" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control shadow-sm" name="motherBirthday" placeholder="MM/DD/YYYY" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control shadow-sm" name="motherContact_number" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control shadow-sm" name="motherOccupation" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control shadow-sm" name="motherEmployment_address" oninput="this.value = this.value.toUpperCase()" > 
                                    </div>
                                </div>
                            </div>
                            <!-- end of mother's info -->
                            <!-- start of guardian's info -->
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group input-group-sm">
                                    <label for="GName" class=""><b>Guardian's Name (<i>If not living with parent/s</i> )</b></label>
                                    <input type="text" class="form-control shadow-sm" name="GName" oninput="this.value = this.value.toUpperCase()" >
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GRelationship" class=""><b>Relationships</b></label>
                                        <input type="text" class="form-control shadow-sm" name="GRelationship" oninput="this.value = this.value.toUpperCase()" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="provinces" class=""><b>Province</b></label>
                                        <select name="" class="form-control shadow-sm" id="province">
                                            <option value="">---</option>
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->province}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label for="city" class=""><b>City</b></label>
                                            <select name="city" class="form-control shadow-sm" id="city">
                                                <option value="">---</option>
                                                @foreach($provinces as $province)
                                                    @foreach($province->city as $cities)
                                                    <option value="{{$cities->id}}" > {{$cities->city}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GContactNo" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control shadow-sm" name="GContactNo" > 
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="barangay" class=""><b>Barangay</b></label>
                                        <input type="text" class="form-control shadow-sm" name="barangay" oninput="this.value = this.value.toUpperCase()" > 
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group input-group-sm">
                                        <label for="streetAdd" class=""><b>Street Address</b></label>
                                        <input type="text" class="form-control shadow-sm" name="streetAdd" oninput="this.value = this.value.toUpperCase()" >
                                    </div>
                                </div>
                            </div>
                            <!-- end of guardian's info -->
                            <!-- start siblings info -->
                            <div class="row mt-2 wrapper">
                                <div class="row mt-2 input-box">
                                    <div class="col-md-8">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingComplete_name" class=""><b>Sibling's Complete Name</b></label>
                                            <input type="text" class="form-control shadow-sm" name="siblingComplete_name" oninput="this.value = this.value.toUpperCase()" > 
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingAge" class=""><b>Age</b></label>
                                            <input type="number" class="form-control shadow-sm" name="siblingAge" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingSex" class=""><b>Gender</b></label>
                                            <input type="text" class="form-control shadow-sm" name="siblingSex" oninput="this.value = this.value.toUpperCase()" >
                                        </div>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                        <a href="#" class="remove-lnk"><i class="fas fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group input-group-sm">
                                    <a href="#" class="add-btn"><span><i class="fa fa-plus-circle"></i></span></a>
                                </div>
                            </div>
                            <!-- end siblings info -->
                        </div>
                        <!-- End of Family data -->
                        
                        <button class="btn btn-success" type="button" id="prev" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">Previous</button>
                        <button class="btn btn-primary" type="button" id="next" style="float:right;" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">Next</button>
                    </div>
                `;
        $('#patient-role').change(function(){
            if($(this).val() == "Student"){
                $(".vaccines-info").show();
                $('.maintenance').hide();
                $('#patient-lnk').hide();
                $('#patient-idnum').show();
                $('#employeeStatus').hide();

                $('#patientRelationship').hide();
                $(famForm).insertAfter('#item1');
            }
            else if($(this).val() == "Employee"){
                $(".vaccines-info").hide();
                $('.maintenance').show();
                $('#patient-lnk').hide();
                $('#patient-idnum').show();
                $('#employeeStatus').show();

                $('#patientRelationship').hide();
                $(famForm).insertAfter('#item1');
            }
            else if($(this).val() == "Visitor"){
                $(".vaccines-info").hide();
                $('.maintenance').show();
                $('#patient-lnk').show();
                $('#patientRelationship').show()
                $('#patient-idnum').hide();
                $('#employeeStatus').hide();
                $('#item2').remove();
            }
        });

        $('.theData').click(function(){
            var id =  $(this).find(":first-child").text();
            var complete_name =  $(this).find(":first-child").next().next().text();
            $('#patientModal').modal('hide');
            $('#patient_IDnum').val(id);
            $('#patient-completeName').val(complete_name);
        });


        

        // allowed maximum input fields
            var max_input = 5;
        
        // initialize the counter for textbox
        var x = 1;

        // handle click event on Add More button
        $('.add-btn').click(function (e) {
        e.preventDefault();
        if (x < max_input) { // validate the condition
            x++; // increment the counter
            $('.wrapper').append(`
                <div class="input-box row mt-2">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="siblingComplete_name" class=""><b>Sibling's Complete Name</b></label>
                            <input type="text" class="form-control shadow-sm" name="siblingComplete_name" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="siblingAge" class=""><b>Age</b></label>
                            <input type="text" class="form-control shadow-sm" name="siblingAge">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="siblingSex" class=""><b>Gender</b></label>
                            <input type="text" class="form-control shadow-sm" name="siblingSex">
                        </div>
                    </div>
                    <div class="col-md-1 mt-4">
                        <a href="#" class="remove-lnk"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>
            `); // add input field
        }
        });

        // handle click event of the remove link
        $('.wrapper').on("click", ".remove-lnk", function (e) {
        e.preventDefault();
        $(this).closest('.input-box').remove();  // remove input field
        x--; // decrement the counter
        })
    });
  </script>
@stop