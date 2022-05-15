<!-- day click dialog -->
<div class="appointment" id="annual" style="display:none;">
    <div class="col-md-6 offset-md-3 mt-5">
        <div class="card">
            <div class="card-header bg-info">
                <h4>Add Event</h4>
            </div>
            <div class="card-body">
                <div id="dialog-body">
                    <form action="{{route('eventStore')}}" id="dayClick" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col">
                                <div class="form-group input-group-sm">
                                    <label for="role"><b>Patient Status</b></label>
                                    <select class="form-select form-select-sm shadow-sm" name="patientRole" aria-label=".form-select-sm example" id="patient-role">
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" id="row1Col1">

                            </div>
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="title"><b>Event Title</b></label>
                            <input type="text" class="form-control shadow-sm" name="title" id="title" placeholder="Event Title">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="start"><b>Start Date/Time</b></label>
                            <input type="text" class="form-control shadow-sm" name="start" id="start" placeholder="Start date & time">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="end"><b>End Date/Time</b></label>
                            <input type="text" class="form-control shadow-sm" name="end" id="end" placeholder="End date & time">
                        </div>
                        <div class="form-group input-group-sm">
                            <label for="color"><b>Background Color</b></label>
                            <input type="color" class="form-control shadow-sm" name="color" id="color">
                        </div>
                        <div class="form-group input-group-sm" style="display: none;">
                            <label for="textColor">Text Color</label>
                            <input type="color" class="form-control" value="#000000" name="textColor" id="textColor">
                        </div>
                        <input type="hidden" name="event_id" id="eventId">
                        <div class="form-group mt-4">
                            <button type="button" id="annual-btn-cancel" class="btn btn-danger btn-sm">Cancel</button>
                            <button type="submit" id="action-btn" class="btn btn-primary btn-sm">Add Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- day click dialog end -->
