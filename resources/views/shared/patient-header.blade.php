<div class="wrapper">
    <div class="top_navbar">
        <div class="logo">
            <img src="/images/acdLogo.png" alt="acd logo1" class="rounded-circle" id="acdLogo">
            <p>Clinic Management System</p>
            <img src="/images/acdLogo.png" alt="acd logo2" class="rounded-circle" id="acdLogo2">
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-md-1">
                <div class="message-icon">
                    <a href="/message-clinicstaff">
                        <i class="fal fa-comment-alt-medical"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="notif-icon">
                    <a href="#">
                        <i class="far fa-bell"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="logout-user">
                    <a href="/logout">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="list">Log Out</span>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="patientuser-avatar">
                    <?php
                        use App\Models\PatientProfile;
                        $patients = PatientProfile::all();
                    
                        
                    ?>
                    @foreach($patients as $patient)
                            @if(Auth::user()->username == $patient->school_id)
                                <?php
                                    $fullname = $patient->first_name." ".$patient->last_name;
                                ?>
                                <center><img src="{{Avatar::create($fullname)->toBase64()}}" alt="patientuser-avatar" style="width: 40px;"></center>
                            @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>