@extends('layout.clinicstaff-master1')

@section('title')
    Edit Health Data
@stop

@section('content')

        <div class="main-container">
            <div class="add-health-data">
                <div class="hds-heading">
                    <div class="col-md-4 offset-md-8 p-head">
                        <h4 class="mb-0">HEALTH DATA SHEET</h4>
                    </div>
                </div>
                <div class="" id="create-health-data">
                    <form action="{{route('update-health-data', $patient->id)}}" method="post">
                        @csrf
                        @method('post')
                        <!-- Start of Patients Personal Info -->
                        <div class="form-group" id="patients-personalinfo" style="background-color: white;">
                            <h5>PATIENT PROFILE</h5>
                                <div class="row">
                                    <div class="col-md-3 form-group input-group-sm">
                                        <label for="idnumber" class=""><b>ID Number</b></label>
                                        <input type="text" class="form-control" name="idnumber" value="{{$patient->school_id}}">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example" id="patient-role">
                                                <option value="{{$patient->patient_role}}">{{$patient->patient_role}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="first_name" class=""><b>First Name</b></label>
                                        <input type="text" class="form-control" name="first_name" value="{{$patient->first_name}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="middle_name" class=""><b>Middle Name</b></label>
                                        <input type="text" class="form-control" name="middle_name" value="{{$patient->middle_name}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="last_name" class=""><b>Last Name</b></label>
                                        <input type="text" class="form-control" name="last_name" value="{{$patient->last_name}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="birthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="birthday" value="{{$patient->birthday}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="sex" class=""><b>Sex</b></label>
                                        <select name="sex" class="form-control" id="sex">
                                            <option value="{{$patient->sex}}">{{$patient->sex}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="address" class=""><b>Complete Address</b></label>
                                        <input type="text" class="form-control" name="address" value="{{$patient->address}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="contact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="contact_number" value="{{$patient->contact_number}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="status" class=""><b>Civil Status</b></label>
                                        <input type="text" class="form-control" name="status" value="{{$patient->status}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="religion" class=""><b>Religion</b></label>
                                        <input type="text" class="form-control" name="religion" value="{{$patient->religion}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-group input-group-sm">
                                        <label for="nationality" class=""><b>Nationality</b></label>
                                        <input type="text" class="form-control" name="nationality" value="{{$patient->nationality}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of Student's Persnal Info -->
                        <!-- Start of Family data -->
                        <h5>FAMILY DATA</h5>
                        <div class="form-group" id="patients-family-data" style="background-color: white;">
                            <!-- start of Father's info -->
                @if($patient->parent == true)
                    @foreach($patient->parent as $parentt)
                        @if($parentt->relationship == 'Father')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <input type="hidden" name="fatherRelationship" value="{{$parentt->relationship}}">
                                        <label for="parentsComplete_name" class=""><b>Father's Complete Name</b></label>
                                        <input type="text" class="form-control" name="fatherComplete_name" value="{{$parentt->complete_name}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsBirthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="fatherBirthday" value="{{$parentt->birthday}}" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="fatherContact_number" value="{{$parentt->contact_number}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="fatherOccupation" value="{{$parentt->occupation}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="fatherEmployment_address" value="{{$parentt->employment_address}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                            <!-- end of Father's Info -->
                        @elseif($parentt->relationship == 'Mother')
                            <!-- Start of Mother's info -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <input type="hidden" name="motherRelationship" value="{{$parentt->relationship}}">
                                        <label for="parentsComplete_name" class=""><b>Mother's Name</b></label>
                                        <input type="text" class="form-control" name="motherComplete_name" value="{{$parentt->complete_name}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="Mbirthdate" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="motherBirthday" value="{{$parentt->birthday}}" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="motherContact_number" value="{{$parentt->contact_number}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="motherOccupation" value="{{$parentt->occupation}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="motherEmployment_address" value="{{$parentt->employment_address}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @elseif($patient->guardian == true)
                            <!-- end of mother's info -->
                            <!-- start of guardian's info -->
                    @foreach($patient->guardian as $guardiann)
                        @foreach($guardiann->location as $locations)
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group input-group-sm">
                                    <label for="GName" class=""><b>Guardian's Name (<i>If not living with parent/s</i> )</b></label>
                                    <input type="text" class="form-control" name="GName" value="{{$guardiann->complete_name}}" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GRelationship" class=""><b>Relationship</b></label>
                                        <input type="text" class="form-control" name="GRelationship" value="{{$guardiann->relationship}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="provinces" class=""><b>Province</b></label>
                                        <select name="" class="form-control" id="province">
                                            <option value="{{$locations->city->province->id}}">{{$locations->city->province->province}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label for="city" class=""><b>City</b></label>
                                            <select name="city" class="form-control" id="city">
                                                <option value="{{$locations->city->id}}">{{$locations->city->city}}</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GContactNo" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="GContactNo" value="{{$guardiann->contact_number}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="barangay" class=""><b>Barangay</b></label>
                                        <input type="text" class="form-control" name="barangay" value="{{$locations->barangay}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group input-group-sm">
                                        <label for="streetAdd" class=""><b>Street Address</b></label>
                                        <input type="text" class="form-control" name="streetAdd" value="{{$locations->street_address}}" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
                            <!-- end of guardian's info -->
                            <!-- start siblings info -->
                    @foreach($patient->sibling as $siblingg)
                            <div class="row mt-2 wrapper">
                                <div class="row mt-2 input-box">
                                    <div class="col-md-8">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingComplete_name" class=""><b>Sibling's Complete Name</b></label>
                                            <input type="text" class="form-control" name="siblingComplete_name" value="{{$siblingg->complete_name}}" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingAge" class=""><b>Age</b></label>
                                            <input type="number" class="form-control" name="siblingAge" value="{{$siblingg->age}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingSex" class=""><b>Gender</b></label>
                                            <input type="text" class="form-control" name="siblingSex" value="{{$siblingg->sex}}" oninput="this.value = this.value.toUpperCase()">
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
                    @endforeach
                            <!-- end siblings info -->
                        </div>
                        <!-- End of Family data -->

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
                                        <input type="checkbox" name="deseases[]" value="1"
                                            @foreach($patient->familyDesease as $family_desease)
                                            {{ ($family_desease->desease_id == 1 ? ' checked' : '') }}

                                            @endforeach
                                        > Diabetes <br>
                                        <input type="checkbox" name="deseases[]" value="2"
                                            @foreach($patient->familyDesease as $family_desease)
                                            {{ ($family_desease->desease_id == 2 ? ' checked' : '') }}

                                            @endforeach
                                        > Asthma <br>
                                        <input type="checkbox" name="deseases[]" value="3"
                                            @foreach($patient->familyDesease as $family_desease)
                                            {{ ($family_desease->desease_id == 3 ? ' checked' : '') }}

                                            @endforeach
                                        > Mental Disorder/Psychological Problem <br>
                                        <input type="checkbox" name="deseases[]" value="4"
                                            @foreach($patient->familyDesease as $family_desease)
                                            {{ ($family_desease->desease_id == 4 ? ' checked' : '') }}

                                            @endforeach
                                        > Hypertension or High Blood Pressure <br>
                                        <input type="checkbox" name="deseases[]" value="5"
                                            @foreach($patient->familyDesease as $family_desease)
                                            {{ ($family_desease->desease_id == 5 ? ' checked' : '') }}

                                            @endforeach
                                        > Tuberculosis <br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col input-group-sm">
                                            @foreach($patient->cancer as $cancers)
                                            <label for="desease6" class=""><b>Cancer of the</b></label>
                                            <input type="text" class="form-control" name="cancer" value="{{$cancers->cancer}}">
                                            @endforeach
                                        </div>
                                        <div class="col input-group-sm">
                                            @foreach($patient->otherDesease as $other_desease)
                                            <label for="desease7" class=""><b>Others: Please Specify</b></label>
                                            <input type="text" class="form-control" name="otherDesease" value="{{$other_desease->other_desease}}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div><br>
                            <!-- end of desease info -->
                            <div class="form-group" id="patients-medic-data2">
                                <!-- start of immunization info -->
                            @if($patient->patient_role == "Student")
                                <div class="vaccines-info">
                                    <div class="form-group vaccine-heading">
                                        <h6><strong>IMMUNIZATION RECORD</strong></h6>
                                        <small><i>(Have your child have had any of the following immunization?)</i></small>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <h6><strong>NAME OF VACCINE</strong></h6><hr>
                                                <div class="form-group input-group-sm">
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="1"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 1 ? ' checked' : '') }}
                                                        @endforeach
                                                    > BCG <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="2"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 2 ? ' checked' : '') }}
                                                        @endforeach
                                                    > HEPATITIS B <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="3"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 3 ? ' checked' : '') }}
                                                        @endforeach
                                                    > PENTAVALENT VACCINE (DPT- HEP B - HiB) <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="4"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 4 ? ' checked' : '') }}
                                                        @endforeach
                                                    > ORAL POLIO VACCINE (OPV) <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="5"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 5 ? ' checked' : '') }}
                                                        @endforeach
                                                    > INACTIVATED POLIO VACCINE (IPV) <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="6"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 6 ? ' checked' : '') }}
                                                        @endforeach
                                                    > PNEUMOCOCCAL CONJUGATE VACCINE (PCV) <br><hr>
                                                    <input type="checkbox" id="vaccine1" name="vaccines[]" value="7"
                                                        @foreach($patient->immunization as $immunizations)
                                                        {{ ($immunizations->vaccine_id == 7 ? ' checked' : '') }}
                                                        @endforeach
                                                    > MEASILES, MUMPS, RUBELLA (MMR) <br><hr>
                                                </div>
                                        </div>
                                        <div class="col">
                                            <h6><strong>NAME OF DISEASE</strong></h6><hr>
                                            <p>Tuberculosis</p><hr>  
                                            <p>Hepatitis B</p><hr>
                                            <p>Diptheria, Tetanus, Hepatitis B, Pertussis, Pnuemonia, Meningitis</p><hr>
                                            <p>Polio</p><hr>
                                            <p>Polio</p> <hr>
                                            <p>Pnuemonia (Pulmonya), Meningitis</p><hr>
                                            <p>Measles (Tigdas), Mumps (Beke/ Bayuok), Rebella (German Measles)</p><hr>
                                        </div>
                                    </div>
                                    <small><i><strong>Note: Please attach a photocopy of immnization record if available</strong></i></small><br>
                                    <input type="file" id="img" name="file">
                                </div><br>
                                <!-- end of immunization info -->
                                <!-- start maintenance info -->
                            @elseif($patient->patient_role == "Employee" || $patient->patient_role == "Visitor")
                                <div class="maintenance">
                                    <div class="form-group med-history-heading">
                                        <small><strong>Note: </strong> If you have any <strong><u>maintenance</u></strong> or is on <strong><u>ongoing medication</u></strong></small>
                                        <small>it is advised that you bring it all times.</small>
                                    </div>
                                    <div class="row mt-2 mb-3">
                                    @foreach($patient->maintenance as $maintenances)
                                        <div class="col">
                                            <div class="form-group input-group-sm">
                                                <label for="medication_name" class=""><b>Name of Medication</b></label>
                                                <input type="text" class="form-control" name="medication_name" value="{{$maintenances->medication_name}}" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="dosage" class=""><b>Dosage</b></label>
                                                <input type="text" class="form-control" name="dosage" value="{{$maintenances->dosage}}" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="frequency" class=""><b>Frequency</b></label>
                                                <input type="text" class="form-control" name="frequency" value="{{$maintenances->frequency}}" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                <div>
                                <!-- end maintenance info -->
                            </div>
                            @endif
                        </div>

                        <!-- start of past medical history info -->
                        <div class="form-group patients-medic-data2" style="background-color: white;">
                            <div class="form-group med-history-heading">
                                <h6><strong>PAST MEDICAL HISTORY</strong></h6>
                                <small><i>(Have your child had any of the following illnesses?)</i></small>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="1"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 1 ? ' checked' : '') }}
                                            @endforeach
                                        > Chickenpox(Hangga) <br>
                                        <input type="checkbox" name="illnesses[]" value="2"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 2 ? ' checked' : '') }}
                                            @endforeach
                                        > Measles(Tigdas/Tipdas) <br>
                                        <input type="checkbox" name="illnesses[]" value="3"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 3 ? ' checked' : '') }}
                                            @endforeach
                                        > Mumps(Beke/Bayuok) <br>
                                        <input type="checkbox" name="illnesses[]" value="4"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 4 ? ' checked' : '') }}
                                            @endforeach
                                        > Dengue Fever <br>
                                        <input type="checkbox" name="illnesses[]" value="5"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 5 ? ' checked' : '') }}
                                            @endforeach
                                        > Asthma(Hubak,Hika) <br>
                                        <input type="checkbox" name="illnesses[]" value="6"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 6 ? ' checked' : '') }}
                                            @endforeach
                                        > Pneumonia (Pulmonya) <br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="7"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 7 ? ' checked' : '') }}
                                            @endforeach
                                        > Primary Complex <br>
                                        <input type="checkbox" name="illnesses[]" value="8"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 8 ? ' checked' : '') }}
                                            @endforeach
                                        > Tuberculosis <br>
                                        <input type="checkbox" name="illnesses[]" value="9"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 9 ? ' checked' : '') }}
                                            @endforeach
                                        > Hearing Problems <br>
                                        <input type="checkbox" name="illnesses[]" value="10"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 10 ? ' checked' : '') }}
                                            @endforeach
                                        > Speech Problem <br>
                                        <input type="checkbox" name="illnesses[]" value="11"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 11 ? ' checked' : '') }}
                                            @endforeach
                                        > Visual Problem <br>
                                        <input type="checkbox" name="illnesses[]" value="12"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 12 ? ' checked' : '') }}
                                            @endforeach
                                        > Ear Discharge <br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                    
                                        <input type="checkbox" name="illnesses[]" value="13"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 13 ? ' checked' : '') }}
                                            @endforeach
                                        > Tonsilitis <br>
                                        <input type="checkbox" name="illnesses[]" value="14"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 14 ? ' checked' : '') }}
                                            @endforeach
                                        > Anemia <br>
                                        <input type="checkbox" name="illnesses[]" value="15"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 15 ? ' checked' : '') }}
                                            @endforeach
                                        > G6PD (Glucose-6-phosphate dehydrogenase deficiency) <br>
                                        <input type="checkbox" name="illnesses[]" value="16"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 16 ? ' checked' : '') }}
                                            @endforeach
                                        > Bleeding Problems <br>
                                        <input type="checkbox" name="illnesses[]" value="17"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 17 ? ' checked' : '') }}
                                            @endforeach
                                        > Urinary Tract Infection (UTI) <br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                    
                                        <input type="checkbox" name="illnesses[]" value="18"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 18 ? ' checked' : '') }}
                                            @endforeach
                                        > Kidney Disease <br>
                                        <input type="checkbox" name="illnesses[]" value="19"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 19 ? ' checked' : '') }}
                                            @endforeach
                                        > Diabetes <br>
                                        <input type="checkbox" name="illnesses[]" value="20"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 20 ? ' checked' : '') }}
                                            @endforeach
                                        > Recurrent Indigestion <br>
                                        <input type="checkbox" name="illnesses[]" value="21"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 22 ? ' checked' : '') }}
                                            @endforeach
                                        > Heart or Cardiac Desease <br>
                                        <input type="checkbox" name="illnesses[]" value="22"
                                            @foreach($patient->historyIllness as $history_illness)
                                                {{ ($history_illness->illness_id == 22 ? ' checked' : '') }}
                                            @endforeach
                                        > Seizures (Patol) <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col input-group-sm">
                                    @foreach($patient->allergy as $allergies)
                                    <label for="mdhistory23" class=""><b>Allergy: </b></label>
                                    <input type="text" class="form-control" name="allergy" value="{{$allergies->allergy}}">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->fracture as $fractures)
                                    <label for="mdhistory24" class=""><b>Fracture in </b></label>
                                    <input type="text" class="form-control" name="fracture" value="{{$fractures->fracture}}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col input-group-sm">
                                    @foreach($patient->operation as $operations)
                                    <label for="mdhistory25" class=""><b>Operation of the </b></label>
                                    <input type="text" class="form-control" name="operation" value="{{$operations->operation}}">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->hospitalization as $hospitalizations)
                                    <label for="mdhistory26" class=""><b>Hospitalization </b></label>
                                    <input type="text" class="form-control" name="hospitalization" value="{{$hospitalizations->hospitalization}}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col input-group-sm">
                                    @foreach($patient->behavior as $behaviors)
                                    <label for="mdhistory27" class=""><b>Behavioral/ Psychological Problems </b></label>
                                    <input type="text" class="form-control" name="behavior" value="{{$behaviors->behavior}}">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->otherIllness as $other_illness)
                                    <label for="mdhistory28" class=""><b>Others: Please Specify: </b></label>
                                    <input type="text" class="form-control" name="otherIllness" value="{{$other_illness->other_illness}}">
                                    @endforeach
                                </div>
                            </div>
                            <!-- end of past medical history info -->
                            <small><i><strong>NOTE: - If your child/children has <u>maintenance</u> or is on <u>ongoing medication</u> , it is advised that they bring it all the times.</strong></i></small>
                            <!-- start of remarks -->
                            <div class="form-group  input-group-sm mb-2">
                                @foreach($patient->remark as $remarks)
                                <label for="remark" class=""><b>Other Special Remarks: </b></label>
                                <textarea class="form-control" name="remark" id="SRemarks" cols="10" rows="2">{{$remarks->remark}}</textarea>
                                @endforeach
                            </div>
                            <!-- end of remarks -->
                            <button type="submit" class="btn btn-primary" id="studenthealthdata-btn">Update</button>
                        </div>
                        <!-- end of Patients Medical History -->
                    </form>
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

        $('#patient-role').change(function(){
            if($(this).val() == "Student"){
                $(".vaccines-info").show();
                $('.maintenance').hide();
            }
            else if($(this).val() == "Employee" || $(this).val() == "Visitor"){
                $(".vaccines-info").hide();
                $('.maintenance').show();
            }
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
                            <input type="text" class="form-control" name="siblingComplete_name" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="siblingAge" class=""><b>Age</b></label>
                            <input type="text" class="form-control" name="siblingAge">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="siblingSex" class=""><b>Gender</b></label>
                            <input type="text" class="form-control" name="siblingSex">
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