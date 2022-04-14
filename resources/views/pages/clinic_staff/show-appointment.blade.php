<!-- start edit modal -->
<div class="appointment" id="theEvents" style="display:none;">
    <div class="col-md-6 offset-md-3 mt-5">
        <div class="card">
            <div class="card-header bg-info">
                <h4>Appointment</h4>
            </div>
            <div class="card-body">

                <div id="dialog-body">
                        <!-- <div class="form-group input-group-sm">
                            <input type="text" name="patient_idd" id="patient_idd" value="">
                            <label for="complete-name">Patient Name</label>
                            <input type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#patientModal" value="" id="complete_namee">
                        </div> -->
                        <div class="form-group input-group-sm"> 
                            <label for="title"><b>Event Title</b></label>
                            <input type="text" class="form-control" name="title" id="titlee" value="{{$listEventt->title}}" placeholder="Event Title">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="start"><b>Start Date/Time</b></label>
                            <input type="text" class="form-control" name="start" id="startt" value="{{date('F j, Y, g:i a', strtotime($listEventt->start))}}" placeholder="Start date & time">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="end"><b>End Date/Time</b></label>
                            <input type="text" class="form-control" name="end" id="endd" value="{{date('F j, Y, g:i a', strtotime($listEventt->end))}}" placeholder="End date & time">
                        </div>
                        <div class="form-group input-group-sm"  style="display: none;">
                            <label for="color">Background Color</label>
                            <input type="color" class="form-control" name="color" id="colorr">
                        </div>
                        <div class="form-group input-group-sm" style="display: none;">
                            <label for="textColor">Text Color</label>
                            <input type="color" class="form-control" value="#000000" name="textColor" id="textColorr">
                        </div>
                        <input type="hidden" name="event_id" id="eventIdd">
                        <div class="form-group mt-2">
                            <button type="button" class="btn btn-danger" id="apt-view-back">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->
