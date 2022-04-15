@extends('layout.master')

@section('title')
    View Health Data
@stop

@section('content')

        <div class="main-container">
            <div class="print-health-data">
            <div class="print-link mb-3 mt-5">
                    <div class="col-md-1 offset-md-11">
                        <a href="#" class="btn btn-success" id="print-health-data"><i class="fa fa-print"></i></a>
                    </div>
                </div>
                <div class="row print-acr-heading">
                    <div class="col-md-8">
                        <img src="/images/acdheader.jpg" style="width: 100%;">
                    </div>
                    <div class="col-md-4 p-head">
                        <div id="acr-heading">
                            <h3 class="mb-0" style="text-align: center;">HEALTH INFORMATION</h3>
                        </div>
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
                                        <input type="text" class="form-control" name="idnumber" value="{{$patient->school_id}}" readonly="readonly">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group input-group-sm">
                                            <label for="role"><b>Patient Role</b></label>
                                            <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example" id="patient-role">
                                                <option value="{{$patient->patient_role}}"readonly="readonly">{{$patient->patient_role}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="first_name" class=""><b>First Name</b></label>
                                        <input type="text" class="form-control" name="first_name" value="{{$patient->first_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="middle_name" class=""><b>Middle Name</b></label>
                                        <input type="text" class="form-control" name="middle_name" value="{{$patient->middle_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="last_name" class=""><b>Last Name</b></label>
                                        <input type="text" class="form-control" name="last_name" value="{{$patient->last_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="birthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="birthday" value="{{$patient->birthday}}"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="sex" class=""><b>Sex</b></label>
                                        <select name="sex" class="form-control" readonly="readonly"id="sex">
                                            <option value="{{$patient->sex}}">{{$patient->sex}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="address" class=""><b>Complete Address</b></label>
                                        <input type="text" class="form-control" name="address" value="{{$patient->address}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="contact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="contact_number" value="{{$patient->contact_number}}"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="status" class=""><b>Civil Status</b></label>
                                        <input type="text" class="form-control" name="status" value="{{$patient->status}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="religion" class=""><b>Religion</b></label>
                                        <input type="text" class="form-control" name="religion" value="{{$patient->religion}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-group input-group-sm">
                                        <label for="nationality" class=""><b>Nationality</b></label>
                                        <input type="text" class="form-control" name="nationality" value="{{$patient->nationality}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of Student's Persnal Info -->
                        <!-- Start of Family data -->
                        <h5>FAMILY DATA</h5>
                        <div class="form-group" id="patients-family-data" style="background-color: white;">
                            <!-- start of Father's info -->
                    @foreach($patient->parent as $parentt)
                        @if($parentt->relationship == 'Father')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <input type="hidden" name="fatherRelationship" value="{{$parentt->relationship}}">
                                        <label for="parentsComplete_name" class=""><b>Father's Complete Name</b></label>
                                        <input type="text" class="form-control" name="fatherComplete_name" value="{{$parentt->complete_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsBirthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="fatherBirthday" value="{{$parentt->birthday}}" readonly="readonly"placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="fatherContact_number" value="{{$parentt->contact_number}}"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="fatherOccupation" value="{{$parentt->occupation}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="fatherEmployment_address" value="{{$parentt->employment_address}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
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
                                        <input type="text" class="form-control" name="motherComplete_name" value="{{$parentt->complete_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="Mbirthdate" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="motherBirthday" value="{{$parentt->birthday}}" readonly="readonly" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsContact_number" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="motherContact_number" value="{{$parentt->contact_number}}"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="motherOccupation" value="{{$parentt->occupation}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group input-group-sm">
                                        <label for="parentsEmployment_address" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="motherEmployment_address" value="{{$parentt->employment_address}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                            <!-- end of mother's info -->
                            <!-- start of guardian's info -->
                    @foreach($patient->guardian as $guardiann)
                        @foreach($guardiann->location as $locations)
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group input-group-sm">
                                    <label for="GName" class=""><b>Guardian's Name (<i>If not living with parent/s</i> )</b></label>
                                    <input type="text" class="form-control" name="GName" value="{{$guardiann->complete_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GRelationship" class=""><b>Relationship</b></label>
                                        <input type="text" class="form-control" name="GRelationship" value="{{$guardiann->relationship}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="provinces" class=""><b>Province</b></label>
                                        <select name="" class="form-control" readonly="readonly"id="province">
                                            <option value="{{$locations->city->province->id}}">{{$locations->city->province->province}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label for="city" class=""><b>City</b></label>
                                            <select name="city" class="form-control" readonly="readonly"id="city">
                                                <option value="{{$locations->city->id}}">{{$locations->city->city}}</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group input-group-sm">
                                        <label for="GContactNo" class=""><b>Contact Number</b></label>
                                        <input type="tel" class="form-control" name="GContactNo" value="{{$guardiann->contact_number}}"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <div class="form-group input-group-sm">
                                        <label for="barangay" class=""><b>Barangay</b></label>
                                        <input type="text" class="form-control" name="barangay" value="{{$locations->barangay}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group input-group-sm">
                                        <label for="streetAdd" class=""><b>Street Address</b></label>
                                        <input type="text" class="form-control" name="streetAdd" value="{{$locations->street_address}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                            <!-- end of guardian's info -->
                            <!-- start siblings info -->
                    @foreach($patient->sibling as $siblingg)
                            <div class="row mt-2 wrapper">
                                <div class="row mt-2 input-box">
                                    <div class="col-md-8">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingComplete_name" class=""><b>Sibling's Complete Name</b></label>
                                            <input type="text" class="form-control" name="siblingComplete_name" value="{{$siblingg->complete_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingAge" class=""><b>Age</b></label>
                                            <input type="number" class="form-control" name="siblingAge" value="{{$siblingg->age}}"readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group input-group-sm">
                                            <label for="siblingSex" class=""><b>Gender</b></label>
                                            <input type="text" class="form-control" name="siblingSex" value="{{$siblingg->sex}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                        </div>
                                    </div>
                                    
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
                                    @foreach($deseases as $desease)
                                        <div class="form-group input-group-sm">
                                        <input type="checkbox" name="deseases[]" value="{{$desease->id}}" onclick="return false"
                                            @foreach($patient->familyDesease as $family_desease)
                                                <?php
                                                    if( in_array($desease->id, $family_desease->pluck('desease_id')->toArray())){
                                                        echo 'checked="checked"'; 
                                                    }
                                                ?>
                                            @endforeach
                                        />
                                        {{ $desease->desease_name }}
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="col">
                                        <div class="col input-group-sm">
                                            @foreach($patient->cancer as $cancers)
                                            <label for="desease6" class=""><b>Cancer of the</b></label>
                                            <input type="text" class="form-control" name="cancer" value="{{$cancers->cancer}}"readonly="readonly">
                                            @endforeach
                                        </div>
                                        <div class="col input-group-sm">
                                            @foreach($patient->otherDesease as $other_desease)
                                            <label for="desease7" class=""><b>Others: Please Specify</b></label>
                                            <input type="text" class="form-control" name="otherDesease" value="{{$other_desease->other_desease}}"readonly="readonly">
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
                                            @foreach($vaccines as $vaccine)
                                                <div class="form-group input-group-sm">
                                                <input type="checkbox" name="vaccines[]" value="{{$vaccine->id}}"
                                                    @foreach($patient->immunization as $immunizations)
                                                        <?php
                                                            if( in_array($vaccine->id, $immunizations->pluck('vaccine_id')->toArray())){
                                                                echo 'checked="checked"'; 
                                                            }
                                                        ?>
                                                    @endforeach
                                                />
                                                {{ $vaccine->vaccine_name }} <hr>
                                                </div>
                                            @endforeach
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
                                                <input type="text" class="form-control" name="medication_name" value="{{$maintenances->medication_name}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="dosage" class=""><b>Dosage</b></label>
                                                <input type="text" class="form-control" name="dosage" value="{{$maintenances->dosage}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group input-group-sm">
                                                <label for="frequency" class=""><b>Frequency</b></label>
                                                <input type="text" class="form-control" name="frequency" value="{{$maintenances->frequency}}" oninput="this.value = this.value.toUpperCase()"readonly="readonly">
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
                                    @foreach($illnesses as $illness)
                                        @if($illness->id >= 1 && $illness->id <= 6 )
                                        <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="{{$illness->id}}" onclick="return false"
                                            @foreach($patient->historyIllness as $history_illness)
                                                <?php
                                                    if( in_array($illness->id, $history_illness->pluck('illness_id')->toArray())){
                                                        echo 'checked="checked"'; 
                                                    }
                                                ?>
                                            @endforeach
                                        />
                                        {{ $illness->illness_name }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    @foreach($illnesses as $illness)
                                        @if($illness->id >= 7 && $illness->id <= 12 )
                                        <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="{{$illness->id}}"
                                            @foreach($patient->historyIllness as $history_illness)
                                                <?php
                                                    if( in_array($illness->id, $history_illness->pluck('illness_id')->toArray())){
                                                        echo 'checked="checked"'; 
                                                    }
                                                ?>
                                            @endforeach
                                        />
                                        {{ $illness->illness_name }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    @foreach($illnesses as $illness)
                                        @if($illness->id >= 13 && $illness->id <= 17 )
                                        <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="{{$illness->id}}"
                                            @foreach($patient->historyIllness as $history_illness)
                                                <?php
                                                    if( in_array($illness->id, $history_illness->pluck('illness_id')->toArray())){
                                                        echo 'checked="checked"'; 
                                                    }
                                                ?>
                                            @endforeach
                                        />
                                        {{ $illness->illness_name }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    @foreach($illnesses as $illness)
                                        @if($illness->id >= 18 && $illness->id <= 22 )
                                        <div class="form-group input-group-sm">
                                        <input type="checkbox" name="illnesses[]" value="{{$illness->id}}"
                                            @foreach($patient->historyIllness as $history_illness)
                                                <?php
                                                    if( in_array($illness->id, $history_illness->pluck('illness_id')->toArray())){
                                                        echo 'checked="checked"'; 
                                                    }
                                                ?>
                                            @endforeach
                                        />
                                        {{ $illness->illness_name }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col input-group-sm">
                                    @foreach($patient->allergy as $allergies)
                                    <label for="mdhistory23" class=""><b>Allergy: </b></label>
                                    <input type="text" class="form-control" name="allergy" value="{{$allergies->allergy}}"readonly="readonly">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->fracture as $fractures)
                                    <label for="mdhistory24" class=""><b>Fracture in </b></label>
                                    <input type="text" class="form-control" name="fracture" value="{{$fractures->fracture}}"readonly="readonly">
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col input-group-sm">
                                    @foreach($patient->operation as $operations)
                                    <label for="mdhistory25" class=""><b>Operation of the </b></label>
                                    <input type="text" class="form-control" name="operation" value="{{$operations->operation}}"readonly="readonly">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->hospitalization as $hospitalizations)
                                    <label for="mdhistory26" class=""><b>Hospitalization </b></label>
                                    <input type="text" class="form-control" name="hospitalization" value="{{$hospitalizations->hospitalization}}"readonly="readonly">
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col input-group-sm">
                                    @foreach($patient->behavior as $behaviors)
                                    <label for="mdhistory27" class=""><b>Behavioral/ Psychological Problems </b></label>
                                    <input type="text" class="form-control" name="behavior" value="{{$behaviors->behavior}}"readonly="readonly">
                                    @endforeach
                                </div>
                                <div class="col input-group-sm">
                                    @foreach($patient->otherIllness as $other_illness)
                                    <label for="mdhistory28" class=""><b>Others: Please Specify: </b></label>
                                    <input type="text" class="form-control" name="otherIllness" value="{{$other_illness->other_illness}}"readonly="readonly">
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
    $('#print-health-data').click(function(){
        $('#print-health-data').hide();
        window.print();
    })
</script>
@stop