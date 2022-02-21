@extends('layout.master')

@section('title')
    STUDENT HEALTH DATA
@stop

@section('content')
@include('shared.admin-header')
@include('shared.supervisor-sidenav')

        <div class="add-student-health-data main-container">
            <div class="offset-md-1 panel-heading mt-3 rounded">
                <div class="col-md-1">
                    <!-- <a href="#" id="btn-cancel" style="float:left; color: red;"><i class="fas fa-times-circle"></i></a> -->
                </div>
                <div class="col-md-4 offset-md-8 p-head">
                    <h4 class="mb-0">HEALTH DATA SHEET</h4>
                </div>
            </div>
            <div class="offset-md-1 rounded" id="create-student-health-data">
                <form action="{{route('create-student-health-data')}}">

                    <div class="offset-md-1 role-container"  style="display: none;">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="role">Patient Role</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>-- Select Patient Role --</option>
                                    <option value="employee">Employee</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="role">Grade</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>-- Select Grade --</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Junior High School">Junior High School</option>
                                    <option value="Senior High School">Senior High School</option>
                                    <option value="College">College</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="role">Employee</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>-- Select --</option>
                                    <option value="ntp">Non-Teaching Personnel</option>
                                    <option value="tp">Teaching Personnel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="role">Non-Teaching Personnel</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>-- Select --</option>
                                    <option value="ma">M.A</option>
                                    <option value="admin">Admin</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="faculty">Faculty</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="role">Teaching Personnel</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>-- Select Department --</option>
                                    <option value="GHS">GHS</option>
                                    <option value="JHS">JHS</option>
                                    <option value="SHS">SHS</option>
                                    <option value="COLLEGE">COLLEGE</option>
                                    <option value="MWSP">MWSP</option>
                                    <option value="APCSM">APCSM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false"> -->
                        <!-- <div class="carousel-inner"> -->
                            <!-- <div class="carousel-item active"> -->
                                <!-- Start of Student's Personal Info1 -->
                                <div class="form-group" id="students-personalinfo" style="background-color: white;">
                                    <h5>PATIENT PROFILE</h5>
                                    <div class="col-md-2 form-group input-group-sm">
                                        <label for="student_idnumber" class=""><b>ID Number</b></label>
                                        <input type="text" class="form-control" name="student_idnumber">
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="first_name" class=""><b>First Name</b></label>
                                                <input type="text" class="form-control" name="first_name" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="middle_name" class=""><b>Middle Name</b></label>
                                                <input type="text" class="form-control" name="middle_name" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="last_name" class=""><b>Last Name</b></label>
                                                <input type="text" class="form-control" name="last_name" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="birthday" class=""><b>Date of Birth</b></label>
                                                <input type="date" class="form-control" name="birthday">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="sex" class=""><b>Sex</b></label>
                                                <select name="sex" class="form-control" id="sex">
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Male">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="address" class=""><b>Complete Address</b></label>
                                                <input type="text" class="form-control" name="address" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="contact_number" class=""><b>Contact Number</b></label>
                                                <input type="tel" class="form-control" name="contact_number">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="status" class=""><b>Civil Status</b></label>
                                                <input type="text" class="form-control" name="status" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="religion" class=""><b>Religion</b></label>
                                                <input type="text" class="form-control" name="religion" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="form-group input-group-sm">
                                                <label for="nationality" class=""><b>Nationality</b></label>
                                                <input type="text" class="form-control" name="nationality" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of Student's Persnal Info -->

                                <!-- Start of Family data -->
                                <h5>FAMILY DATA</h5>
                                <div class="form-group" id="students-family-data" style="background-color: white;">
                                    <!-- start of Father's info -->
                                    <!-- <h5>FAMILY DATA</h5> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsComplete_name" class=""><b>Father's Complete Name</b></label>
                                                <input type="text" class="form-control" name="parentsComplete_name" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsBirthday" class=""><b>Date of Birth</b></label>
                                                <input type="date" class="form-control" name="parentsBirthday" placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                                <input type="tel" class="form-control" name="parentsContact_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                                <input type="text" class="form-control" name="parentsOccupation" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                                <input type="text" class="form-control" name="parentsEmployment_address" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of Father's Info -->
                                    <!-- Start of Mother's info -->
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsComplete_name" class=""><b>Mother's Name</b></label>
                                                <input type="text" class="form-control" name="parentsComplete_name" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="Mbirthdate" class=""><b>Date of Birth</b></label>
                                                <input type="date" class="form-control" name="parentsBirthday" placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                                <input type="tel" class="form-control" name="parentsContact_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                                <input type="text" class="form-control" name="parentsOccupation" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                                <input type="text" class="form-control" name="parentsEmployment_address" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of mother's info -->
                                    <!-- start of guardian's info -->
                                    <div class="row mt-2">
                                        <div class="col-md-9">
                                            <div class="form-group input-group-sm">
                                            <label for="GName" class=""><b>Guardian's Name (<i>If not living with parent/s</i> )</b></label>
                                            <input type="text" class="form-control" name="GName" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="GRelationship" class=""><b>Relationship</b></label>
                                                <input type="text" class="form-control" name="GRelationship" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-9">
                                            <div class="form-group input-group-sm">
                                                <label for="streetAdd" class=""><b>Street Address</b></label>
                                                <input type="text" class="form-control" name="streetAdd" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="GContactNo" class=""><b>Contact Number</b></label>
                                                <input type="tel" class="form-control" name="GContactNo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label for="barangay" class=""><b>Barangay</b></label>
                                                <input type="text" class="form-control" name="barangay" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label for="city" class=""><b>City</b></label>
                                                <input type="text" class="form-control" name="city" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label for="province" class=""><b>Province</b></label>
                                                <input type="text" class="form-control" name="province" oninput="this.value = this.value.toUpperCase()">
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
                                                    <input type="text" class="form-control" name="siblingComplete_name" oninput="this.value = this.value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group input-group-sm">
                                                    <label for="siblingAge" class=""><b>Age</b></label>
                                                    <input type="number" class="form-control" name="siblingAge">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group input-group-sm">
                                                    <label for="siblingSex" class=""><b>Gender</b></label>
                                                    <input type="text" class="form-control" name="siblingSex" oninput="this.value = this.value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-1 mt-4">
                                                <a href="#" class="remove-lnk"><i class="fas fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="form-group input-group-sm">
                                            <button type="button" class="btn btn-success add-btn">Add More</button>
                                        </div>
                                    </div>
                                    <!-- end siblings info -->
                                </div>
                            <!-- </div> -->
                            <!-- end of Student's Personal Info2 -->

                            <!-- <div class="carousel-item"> -->
                                <!-- start of Student's Personal Info2 -->
                                <div class="form-group" id="students-medic-data1" style="background-color: white;">
                                    <small><i><strong>Please put a check mark on the box that corresponds the answer to the questions:</strong></i></small>
                                    <!-- start of desease info -->
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
                                            <!-- <div class="form-group  input-group-sm">
                                                <label for="desease6" class="">Cancer of the</label><br>
                                                <textarea class="form-control" id="desease6" name="deseases[]" cols="10" rows="1"></textarea>
                                                <label for="desease7" class="" >Others: Please Specify</label><br>
                                                <textarea class="form-control" id="desease7" name="deseases[]" cols="10" rows="1"></textarea>
                                            </div> -->
                                        </div>
                                    </div><br>
                                    <!-- end of desease info -->
                                    <!-- start of immunization info -->
                                    <div class="form-group" id="students-medic-data1">
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
                                                <input type="checkbox" id="vaccine1" name="vaccines[]" value="BCG">
                                                <label for="vaccine1">BCG</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Tuberculosis</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine2" name="vaccines[]" value="HEPATITIS B">
                                                <label for="vaccine2">HEPATITIS B</label><hr>
                                            </div>
                                            <div class="col">  
                                                <p>Hepatitis B</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine3" name="vaccines[]" value="PENTAVALENT VACCINE">
                                                <label for="vaccine3">PENTAVALENT VACCINE(DPT-HEP BIP)</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Diptheria (Dipterya), Tetanus (Tetano), Hepatitis B, Pertussis, Pnuemonia (Pulmonya), Meningitis</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine4" name="vaccines[]" value="ORAL POLIO VACCINE (OPV)">
                                                <label for="vaccine4">ORAL POLIO VACCINE (OPV)</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Polio</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine5" name="vaccines[]" value="INACTIVATED POLIO VACCINE (IPV)">
                                                <label for="vaccine5">INACTIVATED POLIO VACCINE (IPV)</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Polio</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine6" name="vaccines[]" value="PNEUMOCOCCAL CONJUGATE VACCINE (PCV)">
                                                <label for="vaccine6">PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Pnuemonia (Pulmonya), Meningitis</p><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="checkbox" id="vaccine7" name="vaccines[]" value="MEASLES, MUMPS, RUBELLA (MMR)">
                                                <label for="vaccine7">MEASLES, MUMPS, RUBELLA (MMR)</label><hr>
                                            </div>
                                            <div class="col">
                                                <p>Measles (Tigdas), Mumps (Beke/ Bayuok), Rebella (German Measles)</p><hr>
                                            </div>
                                        </div>
                                        <small><i><strong>Note: Please attach a photocopy of immnization record if available</strong></i></small><br>
                                        <input type="file" id="img" name="file">
                                    </div>
                                </div>
                                <!-- end of immunization info -->

                            
                                <!-- start of past medical history info -->
                                <div class="form-group" id="students-medic-data3"style="background-color: white;">
                                    <div class="form-group med-history-heading">
                                        <h6><strong>PAST MEDICAL HISTORY</strong></h6>
                                        <small><i>(Have your child had any of the following illnesses?)</i></small>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <input type="checkbox" id="mdhistory1" name="illnesses[]" value="Chickenpox (Hangga)">
                                            <label for="mdhistory1">Chickenpox (Hangga)</label><br>
                                            <input type="checkbox" id="mdhistory2" name="illnesses[]" value="Measles (Tigdas/Tipdas)">
                                            <label for="mdhistory2">Measles (Tigdas/Tipdas)</label><br>
                                            <input type="checkbox" id="mdhistory3" name="illnesses[]" value="Mumps (Beke/Bayuok)">
                                            <label for="mdhistory3">Mumps (Beke/Bayuok)</label><br>
                                            <input type="checkbox" id="mdhistory4" name="illnesses[]" value="Dengue Fever">
                                            <label for="mdhistory4">Dengue Fever</label><br>
                                            <input type="checkbox" id="mdhistory5" name="illnesses[]" value="Asthma (Hubak/Hika)">
                                            <label for="mdhistory5">Asthma (Hubak/Hika)</label><br>
                                            <input type="checkbox" id="mdhistory6" name="illnesses[]" value="Pneumonia (Pulmonya)">
                                            <label for="mdhistory6">Pneumonia (Pulmonya)</label><br>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="checkbox" id="mdhistory7" name="illnesses[]" value="Primary Complex">
                                            <label for="mdhistory7">Primary Complex</label><br>
                                            <input type="checkbox" id="mdhistory8" name="illnesses[]" value="Tuberculosis">
                                            <label for="mdhistory8">Tuberculosis</label><br>
                                            <input type="checkbox" id="mdhistory9" name="illnesses[]" value="Hearing Problems">
                                            <label for="mdhistory9">Hearing Problems</label><br>
                                            <input type="checkbox" id="mdhistory10" name="illnesses[]" value="Speech Problem">
                                            <label for="mdhistory10">Speech Problem</label><br>
                                            <input type="checkbox" id="mdhistory11" name="illnesses[]" value="Visual Problem">
                                            <label for="mdhistory11">Visual Problem</label><br>
                                            <input type="checkbox" id="mdhistory12" name="illnesses[]" value="Ear Discharge">
                                            <label for="mdhistory12">Ear Discharge</label><br>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="checkbox" id="mdhistory13" name="illnesses[]" value="Tonsilitis">
                                            <label for="mdhistory13">Tonsilitis</label><br>
                                            <input type="checkbox" id="mdhistory14" name="illnesses[]" value="Anemia">
                                            <label for="mdhistory14">Anemia</label><br>
                                            <input type="checkbox" id="mdhistory15" name="mdhistory15" value="G6PD (Glucose-6-phosphate dehydrogenase deficiency)">
                                            <label for="mdhistory15">G6PD (Glucose-6-phosphate)</label><br>
                                            <label for="mdhistory15">(dehydrogenase deficiency)</label><br>
                                            <input type="checkbox" id="mdhistory16" name="illnesses[]" value="Bleeding Problems">
                                            <label for="mdhistory16">Bleeding Problems</label><br>
                                            <input type="checkbox" id="mdhistory17" name="illnesses[]" value="Urinary Tract Infection (UTI)">
                                            <label for="mdhistory17">Urinary Tract Infection (UTI)</label><br>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="checkbox" id="mdhistory18" name="illnesses[]" value="Kidney Desease">
                                            <label for="mdhistory19">Kidney Desease</label><br>
                                            <input type="checkbox" id="mdhistory19" name="illnesses[]" value="Diabetes">
                                            <label for="mdhistory20">Diabetes</label><br>
                                            <input type="checkbox" id="mdhistory20" name="illnesses[]" value="Recurrent Indigestion">
                                            <label for="mdhistory21">Recurrent Indigestion</label><br>
                                            <input type="checkbox" id="mdhistory21" name="illnesses[]" value="Heart or Cardiac Desease">
                                            <label for="mdhistory22">Heart or Cardiac Desease</label><br>
                                            <input type="checkbox" id="mdhistory22" name="illnesses[]" value="Seizures (Patol)">
                                            <label for="mdhistory23">Seizures (Patol)</label><br>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col input-group-sm">
                                            <label for="mdhistory23" class=""><b>Allergy: </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                        <div class="col input-group-sm">
                                            <label for="mdhistory24" class=""><b>Fracture in </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col input-group-sm">
                                            <label for="mdhistory25" class=""><b>Operation of the </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                        <div class="col input-group-sm">
                                            <label for="mdhistory26" class=""><b>Hospitalization </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col input-group-sm">
                                            <label for="mdhistory27" class=""><b>Behavioral/ Psychological Problems </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                        <div class="col input-group-sm">
                                            <label for="mdhistory28" class=""><b>Others: Please Specify: </b></label>
                                            <input type="text" class="form-control" name="illnesses[]">
                                        </div>
                                    </div>
                                    <!-- end of past medical history info -->
                                    <small><i><strong>NOTE: - If your child/children has <u>maintenance</u> or is on <u>ongoing medication</u> , it is advised that they bring it all the times.</strong></i></small>
                                    <!-- start of remarks -->
                                    <div class="form-group  input-group-sm mb-2">
                                        <label for="SRemarks" class=""><b>Other Special Remarks: </b></label>
                                        <textarea class="form-control" name="SRemarks" id="SRemarks" cols="10" rows="2"></textarea>
                                    </div>
                                    <!-- end of remarks -->
                                    <button type="submit" class="btn" id="studenthealthdata-btn">Submit</button>
                                </div>
                            <!-- </div> -->

                        <!-- </div> -->
                    <!-- </div> -->
                </form>
                <!-- <button class="carousel-control-prev" id="carouselbtn" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" id="carouselbtn" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
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