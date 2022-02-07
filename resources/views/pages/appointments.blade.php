@extends('layout.master')

@section('title')
    APPOINTMENT BOOKING
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')

<!-- Jquery Ui Css -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <div class="appointment-content">
        <div class="col-md-9 offset-md-2">
            <h1>APPOINTMENTS BOOKING</h1>
            <div class="container">
                <div class="add-event">
                    <button class="btn btn-danger" id="addEventBtn">Add Event</button>
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- day click dialog -->
    <div id="dialog" style="display:none;">
        <div id="dialog-body">
            <form action="{{route('eventStore')}}" id="dayClick" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Event Title">
                </div>
                <div class="form-group">
                    <label for="start">Start Date/Time</label>
                    <input type="text" class="form-control" name="start" id="start" placeholder="Start date & time">
                </div>
                <div class="form-group">
                    <label for="end">End Date/Time</label>
                    <input type="text" class="form-control" name="end" id="end" placeholder="End date & time">
                </div>
                <div class="form-group">
                    <label for="allDay">All Day</label><br>
                    <input type="checkbox" value="1" name="allDay" checked>All Day<br>   
                    <input type="checkbox" value="0" name="Partial">Partial<br>
                </div>
                <div class="form-group">
                    <label for="color">Background Color</label>
                    <input type="color" class="form-control" name="color" id="color">
                </div>
                <div class="form-group">
                    <label for="textColor">Text Color</label>
                    <input type="color" class="form-control" name="textColor" id="textColor">
                </div>
                <input type="hidden" name="event_id" id="eventId">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Event</button>
                </div>
            </form>
        </div>
    </div>
    <!-- day click dialog end -->

    <!-- edit/delete dialog -->
    <div id="edit-delete-dialog" style="display:none;">
        <div id="dialog-body">
            <form action="{{route('eventStore')}}" id="dayClick" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Event Title">
                </div>
                <div class="form-group">
                    <label for="start">Start Date/Time</label>
                    <input type="text" class="form-control" name="start" id="start" placeholder="Start date & time">
                </div>
                <div class="form-group">
                    <label for="end">End Date/Time</label>
                    <input type="text" class="form-control" name="end" id="end" placeholder="End date & time">
                </div>
                <div class="form-group">
                    <label for="allDay">All Day</label><br>
                    <input type="checkbox" value="1" name="allDay" checked>All Day<br>   
                    <input type="checkbox" value="0" name="Partial">Partial<br>
                </div>
                <div class="form-group">
                    <label for="color">Background Color</label>
                    <input type="color" class="form-control" name="color" id="color">
                </div>
                <div class="form-group">
                    <label for="textColor">Text Color</label>
                    <input type="color" class="form-control" name="textColor" id="textColor">
                </div>
                <input type="hidden" name="event_id" id="eventId">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Event</button>
                    <a href="" class="btn btn-danger" id="deleteEvent" onclick="return confirm('Are you sure to delete event?')">Delete Event</a>
                </div>
            </form>
        </div>
    </div>
    <!-- edit/delete dialog end -->

    <div class="event-hover-btn">
        <button><span><i class="fas fa-trash"></i></span></button>
        <button><span><i class="fas fa-pen-square"></i></span></button>
    </div>

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- moment js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- Jquery Ui js -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Fullcalendar js -->
<script src="{{asset('js/fullcalendar.js')}}"></script>

<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

<script>
jQuery(document).ready(function($){
    $(document).ready(function(){
        function convert(str){ //convert date and time
            const d = new Date(str);
            let month = '' + (d.getMonth() + 1);
            let day = '' + d.getDate();
            let year = d.getFullYear();
            if(month.length < 2) month = '0' + month;
            if(day.length < 2) day = '0' + day;
            let hour = '' + d.getUTCHours();
            let minutes = '' + d.getUTCMinutes();
            let seconds = '' + d.getUTCSeconds();
            if(hour.length < 2) hour = '0' + hour;
            if(minutes.length < 2) minutes = '0' + minutes;
            if(seconds.length < 2) seconds = '0' + seconds;
            return [year,month,day].join('-')+' '+[hour,minutes,seconds].join(':');
        }
        $('#addEventBtn').on('click',function(){
            $('#dialog').dialog({
                title:'Add Event',
                width:600,
                height:600,
                modal:true,
                show:{effect:'clip', duration:300},
                hide:{effect:'clip', duration:250}
            })
        });
        var calendar = $('#calendar').fullCalendar({ //display page, show all the events
            selectable: true,
            selectHelper: true,
            // aspectRatio: 2,
            height: 650,
            showNonCurrentDates: false,
            editable: false,
            defaultView: 'month',
            yearColumns: 4,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,basicWeek,basicDay'
            },
            events:"{{route('allEvent')}}", //show all the events
            dayClick:function(date,event,view){ //create event in one click
                $('#start').val(convert(date));
                $('#dialog').dialog({
                    title:'Add Event',
                    width:600,
                    height:600,
                    modal:true,
                    show:{effect:'clip', duration:300},
                    hide:{effect:'clip', duration:250}
                })
            },
            select:function(start,end){ //dragging to create event
                $('#start').val(convert(start));
                $('#end').val(convert(end));
                $('#dialog').dialog({
                    title:'Add Event',
                    width:600,
                    height:600,
                    modal:true,
                    show:{effect:'clip', duration:300},
                    hide:{effect:'clip', duration:250}
                })
            },
            eventClick:function(event){ //clicking event to UPDATE
                $('#title').val(event.title);
                $('#start').val(convert(event.start));
                $('#end').val(convert(event.end));
                $('#color').val(event.color);
                $('#testColor').val(event.testColor);
                $('#eventId').val(event.id);
                $('#update').html('Update Event');
                var url="{{url('deleteEvent')}}";
                $('#deleteEvent').attr('href',url+'/'+event.id)
                
                $('#edit-delete-dialog').dialog({
                    title:'Edit Event',
                    width:600,
                    height:600,
                    modal:true,
                    show:{effect:'clip', duration:300},
                    hide:{effect:'clip', duration:250}
                })
            },
            eventMouseover: function(event, jsEvent, view) {
                $('.fc-day-grid-event').append(
                    '<div class="edit-delete-btn"><button class="btn"><i class="fas fa-pen-square"></i></button><a href="" class="btn" id="deleteEvent" onclick="return confirm("Are you sure to delete event?"><i class="fas fa-trash"></i></a></div>'
                );
            },
            eventMouseout: function(event, jsEvent) {
                $('.edit-delete-btn').remove();
            },
        });
    })
});
</script>
@include('vendor.sweetalert.alert')
@stop