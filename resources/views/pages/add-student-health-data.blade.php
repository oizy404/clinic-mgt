<div class="add-student-health-data">
    <div class="col-md-10 offset-md-1 mt-3 rounded" id="create-student-health-data" style="background-color: white;">
        <form action="">
            <!-- Start of Student's Personal Info1 -->
            <div class="form-group" id="student's-personalinfo1">
                <h4 class="mb-0">HEALTH DATA SHEET</h4>
                <p>STUDENT</p>
                <div class="form-group">
                    <label for="lastname" class="form-label"><b>Last Name</b></label>
                    <input type="text" class="form-control" name="lastname">
                </div>
                <div class="form-group">
                    <label for="firstname" class="form-label"><b>First Name</b></label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div class="form-group">
                    <label for="middlename" class="form-label"><b>Middle Name</b></label>
                    <input type="text" class="form-control" name="middlename">
                </div>
                <div class="form-group">
                    <label for="birthdate" class="form-label"><b>Date of Birth</b></label>
                    <input type="date" class="form-control" name="birthdate">
                </div>
                <div class="form-group">
                    <label for="sex" class="form-label"><b>Sex</b></label>
                    <select name="sex" class="form-control" id="sex">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Male">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address" class="form-label"><b>Complete Address</b></label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label"><b>Civil Status</b></label>
                    <input type="text" class="form-control" name="status">
                </div>
                <div class="form-group">
                    <label for="religion" class="form-label"><b>Religion</b></label>
                    <input type="text" class="form-control" name="religion">
                </div>
                <div class="form-group">
                    <label for="nationality" class="form-label"><b>Nationality</b></label>
                    <input type="text" class="form-control" name="nationality">
                </div>
            </div>
            <!-- end of Student's Persnal Info -->
            <!-- Start of Family data -->
            <div class="form-group" id="student's-family-data">
                <!-- start of Father's info -->
                <div class="form-group">
                    <label for="Fname" class="form-label"><b>Father's Name</b></label>
                    <input type="text" class="form-control" name="Fname">
                </div>
                <div class="form-group">
                    <label for="Fbirthdate" class="form-label"><b>Date of Birth</b></label>
                    <input type="date" class="form-control" name="Fbirthdate" placeholder="MM/DD/YYYY">
                </div>
                <div class="form-group">
                    <label for="FOccupation" class="form-label"><b>Occupation</b></label>
                    <input type="text" class="form-control" name="FOccupation">
                </div>
                <div class="form-group">
                    <label for="FEmploymentAdd" class="form-label"><b>Employment Address</b></label>
                    <input type="text" class="form-control" name="FEmploymentAdd">
                </div>
                <!-- end of Father's Info -->
                <!-- Start of Mother's info -->
                <div class="form-group">
                    <label for="Mname" class="form-label"><b>Mother's Name</b></label>
                    <input type="text" class="form-control" name="Mname">
                </div>
                <div class="form-group">
                    <label for="Mbirthdate" class="form-label"><b>Date of Birth</b></label>
                    <input type="date" class="form-control" name="Mbirthdate" placeholder="MM/DD/YYYY">
                </div>
                <div class="form-group">
                    <label for="MOccupation" class="form-label"><b>Occupation</b></label>
                    <input type="text" class="form-control" name="MOccupation">
                </div>
                <div class="form-group">
                    <label for="MEmploymentAdd" class="form-label"><b>Employment Address</b></label>
                    <input type="text" class="form-control" name="MEmploymentAdd">
                </div>
                <!-- end of mother's info -->
                <!-- start of guardian's info -->
                <div class="form-group">
                    <label for="Gname" class="form-label"><b>Guardian's Name</b></label>
                    <input type="text" class="form-control" name="Gname">
                </div>
                <div class="form-group">
                    <label for="GRelationship" class="form-label"><b>Relationship to the Guardian</b></label>
                    <input type="text" class="form-control" name="GRelationship">
                </div>
                <div class="form-group">
                    <label for="GAddress" class="form-label"><b>Complete Address</b></label>
                    <input type="text" class="form-control" name="GAddress">
                </div>
                <div class="form-group">
                    <label for="GContactNo" class="form-label"><b>Contact Number</b></label>
                    <input type="text" class="form-control" name="GContactNo">
                </div>
                <!-- end of guardian's info -->
                <!-- start siblings info -->
                <div class="form-group">
                    <label for="siblings-info" class="form-label"><b>Siblings</b></label>
                    <textarea class="form-control" name="siblings-info" id="siblings-info" cols="70" rows="10">Siblings (Complete Name, Age, Sex)</textarea>
                </div>
                <!-- end siblings info -->
                <!-- start in case of emergency info -->
                <div class="form-group">
                    <label for="CPname" class="form-label"><b>Contact Person's Name</b></label>
                    <input type="text" class="form-control" name="CPname">
                </div>
                <div class="form-group">
                    <label for="CPRelationship" class="form-label"><b>Relationship</b></label>
                    <input type="text" class="form-control" name="CPRelationship">
                </div>
                <div class="form-group">
                    <label for="CPAddress" class="form-label"><b>Complete Address</b></label>
                    <input type="text" class="form-control" name="CPAddress">
                </div>
                <div class="form-group">
                    <label for="CPContactNo" class="form-label"><b>Contact Number</b></label>
                    <input type="text" class="form-control" name="CPContactNo">
                </div>
                <!-- end of in case of emergency info -->
                <button>Next</button>
            </div>
            <!-- end of Student's Personal Info1 -->
            <!-- start of Student's Personal Info2 -->
            <div class="form-group" id="student's-personalinfo2">
                <p><i>Please put a check mark on the box that corresponds the answer to the questions:</i></p>
                <!-- start of desease info -->
                <div class="form-group">
                    <h3>HEREDO-FAMILIAL DISEASES</h3>
                    <p>(Have any members of the family had these illneses?)</p>
                    <label for="disease1" class="form-label">Cancer of the</label><br>
                    <input type="text" class="form-control" id="disease1" name="disease1"><br>
                    <input type="checkbox" id="disease2" name="disease2" value="Diabetes">
                    <label for="disease2">Diabetes</label><br>
                    <input type="checkbox" id="disease3" name="disease3" value="Asthma">
                    <label for="disease3">Asthma</label><br>
                    <input type="checkbox" id="disease4" name="disease4" value="Mental Disorder/ Psychological Problem">
                    <label for="disease4">Mental Disorder/ Psychological Problem</label><br>
                    <input type="checkbox" id="disease5" name="disease5" value="Hypertension or High Blood Pressure">
                    <label for="disease5">Hypertension or High Blood Pressure</label><br>
                    <input type="checkbox" id="disease6" name="disease6" value="Tuberculosis">
                    <label for="disease6">Tuberculosis</label><br>
                    <label for="disease7" class="form-label" >Others: Please Specify</label><br>
                    <input type="text" id="disease7" name="disease7">
                </div>
                <!-- end of desease info -->
                <!-- start of immunization info -->
                <div class="form-group">
                    <h3>IMMUNIZATION RECORD</h3>
                    <p>(Have your child have had any of the following immunization?)</p>
                    <div class="col">
                        <h4>NAME OF VACCINE</h4>
                        <input type="checkbox" id="vaccine1" name="vaccine1" value="BCG">
                        <label for="vaccine1">BCG</label><br>
                        <input type="checkbox" id="vaccine2" name="vaccine2" value="HEPATITIS B">
                        <label for="vaccine2">HEPATITIS B</label><br>
                        <input type="checkbox" id="vaccine3" name="vaccine3" value="PENTAVALENT VACCINE">
                        <label for="vaccine3">PENTAVALENT VACCINE(DPT-HEP BIP)</label><br>
                        <input type="checkbox" id="vaccine4" name="vaccine4" value="ORAL POLIO VACCINE (OPV)">
                        <label for="vaccine4">ORAL POLIO VACCINE (OPV)</label><br>
                        <input type="checkbox" id="vaccine5" name="vaccine5" value="INACTIVATED POLIO VACCINE (IPV)">
                        <label for="vaccine5">INACTIVATED POLIO VACCINE (IPV)</label><br>
                        <input type="checkbox" id="vaccine6" name="vaccine6" value="PNEUMOCOCCAL CONJUGATE VACCINE (PCV)">
                        <label for="vaccine6">PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</label><br>
                        <input type="checkbox" id="vaccine7" name="vaccine7" value="MEASLES, MUMPS, RUBELLA (MMR)">
                        <label for="vaccine7">MEASLES, MUMPS, RUBELLA (MMR)</label><br>
                    </div>
                    <div class="col">
                        <h4>NAME OF DISEASE</h4>
                        <p>Tuberculosis</p>
                        <p>Hepatitis B</p>
                        <p>Diptheria (Dipterya), Tetanus (Tetano), Hepatitis B, Pertussis, Pnuemonia (Pulmonya), Meningitis</p>
                        <p>Polio</p>
                        <p>Polio</p>
                        <p>Pnuemonia (Pulmonya), Meningitis</p>
                        <p>Measles (Tigdas), Mumps (Beke/ Bayuok), Rebella (German Measles)</p>
                    </div>
                    <p><i>Note: Please attach a photocopy of immnization record if available</i></p>
                    <input type="file" id="img" name="file">
                </div>
                <!-- end of immunization info -->
                <!-- start of past medical history info -->
                <div class="form-group">
                    <label for="mdhistory1" class="form-label"><b>Allergy: </b></label><br>
                    <input type="text" class="form-control" name="mdhistory1"><br>
                    <input type="checkbox" id="mdhistory2" name="mdhistory2" value="Chickenpox (Hangga)">
                    <label for="mdhistory2">Chickenpox (Hangga)</label><br>
                    <input type="checkbox" id="mdhistory3" name="mdhistory3" value="Measles (Tigdas/Tipdas)">
                    <label for="mdhistory3">Measles (Tigdas/Tipdas)</label><br>
                    <input type="checkbox" id="mdhistory4" name="mdhistory4" value="Mumps (Beke/Bayuok)">
                    <label for="mdhistory4">Mumps (Beke/Bayuok)</label><br>
                    <input type="checkbox" id="mdhistory5" name="mdhistory5" value="Dengue Fever">
                    <label for="mdhistory5">Dengue Fever</label><br>
                    <input type="checkbox" id="mdhistory6" name="mdhistory6" value="Asthma (Hubak/Hika)">
                    <label for="mdhistory6">Asthma (Hubak/Hika)</label><br>
                    <input type="checkbox" id="mdhistory7" name="mdhistory7" value="Pneumonia (Pulmonya)">
                    <label for="mdhistory7">Pneumonia (Pulmonya)</label><br>
                    <input type="checkbox" id="mdhistory8" name="mdhistory8" value="Primary Complex">
                    <label for="mdhistory8">Primary Complex</label><br>
                    <input type="checkbox" id="mdhistory9" name="mdhistory9" value="Tuberculosis">
                    <label for="mdhistory9">Tuberculosis</label><br>
                    <input type="checkbox" id="mdhistory10" name="mdhistory10" value="Hearing Problems">
                    <label for="mdhistory10">Hearing Problems</label><br>
                    <input type="checkbox" id="mdhistory11" name="mdhistory11" value="Speech Problem">
                    <label for="mdhistory11">Speech Problem</label><br>
                    <input type="checkbox" id="mdhistory12" name="mdhistory12" value="Visual Problem">
                    <label for="mdhistory12">Visual Problem</label><br>
                    <input type="checkbox" id="mdhistory13" name="mdhistory13" value="Ear Discharge">
                    <label for="mdhistory13">Ear Discharge</label><br>
                    <input type="checkbox" id="mdhistory14" name="mdhistory14" value="Tonsilitis">
                    <label for="mdhistory14">Tonsilitis</label><br>
                    <input type="checkbox" id="mdhistory15" name="mdhistory15" value="Anemia">
                    <label for="mdhistory15">Anemia</label><br>
                    <input type="checkbox" id="mdhistory16" name="mdhistory16" value="G6PD (Glucose-6-phosphate dehydrogenase deficiency)">
                    <label for="mdhistory16">G6PD (Glucose-6-phosphate dehydrogenase deficiency)</label><br>
                    <input type="checkbox" id="mdhistory17" name="mdhistory17" value="Bleeding Problems">
                    <label for="mdhistory17">Bleeding Problems</label><br>
                    <input type="checkbox" id="mdhistory18" name="mdhistory18" value="Urinary Tract Infection (UTI)">
                    <label for="mdhistory18">Urinary Tract Infection (UTI)</label><br>
                    <input type="checkbox" id="mdhistory19" name="mdhistory19" value="Kidney Desease">
                    <label for="mdhistory19">Kidney Desease</label><br>
                    <input type="checkbox" id="mdhistory20" name="mdhistory20" value="Diabetes">
                    <label for="mdhistory20">Diabetes</label><br>
                    <input type="checkbox" id="mdhistory21" name="mdhistory21" value="Recurrent Indigestion">
                    <label for="mdhistory21">Recurrent Indigestion</label><br>
                    <input type="checkbox" id="mdhistory22" name="mdhistory22" value="Heart or Cardiac Desease">
                    <label for="mdhistory22">Heart or Cardiac Desease</label><br>
                    <input type="checkbox" id="mdhistory23" name="mdhistory23" value="Seizures (Patol)">
                    <label for="mdhistory23">Seizures (Patol)</label><br>
                    <label for="mdhistory24" class="form-label"><b>Fracture in </b></label><br>
                    <input type="text" class="form-control" name="mdhistory24"><br>
                    <label for="mdhistory25" class="form-label"><b>Operation of the </b></label><br>
                    <input type="text" class="form-control" name="mdhistory25"><br>
                    <label for="mdhistory26" class="form-label"><b>Hospitalization </b></label><br>
                    <input type="text" class="form-control" name="mdhistory26"><br>
                    <label for="mdhistory27" class="form-label"><b>Behavioral/ Psychological Problems </b></label><br>
                    <input type="text" class="form-control" name="mdhistory27"><br>
                    <label for="mdhistory28" class="form-label"><b>Others: Please Specify: </b></label><br>
                    <input type="text" class="form-control" name="mdhistory28"><br>
                </div>
                <p><i>NOTE: - If your child/children has <u>maintenance</u> or is on <u>ongoing medication</u> , it is advised that they bring it all the times.</i></p>
            </div>
            <!-- end of past medical history info -->
            <!-- start of remarks -->
            <div class="form-group">
                <label for="SRemarks" class="form-label"><b>Other Special Remarks: </b></label><br>
                <textarea name="SRemarks" id="SRemarks" cols="70" rows="10"></textarea>
            </div>
            <!-- end of remarks -->
        </form>
    </div>
</div>