<div class="main_body">  
  <div class="sidebar_menu">
    <div class="inner__sidebar_menu">
      <ul>

        <li>
          <a href="/clinicstaff-dashboard" class="active">
            <span class="icon"><i class="fas fa-border-all"></i></span>
            <span class="list">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="/patientLogs-page" class="active">
            <span class="icon"><i class="fa fa-users"></i></span>
            <span class="list">User Control</span>
          </a>
        </li>
        
        <li>
          <a href="/health-data">
            <span class="icon"><i class="fas fa-book-medical"></i></span>
            <span class="list">Health Data</span>
          </a>
        </li>

        <li>
          <a href="/clinicstaff/consultation-record">
            <span class="icon"><i class="fas fa-file-medical"></i></span>
            <span class="list">Consultation Record</span>
          </a>
        </li>

        <li>
          <a href="/medical-supplies-inventory">
            <span class="icon"><i class="fas fa-briefcase-medical"></i></span>
            <span class="list">Medical Supplies</span>
          </a>
        </li>

        <li>
          <a href="/clinicstaff/appointments" class="active">
            <span class="icon"><i class="fa fa-calendar-check"></i></span>
            <span class="list">Appointments</span>
          </a>
        </li>

        <li>
          <a href="/message-clinicstaff" class="position-relative" style="padding-top: 0px;">
            <span class="icon"><i class="fa fa-message mt-4"></i></span>
            <span class="list">Inbox</span>
            <span class="position-absolute top-50 start-50 translate-middle badge rounded-pill bg-danger">
              <?php
                $msgCount = DB::table('tbl_messages')->where([
                    ['readmsg', 0],
                    ['receiver',1],
                  ])->orWhere([
                    ['readmsg',0],
                    ['receiver',2]
                  ])->count();
                print($msgCount);
              ?>            
            </span>
          </a>
        </li>
        
      </ul>
      <div class="hamburger">
        <div class="inner_hamburger">
            <span class="arrow">
                <i class="fas fa-long-arrow-alt-left"></i>
                <i class="fas fa-long-arrow-alt-right"></i>
            </span>
        </div>
      </div>
    </div>
  </div>