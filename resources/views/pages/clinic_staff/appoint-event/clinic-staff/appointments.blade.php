@extends('layout.clinicstaff-master1')

@section('title')
    Appointment Booking
@stop

@section('content')
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
        <div class="row appointment-content main-container">
            <div class="col-md-7">
                <!-- <h1>APPOINTMENTS BOOKING</h1> -->
                <div class="appointment-container">
                    <div id="calendar" style="z-index: 1;"></div>
                </div>
            </div>
            <div class="col-md-5" id="lisEvents">
                <div class="add-event mb-3">
                    <i class="fa fa-plus"></i> <a href="#" id="addEventBtn">&nbsp New Event</a>
                    <div class="form-group" id="eventList">
                        <div class="form-group">
                            <table class="table table-hover" id="appointments">
                                <thead>
                                    <tr>
                                        <th class="" style="background-color: rgba(0,0,0,.03);">Event</th>
                                        <th style="background-color: rgba(0,0,0,.03);">Patient</th>
                                        <th style="background-color: rgba(0,0,0,.03);">Start Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                
                                    ?>
                                    @foreach($listEvent as $listEventt)
                                        @if($listEventt->archived == 0)
                                        <tr class="theEvents">
                                            <td>{{$listEventt->title}}</td>
                                            @if($listEventt->patient_id)
                                                <td>{{$listEventt->patient->first_name}} {{$listEventt->patient->last_name}}</td>
                                            @elseif($listEventt->patient_id == null)
                                                <td><small>N/A</small></td>
                                            @endif
                                            <td>{{date('F j, Y, g:i a', strtotime($listEventt->start))}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
            $('#dialog').show();
            $('#complete_name').click(function(){
                $('.appoint-patient').show();
            });
            $('#apt-btn-cancel').click(function(){
                $('#dialog').hide();
            });
            $('.patientsData').click(function(){
                var patient_id =  $(this).find(":first-child").text();
                var complete_name = $(this).find(":first-child").next().next().text();
                $('.appoint-patient').hide();
                $('#patient_id').val(patient_id);
                $('#complete_name').val(complete_name);
            });
            $('#apt-patient-cancel').click(function(){
                $('.appoint-patient').hide();
            });
            
        })
        
        $('.theEvents').click(function(){
            $('#theEvents').show();
            $('#apt-view-back').click(function(){
                $('#theEvents').hide();
            });
        })

        var calendar = $('#calendar').fullCalendar({ //display page, show all the events
            // themeSystem: 'bootstrap5',
            selectable: true,
            height: 590,
            showNonCurrentDates: false,
            editable: false,
            defaultView: 'month',
            yearColumns: 4,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,basicWeek,basicDay'
            },
            events:"{{route('allEvents')}}", //show all the events
            backgroundColor: '#ff0000',        
            dayClick:function(date,event,view){ //create event in one click
                $('#start').val(convert(date));
                $('#action-btn').html('Add Event');
                $('#dialog').show();
                $('#complete_name').click(function(){
                    $('.appoint-patient').show();
                });
                $('#apt-btn-cancel').click(function(){
                    $('#dialog').hide();
                });
                $('.patientsData').click(function(){
                    var patient_id =  $(this).find(":first-child").text();
                    var user_id = $(this).find(":first-child").next().text();
                    var complete_name = $(this).find(":first-child").next().next().text();
                    $('.appoint-patient').hide();
                    $('#patient_id').val(patient_id);
                    $('#user_id').val(user_id);
                    $('#complete_name').val(complete_name);
                });
                $('#apt-patient-cancel').click(function(){
                    $('.appoint-patient').hide();
                });

            },
            select:function(start,end){ //dragging to create event
                $('#start').val(convert(start));
                $('#end').val(convert(end));
                $('#action-btn').html('Add Event');
                $('#dialog').show();
                $('#complete_name').click(function(){
                    $('.appoint-patient').show();
                });
                $('#apt-btn-cancel').click(function(){
                    $('#dialog').hide();
                });
                $('.patientsData').click(function(){
                    var patient_id =  $(this).find(":first-child").text();
                    var complete_name = $(this).find(":first-child").next().next().text();
                    $('.appoint-patient').hide();
                    $('#patient_id').val(patient_id);
                    $('#complete_name').val(complete_name);
                });
                $('#apt-patient-cancel').click(function(){
                    $('.appoint-patient').hide();
                });

            },
            eventClick:function(event){ //clicking event to UPDATE
                $('#patient_idd').val(event.patient_id);
                $('#complete_namee').val(event.patient_id.first_name);
                $('#titlee').val(event.title);
                $('#startt').val(convert(event.start));
                $('#endd').val(convert(event.end));
                $('#colorr').val(event.color);
                $('#testColorr').val(event.testColor);
                $('#eventIdd').val(event.id);
                $('#dialog2').show();
                $('#complete_name').click(function(){
                    $('.appoint-patient').show();
                });
                $('#apt-update-cancel').click(function(){
                    $('#dialog2').hide();
                });
                $('.patientsData').click(function(){
                    var patient_id =  $(this).find(":first-child").text();
                    var complete_name = $(this).find(":first-child").next().next().text();
                    $('.appoint-patient').hide();
                    $('#patient_id').val(patient_id);
                    $('#complete_name').val(complete_name);
                });
                $('#apt-patient-cancel').click(function(){
                    $('.appoint-patient').hide();
                });
                var url="{{url('archiveEvent')}}";
                $('#deleteEvent').click(function(){
                    var result = confirm("Confirm to archive this event.");
                    if (result != true) {
                        event.preventDefault();
                        returnToPreviousPage();
                        return false;
                    }
                        $('#deleteEvent').attr('href',url+'/'+event.id);
                        return true;
                });
            },
            // eventMouseover: function(event, jsEvent, view) {
            //     $(this).append(
            //         '<div class="edit-delete-btn"><a href="" class="btn" id="deleteEvent" onclick="return confirm("Are you sure to delete event?)"><i class="fas fa-trash"></i></a></div>'
            //     );
            //     $('#deleteEvent').click(function(){
            //         var url="{{url('archiveEvent')}}";
            //         $('#deleteEvent').attr('href',url+'/'+event.id);
            //         $('#dialog2').hide();
            //     });
            // },
            // eventMouseout: function(event, jsEvent) {
            //     $('.edit-delete-btn').remove();
            // }
        })
    });
    function confirmArchive(){
        var result = confirm("Confirm to archive this event.");
        if (result != true) {
            event.preventDefault();
            returnToPreviousPage();
            return false;
        }
        return true;
    }
});
</script>
@include('pages.clinic_staff.appoint-event.clinic-staff.add-appointment')
@include('pages.clinic_staff.appoint-event.clinic-staff.edit-appointment')
@include('pages.clinic_staff.appoint-event.clinic-staff.appoint-patient')
@include('pages.clinic_staff.appoint-event.clinic-staff.show-appointment')

@include('vendor.sweetalert.alert')
@stop