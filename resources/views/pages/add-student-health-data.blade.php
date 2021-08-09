<div class="add-student-health-data">
    <div class="panel-heading col-md-10 offset-md-1 mt-3 rounded">
        <div class="col-md-1">
            <a href="#" id="btn-cancel" style="float:left; color: red;"><i class="fas fa-times-circle"></i></a>
        </div>
        <div class="col-md-3 offset-md-9 p-head">
            <h4 class="mb-0">HEALTH DATA SHEET</h4>
            <small>STUDENT</small>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 rounded" id="create-student-health-data">
        <form action="">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- Start of Student's Personal Info1 -->
                        <div class="form-group" id="students-personalinfo" style="background-color: white;">
                            <h5>PERSONAL INFORMATION</h5>
                            <div class="col-md-2 form-group">
                                <label for="student_idnumber" class=""><b>ID Number</b></label>
                                <input type="text" class="form-control" name="student_idnumber">
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="first_name" class=""><b>First Name</b></label>
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="middle_name" class=""><b>Middle Name</b></label>
                                        <input type="text" class="form-control" name="middle_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="last_name" class=""><b>Last Name</b></label>
                                        <input type="text" class="form-control" name="last_name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="birthday" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="birthday">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sex" class=""><b>Sex</b></label>
                                        <select name="sex" class="form-control" id="sex">
                                            <option value=""></option>
                                            <option value="Male">Male</option>
                                            <option value="Male">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class=""><b>Complete Address</b></label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="fb_account" class=""><b>Facebook Account</b></label>
                                        <input type="text" class="form-control" name="fb_account">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contact_number" class=""><b>Contact Number</b></label>
                                        <input type="text" class="form-control" name="contact_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status" class=""><b>Civil Status</b></label>
                                        <input type="text" class="form-control" name="status">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="religion" class=""><b>Religion</b></label>
                                        <input type="text" class="form-control" name="religion">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nationality" class=""><b>Nationality</b></label>
                                        <input type="text" class="form-control" name="nationality">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of Student's Persnal Info -->
                    </div>

                    <div class="carousel-item">
                        <!-- Start of Family data -->
                        <div class="form-group" id="students-family-data" style="background-color: white;">
                            <!-- start of Father's info -->
                            <h5>FAMILY DATA</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Fname" class=""><b>Father's Name</b></label>
                                        <input type="text" class="form-control" name="Fname">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Fbirthdate" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="Fbirthdate" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="FcontactNo" class=""><b>Contact Number</b></label>
                                        <input type="text" class="form-control" name="FcontactNo">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="FOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="FOccupation">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="FEmploymentAdd" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="FEmploymentAdd">
                                    </div>
                                </div>
                            </div>
                            <!-- end of Father's Info -->
                            <!-- Start of Mother's info -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Mname" class=""><b>Mother's Name</b></label>
                                        <input type="text" class="form-control" name="Mname">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Mbirthdate" class=""><b>Date of Birth</b></label>
                                        <input type="date" class="form-control" name="Mbirthdate" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="McontactNo" class=""><b>Contact Number</b></label>
                                        <input type="text" class="form-control" name="McontactNo">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="MOccupation" class=""><b>Occupation</b></label>
                                        <input type="text" class="form-control" name="MOccupation">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="MEmploymentAdd" class=""><b>Employment Address</b></label>
                                        <input type="text" class="form-control" name="MEmploymentAdd">
                                    </div>
                                </div>
                            </div>
                            <!-- end of mother's info -->
                            <!-- start of guardian's info -->
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group">
                                    <label for="Gname" class=""><b>Guardian's Name (<i>If not living with parent/s</i> )</b></label>
                                    <input type="text" class="form-control" name="Gname">
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="GRelationship" class=""><b>Relationship to the Guardian</b></label>
                                        <input type="text" class="form-control" name="GRelationship">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="GAddress" class=""><b>Complete Address</b></label>
                                        <input type="text" class="form-control" name="GAddress">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="GContactNo" class=""><b>Contact Number</b></label>
                                        <input type="text" class="form-control" name="GContactNo">
                                    </div>
                                </div>
                            </div>
                            <!-- end of guardian's info -->
                            <!-- start siblings info -->
                            <div class="form-group">
                                <label for="siblings_info" class=""><b>Siblings</b></label>
                                <textarea class="form-control" name="siblings_info" id="siblings-info" cols="10" rows="2">Siblings (Complete Name, Age, Sex)</textarea>
                            </div>
                            <!-- end siblings info -->
                        </div>
                    </div>
                    <div class="carousel-item">
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
                                    <div class="form-group">
                                        <input type="checkbox" id="disease1" name="disease1" value="Diabetes">
                                        <label for="disease1">Diabetes</label><br>
                                        <input type="checkbox" id="disease2" name="disease2" value="Asthma">
                                        <label for="disease2">Asthma</label><br>
                                        <input type="checkbox" id="disease3" name="disease3" value="Mental Disorder/ Psychological Problem">
                                        <label for="disease3">Mental Disorder/ Psychological Problem</label><br>
                                        <input type="checkbox" id="disease4" name="disease4" value="Hypertension or High Blood Pressure">
                                        <label for="disease4">Hypertension or High Blood Pressure</label><br>
                                        <input type="checkbox" id="disease5" name="disease5" value="Tuberculosis">
                                        <label for="disease5">Tuberculosis</label><br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="disease6" class="">Cancer of the</label><br>
                                        <textarea class="form-control" id="disease6" name="disease6" cols="10" rows="1"></textarea>
                                        <label for="disease7" class="" >Others: Please Specify</label><br>
                                        <textarea class="form-control" id="disease7" name="disease7" cols="10" rows="1"></textarea>
                                    </div>
                                </div>
                            </div><br>
                            <!-- end of desease info -->
                            <!-- start of immunization info -->
                            <div class="form-group">
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
                                        <input type="checkbox" id="vaccine1" name="vaccine1" value="BCG">
                                        <label for="vaccine1">BCG</label><hr>
                                    </div>
                                    <div class="col">
                                        <p>Tuberculosis</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine2" name="vaccine2" value="HEPATITIS B">
                                        <label for="vaccine2">HEPATITIS B</label><hr>
                                    </div>
                                    <div class="col">  
                                        <p>Hepatitis B</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine3" name="vaccine3" value="PENTAVALENT VACCINE">
                                        <label for="vaccine3">PENTAVALENT VACCINE(DPT-HEP BIP)</label><hr>
                                    </div>
                                    <div class="col">
                                        <p>Diptheria (Dipterya), Tetanus (Tetano), Hepatitis B, Pertussis, Pnuemonia (Pulmonya), Meningitis</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine4" name="vaccine4" value="ORAL POLIO VACCINE (OPV)">
                                        <label for="vaccine4">ORAL POLIO VACCINE (OPV)</label><hr>
                                    </div>
                                    <div class="col">
                                        <p>Polio</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine5" name="vaccine5" value="INACTIVATED POLIO VACCINE (IPV)">
                                        <label for="vaccine5">INACTIVATED POLIO VACCINE (IPV)</label><hr>
                                    </div>
                                    <div class="col">
                                        <p>Polio</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine6" name="vaccine6" value="PNEUMOCOCCAL CONJUGATE VACCINE (PCV)">
                                        <label for="vaccine6">PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</label><hr>
                                    </div>
                                    <div class="col">
                                        <p>Pnuemonia (Pulmonya), Meningitis</p><hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="vaccine7" name="vaccine7" value="MEASLES, MUMPS, RUBELLA (MMR)">
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
                    </div>

                    <div class="carousel-item">
                        <!-- start of past medical history info -->
                        <div class="form-group" id="students-medic-data2"style="background-color: white;">
                            <div class="form-group med-history-heading">
                                <h6><strong>PAST MEDICAL HISTORY</strong></h6>
                                <small><i>(Have your child had any of the following illnesses?)</i></small>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="checkbox" id="mdhistory1" name="mdhistory1" value="Chickenpox (Hangga)">
                                    <label for="mdhistory1">Chickenpox (Hangga)</label><br>
                                    <input type="checkbox" id="mdhistory2" name="mdhistory2" value="Measles (Tigdas/Tipdas)">
                                    <label for="mdhistory2">Measles (Tigdas/Tipdas)</label><br>
                                    <input type="checkbox" id="mdhistory3" name="mdhistory3" value="Mumps (Beke/Bayuok)">
                                    <label for="mdhistory3">Mumps (Beke/Bayuok)</label><br>
                                    <input type="checkbox" id="mdhistory4" name="mdhistory4" value="Dengue Fever">
                                    <label for="mdhistory4">Dengue Fever</label><br>
                                    <input type="checkbox" id="mdhistory5" name="mdhistory5" value="Asthma (Hubak/Hika)">
                                    <label for="mdhistory5">Asthma (Hubak/Hika)</label><br>
                                    <input type="checkbox" id="mdhistory6" name="mdhistory6" value="Pneumonia (Pulmonya)">
                                    <label for="mdhistory6">Pneumonia (Pulmonya)</label><br>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" id="mdhistory7" name="mdhistory7" value="Primary Complex">
                                    <label for="mdhistory7">Primary Complex</label><br>
                                    <input type="checkbox" id="mdhistory8" name="mdhistory8" value="Tuberculosis">
                                    <label for="mdhistory8">Tuberculosis</label><br>
                                    <input type="checkbox" id="mdhistory9" name="mdhistory9" value="Hearing Problems">
                                    <label for="mdhistory9">Hearing Problems</label><br>
                                    <input type="checkbox" id="mdhistory10" name="mdhistory10" value="Speech Problem">
                                    <label for="mdhistory10">Speech Problem</label><br>
                                    <input type="checkbox" id="mdhistory11" name="mdhistory11" value="Visual Problem">
                                    <label for="mdhistory11">Visual Problem</label><br>
                                    <input type="checkbox" id="mdhistory12" name="mdhistory12" value="Ear Discharge">
                                    <label for="mdhistory12">Ear Discharge</label><br>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" id="mdhistory13" name="mdhistory13" value="Tonsilitis">
                                    <label for="mdhistory13">Tonsilitis</label><br>
                                    <input type="checkbox" id="mdhistory14" name="mdhistory14" value="Anemia">
                                    <label for="mdhistory14">Anemia</label><br>
                                    <input type="checkbox" id="mdhistory15" name="mdhistory15" value="G6PD (Glucose-6-phosphate dehydrogenase deficiency)">
                                    <label for="mdhistory15">G6PD (Glucose-6-phosphate)</label><br>
                                    <label for="mdhistory15">(dehydrogenase deficiency)</label><br>
                                    <input type="checkbox" id="mdhistory16" name="mdhistory16" value="Bleeding Problems">
                                    <label for="mdhistory16">Bleeding Problems</label><br>
                                    <input type="checkbox" id="mdhistory17" name="mdhistory17" value="Urinary Tract Infection (UTI)">
                                    <label for="mdhistory17">Urinary Tract Infection (UTI)</label><br>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" id="mdhistory18" name="mdhistory18" value="Kidney Desease">
                                    <label for="mdhistory19">Kidney Desease</label><br>
                                    <input type="checkbox" id="mdhistory19" name="mdhistory19" value="Diabetes">
                                    <label for="mdhistory20">Diabetes</label><br>
                                    <input type="checkbox" id="mdhistory20" name="mdhistory20" value="Recurrent Indigestion">
                                    <label for="mdhistory21">Recurrent Indigestion</label><br>
                                    <input type="checkbox" id="mdhistory21" name="mdhistory21" value="Heart or Cardiac Desease">
                                    <label for="mdhistory22">Heart or Cardiac Desease</label><br>
                                    <input type="checkbox" id="mdhistory22" name="mdhistory22" value="Seizures (Patol)">
                                    <label for="mdhistory23">Seizures (Patol)</label><br>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label for="mdhistory23" class=""><b>Allergy: </b></label>
                                    <input type="text" class="form-control" name="mdhistory23">
                                </div>
                                <div class="col">
                                    <label for="mdhistory24" class=""><b>Fracture in </b></label>
                                    <input type="text" class="form-control" name="mdhistory24">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="mdhistory25" class=""><b>Operation of the </b></label>
                                    <input type="text" class="form-control" name="mdhistory25">
                                </div>
                                <div class="col">
                                    <label for="mdhistory26" class=""><b>Hospitalization </b></label>
                                    <input type="text" class="form-control" name="mdhistory26">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="mdhistory27" class=""><b>Behavioral/ Psychological Problems </b></label>
                                    <input type="text" class="form-control" name="mdhistory27">
                                </div>
                                <div class="col">
                                    <label for="mdhistory28" class=""><b>Others: Please Specify: </b></label>
                                    <input type="text" class="form-control" name="mdhistory28">
                                </div>
                            </div>
                            <!-- end of past medical history info -->
                            <small><i><strong>NOTE: - If your child/children has <u>maintenance</u> or is on <u>ongoing medication</u> , it is advised that they bring it all the times.</strong></i></small>
                            <!-- start of remarks -->
                            <div class="form-group mb-2">
                                <label for="SRemarks" class=""><b>Other Special Remarks: </b></label>
                                <textarea class="form-control" name="SRemarks" id="SRemarks" cols="10" rows="2"></textarea>
                            </div>
                            <!-- end of remarks -->
                            <button type="submit" class="btn" id="studenthealthdata-btn">Submit</button>
                        </div>
                    </div>
                    <!-- end of Student's Personal Info2 -->
                </div>
            </div>
        </form>
        <button class="carousel-control-prev" id="carouselbtn" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" id="carouselbtn" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>