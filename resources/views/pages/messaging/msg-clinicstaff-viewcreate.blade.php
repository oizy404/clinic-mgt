@extends('layout.master')

@section('title')
    Clinic Staff Message
@stop

@section('content')
@include('shared.admin-header')
@include('shared.msg-sidenav')

        <div class="main-container">
            <div class="clinicstaff-inbox" id="clinicstaff-inbox">
                <div class="row">
                    <div class="col-md-12 message-clinicstaff">
                        <div class="clinicstaff-msg">
                            <div class="card" id="unselect-msg" >
                                <div class="card-header">
                                    <div class="form-group input-group-sm">
                                        <input type="text" class="form-control" id="search-sender" data-bs-toggle="modal" data-bs-target="#search-sender-modal">
                                    </div>
                                </div>
                                <div class="card-body clinicstaffmsg_card_body">
                                    @foreach($messages as $message)
                                        @if($message->receiver == Auth::user()->id || $message->receiver == 2)
                                                @if(!$message->img_file)
                                                    <div class='d-flex justify-content-start'><div class='outbox bg-info'>{{$message->message}}</div></div><br>
                                                @else
                                                    <div class='d-flex justify-content-start'><div class='img-msg'><img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>
                                                @endif
                                        @elseif($message->sender == Auth::user()->id || $message->sender == 2)
                                            @if($message->message)
                                                <div class='d-flex justify-content-end'><div class='outbox bg-primary text-light'>{{$message->message}}</div></div><br>
                                            @elseif($message->event_id)
                                                <div class="d-flex justify-content-end">
                                                    <div class="event bg-primary text-light">
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
                                    @endforeach
                                </div>
                                <div class="card-footer bg-primary">
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
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="search-sender-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
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
                                            <th class="bg-info text-dark">User Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patientusers as $patientuser)
                                        <tr class="theData">
                                            <td style="display: none">{{$patientuser->id}}</td>
                                            <td>{{$patientuser->username}}</td>
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
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active");
        });
        // $("#search-sender").click(function(){
        //     $(".se")
        // })

    });
</script>
@stop