<!-- day click dialog -->
<div class="appointment" id="dialog" style="display:none;">
    <div class="col-md-6 offset-md-3 mt-5">
        <div class="card">
            <div class="card-header bg-info">
                <h4>Add Event</h4>
            </div>
            <div class="card-body">
                <div id="dialog-body">
                    <form action="{{route('eventStore')}}" id="dayClick" method="post">
                        @csrf
                        <div class="form-group input-group-sm">
                            <!-- <input type="hidden" name="archived"> -->
                            <input type="hidden" name="patient_id" id="patient_id">
                            <label for="complete-name">Patient Name</label>
                            <input type="text" class="form-control" name="complete_name" id="complete_name">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="title"><b>Event Title</b></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Event Title">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="start"><b>Start Date/Time</b></label>
                            <input type="text" class="form-control" name="start" id="start" placeholder="Start date & time">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="end"><b>End Date/Time</b></label>
                            <input type="text" class="form-control" name="end" id="end" placeholder="End date & time">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="color">Background Color</label>
                            <input type="color" class="form-control" name="color" id="color">
                        </div>
                        <div class="form-group input-group-sm" style="display: none;">
                            <label for="textColor">Text Color</label>
                            <input type="color" class="form-control" value="#000000" name="textColor" id="textColor">
                        </div>
                        <input type="hidden" name="event_id" id="eventId">
                        <div class="form-group mt-4">
                            <button type="submit" id="action-btn" class="btn btn-primary">Add Event</button>
                            <button type="button" id="apt-btn-cancel" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- day click dialog end -->
