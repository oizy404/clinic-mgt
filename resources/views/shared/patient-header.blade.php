<div class="wrapper">
    <div class="top_navbar">
        <div class="logo">
            <img src="/images/acdLogo.png" alt="acd logo1" class="rounded-circle" id="acdLogo">
            <p>Clinic Management System</p>
            <img src="/images/acdLogo.png" alt="acd logo2" class="rounded-circle" id="acdLogo2">
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-md-1" style="padding: 0px;">
                <div class="patientuser-avatar mt-2">
                    <?php
                        use App\Models\PatientProfile;
                        $patients = PatientProfile::all();
                    
                        
                    ?>
                    @foreach($patients as $patient)
                            @if(Auth::user()->username == $patient->school_id)
                                <?php
                                    $fullname = $patient->first_name." ".$patient->last_name;
                                ?>
                                <center><img src="{{Avatar::create($fullname)->toBase64()}}" alt="patientuser-avatar" id="patientuser-icon" style="width: 40px;"></center>
                            @endif
                    @endforeach
                    <div class="avatar-content">
                        <a href="/logout">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>