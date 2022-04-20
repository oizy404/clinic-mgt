<div class="wrapper">
    <div class="top_navbar">
        <div class="logo">
            <a href="/clinicstaff-dashboard" class="acdLogo"><img src="/images/acdLogo.png" alt="acd logo1" class="rounded-circle" id="acdLogo"></a>
            <p>Clinic Management System</p>
            <a href="/clinicstaff-dashboard"><img src="/images/acdLogo.png" alt="acd logo2" class="rounded-circle" id="acdLogo2"></a>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-md-1" style="padding: 0px; color: #ececec;">
                <div class="" style="margin-left: 60px;">
                    <!-- <small class="bg-danger rounded-circle" style="padding: 2px 5px; font-size: 10px; float:right;">
                        
                        2
                    </small> -->
                    <a href="/message-clinicstaff">
                        <i class="fa fa-message mt-4"></i>
                        <span class="sec counter counter-lg" id="dot">
                            <?php
                                $msgCount = DB::table('tbl_messages')->where('readmsg', 0)
                                ->orWhere('sender', !1)->orWhere('sender', !2)->count();
                            ?>
                            2
                        </span>&nbsp;&nbsp;
                    </a>
                </div>
                <!-- <div class="notif-icon">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                    </a>
                </div> -->
            </div>
            <div class="col-md-1" style="padding: 0px;">
                <div class="clinicstaff-avatar mt-1">
                    <img src="/images/nurse-icon.png" alt="nurse-icon" id="nurse-icon" class="rounded-circle">
                    <div class="avatar-content">
                        <a href="/logout">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>