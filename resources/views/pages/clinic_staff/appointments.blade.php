@extends('layout.master')

@section('title')
    APPOINTMENT BOOKING
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')
<style>
    .edit-delete-btn{
        background-color: gray;
        position: absolute;
        max-width: 30%;
    }
    .edit-delete-btn .btn{
        font-size: 15px;
    }
</style>

<!-- Jquery Ui Css -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

        {{session('rank')}}
        <div class="appointment-content main-container">
            <div class="col-md-10 offset-md-1">
                <h1>APPOINTMENTS BOOKING</h1>
                <div class="appointment-container">
                    <div class="add-event mb-3">
                        <button class="btn btn-primary" id="addEventBtn">Add Event</button>
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
                    <div class="form-group input-group-sm">
                        <!-- <input type="hidden" name="archived"> -->
                        <input type="hidden" name="patient_id" id="patient_id">
                        <label for="complete-name">Patient Name</label>
                        <input type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#patientModal" name="complete_name" id="complete_name">
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
                        <label for="allDay">All Day</label><br>
                        <input type="checkbox" value="1" name="allDay" checked>All Day<br>   
                        <input type="checkbox" value="0" name="Partial">Partial<br>
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="color">Background Color</label>
                        <input type="color" class="form-control" name="color" id="color">
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="textColor">Text Color</label>
                        <input type="color" class="form-control" value="#000000" name="textColor" id="textColor">
                    </div>
                    <input type="hidden" name="event_id" id="eventId">
                    <div class="form-group mt-2">
                        <button type="submit" id="action-btn" class="btn btn-primary">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- day click dialog end -->
        <!-- start edit modal -->
        <div id="dialog2" style="display:none;">
            <div id="dialog-body">
                <form action="{{route('eventStore')}}" id="dayClick" method="post">
                    @csrf
                    <div class="form-group input-group-sm">
                        <input type="text" name="patient_id" id="patient_idd" value="">
                    @foreach($event as $eventt)
                        <input type="text" name="patientId" id="patientId" value="{{$eventt->patient_id}}">
                        <label for="complete-name">Patient Name</label>
                        <input type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#patientModal" value="{{$eventt->patient->first_name}} {{$eventt->patient->last_name}}" id="complete_namee">
                    @endforeach
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="title"><b>Event Title</b></label>
                        <input type="text" class="form-control" name="title" id="titlee" placeholder="Event Title">
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="start"><b>Start Date/Time</b></label>
                        <input type="text" class="form-control" name="start" id="startt" placeholder="Start date & time">
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="end"><b>End Date/Time</b></label>
                        <input type="text" class="form-control" name="end" id="endd" placeholder="End date & time">
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="allDay">All Day</label><br>
                        <input type="checkbox" value="1" name="allDay" checked>All Day<br>   
                        <input type="checkbox" value="0" name="Partial">Partial<br>
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="color">Background Color</label>
                        <input type="color" class="form-control" name="color" id="colorr">
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="textColor">Text Color</label>
                        <input type="color" class="form-control" value="#000000" name="textColor" id="textColorr">
                    </div>
                    <input type="hidden" name="event_id" id="eventIdd">
                    <div class="form-group mt-2">
                        <button type="submit" id="action-btn" class="btn btn-primary">Update Event</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end edit modal -->

        <!-- Modal -->
        <div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered" style="width:100%" id="health-data">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th class="bg-info text-dark">ID Number</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr class="patientsData">
                                    <td style="display: none">{{$patient->id}}</td>
                                    <td>{{$patient->school_id}}</td>
                                    <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                    <td>{{$patient->patient_role}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<!-- Jquery min-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- moment js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- Jquery Ui js -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Fullcalendar js -->
<script src="{{asset('js/fullcalendar.js')}}"></script>
<!-- Alert -->
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

<script>
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
      
      $('.patientsData').click(function(){
            var patient_id =  $(this).find(":first-child").text();
            var complete_name = $(this).find(":first-child").next().next().text();
            $('#patientModal').modal('hide');
            $('#patient_id').val(patient_id);
            $('#complete_name').val(complete_name);
        });
  </script>
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
                width:650,
                height:600,
                modal:true,
                show:{effect:'clip', duration:300},
                hide:{effect:'clip', duration:250}
            })
        })
        var calendar = $('#calendar').fullCalendar({ //display page, show all the events
            selectable: true,
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
                $('#action-btn').html('Add Event');
                $('#dialog').dialog({
                    title:'Add Event',
                    width:650,
                    height:600,
                    modal:true,
                    show:{effect:'clip', duration:300},
                    hide:{effect:'clip', duration:250}
                })
            },
            select:function(start,end){ //dragging to create event
                $('#start').val(convert(start));
                $('#end').val(convert(end));
                $('#action-btn').html('Add Event');
                $('#dialog').dialog({
                    title:'Add Event',
                    width:650,
                    height:600,
                    modal:true,
                    show:{effect:'clip', duration:300},
                    hide:{effect:'clip', duration:250}
                })
            },
            eventClick:function(event){ //clicking event to UPDATE
                $('#patient_idd').val(event.patient_id);
                $('#complete_namee').val();
                $('#titlee').val(event.title);
                $('#startt').val(convert(event.start));
                $('#endd').val(convert(event.end));
                $('#colorr').val(event.color);
                $('#testColorr').val(event.testColor);
                $('#eventIdd').val(event.id);
                var url="{{url('deleteEvent')}}";
                $('#deleteEvent').attr('href',url+'/'+event.id)
                    $('#dialog2').dialog({
                        title:'Edit Event',
                        width:650,
                        height:600,
                        modal:true,
                        show:{effect:'clip', duration:300},
                        hide:{effect:'clip', duration:250}
                    })
                
            },
            eventMouseover: function(event, jsEvent, view) {
                $(this).append(
                    '<div class="edit-delete-btn"><a href="" class="btn" id="deleteEvent2" onclick="return confirm("Are you sure to delete event?"><i class="fas fa-trash"></i></a></div>'
                );
            },
            eventMouseout: function(event, jsEvent) {
                $('.edit-delete-btn').remove();
            }
        })
    })
});
</script>
@include('vendor.sweetalert.alert')
@stop