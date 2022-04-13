@extends('layout.clinicstaff-master')

@section('title')
    Clinic Staff Message
@stop

@section('content')
        <div class="main-container">
            <div class="clinicstaff-inbox" id="clinicstaff-inbox">
                <div class="row">
                    <div class="col-md-9 message-clinicstaff">
                        <div class="clinicstaff-msg">

                            <!-- reply message -->
                            
                            <div class="card" id="clinicstaff-msg" >
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group input-group-sm" style="padding-left: 20px;">
                                                <input type="text" class="form-control" id="search-sender" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group mt-2">
                                                <span>
                                                <i class="far fa-ellipsis-v" style="float: right;"></i>
                                                <select>
                                                    <option></option>
                                                    <option><a href="">Delete</a></option>
                                                    <option><a href="">Done</a></option>
                                                </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body clinicstaffmsg_card_body">
                                    @foreach($messages as $message)
                                    @if($message->receiver == $id || $message->sender == $id)
                                        @if($message->receiver == Auth::user()->id || $message->receiver == 2)
                                                @if(!$message->img_file)
                                                    <div class='d-flex justify-content-start'><div class='inbox bg-white'>{{$message->message}}</div></div><br>
                                                @else
                                                    <div class='d-flex justify-content-start'><div class='img-msg'><img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>
                                                @endif
                                        @elseif($message->sender == Auth::user()->id || $message->sender == 2)
                                            @if($message->message)
                                                <div class='d-flex justify-content-end'><div class='outbox bg-info'>{{$message->message}}</div></div><br>
                                            @elseif($message->event_id)
                                                <div class="d-flex justify-content-end">
                                                    <div class="event bg-info">
                                                        <p>
                                                            Good Day! patient <strong>{{$message->event->patient->first_name}} {{$message->event->patient->last_name}}</strong>
                                                            your appointment <strong>{{$message->event->title}}</strong>
                                                            will be on <strong>{{$message->event->start}}</strong> to 
                                                            <strong>{{$message->event->end}}</strong> Philippine time.
                                                        </p>
                                                    </div>
                                                </div><br>
                                            @elseif($message->img_file)
                                                <div class='d-flex justify-content-end'><div class='img-msg'><img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>
                                            @endif
                                        @endif
                                    @endif
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <form id="Form" action="{{route('insertClinicstaffMsg', $id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="input-group clinicstaff-compose">
                                            <div class="input-group-append file-ups">
                                                <label for="fileups">
                                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                                </label>
                                                <input type="file" class="input-file" id="fileups" name="file">
                                            </div>
                                            <input type="text" name="receiver_id" id="receiver_id" style="display:none">
                                            <textarea name="message" class="form-control type_msg" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn" id="btn-compose-msg"><i class="fas fa-location-arrow"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- right side column -->
                    <div class="col-md-3">
                        <div class="card usersender-info">
                            @foreach($users as $user)
                                @foreach($patients as $patient)
                                    @if($id == $user->first()->id)
                                        @if($user->first()->username == $patient->school_id)
                                        <?php 
                                            $fullname = $patient->first_name." ".$patient->last_name;
                                        ?>
                                            <div class="card-body">
                                                <div class="patientinfo-avatar">
                                                    <center><img src="{{ Avatar::create($fullname)->toBase64()}}" alt="patient-avatar" class="rounded-circle"></center>
                                                </div>
                                                <div class="sender-profile text-center">
                                                    <strong>{{$patient->first_name}} {{$patient->last_name}}</strong>
                                                </div>
                                                <hr>
                                            </div>
                                        @elseif(false)
                                            <div class="card-body">
                                                <div class="sender-profile text-center">
                                                    <strong>Patient doesn't have health data!</strong>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
<script>
    var clinicstaffmsg_card_body = document.querySelector('.clinicstaffmsg_card_body');
    clinicstaffmsg_card_body.scrollTop = clinicstaffmsg_card_body.scrollHeight - clinicstaffmsg_card_body.clientHeight;
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active");
        });
        $("#search-sender").click(function(){
            $(".user-receiver").show();
            $(".patient-msgs").hide();
            $("#search-sender").hide();
        })
        
    });
</script>
@stop