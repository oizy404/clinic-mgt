@extends('layout.master')

@section('title')
    Clinic Staff Message
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav')

        <div class="main-container">
            <div class="doctor-inbox" id="doctor-inbox">
                <div class="row">
                    <div class="col-md-3 offset-md-1 doctor-sender">
                        <div class="doctor-sender mt-5">
                            <div class="card">
                                <div class="card-header">
                                    <h6>PATIENTS</h6>
                                </div>
                                <div class="card-body doctormsg_card_body">
                                    @foreach($users as $user)
                                        @if($user->first()->id == Auth::id())

                                        @else
                                        <div class="form-group">
                                            <a href="{{url('/create-message-clinicstaff/'.$user->first()->id)}}" class="user"  name='{{$user->first()->id}}'>{{$user->first()->username}}</a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 message-doctor">
                        <div class="doctor-msg mt-5">
                            <div class="card" id="sender-msg" >
                                <div class="card-header">
                                    <h6 class="receiver_name"></h6>
                                </div>
                                <div class="card-body doctormsg_card_body" id="message_box">
                                @foreach($messages as $message)
                                @foreach($users as $user)

                                    @if($user->first()->id== $message->sender)
                                        @if($message->img_file)
                                        <div class="d-flex justify-content-end">
                                            <div class="img-msg">
                                                    <img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id="image-msg" alt="image msg" style="max-width:150px;">
                                            </div>
                                        </div><br>
                                        @else
                                        <div class="d-flex justify-content-end">
                                            <div class="outbox">
                                                <p>{{$message->message}}</p>
                                            </div>
                                        </div><br>
                                        @endif
                                    @elseif($user->first()->id == $message->receiver)
                                        @if($message->img_file)
                                        <div class="d-flex justify-content-start">
                                            <div class="img-msg">
                                                    <img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id="image-msg" alt="image msg" style="max-width:150px;">
                                                </div>
                                        </div><br>
                                        @else
                                        <div class="d-flex justify-content-start">
                                            <div class="inbox">
                                                <p>{{$message->message}}</p>
                                            </div>
                                        </div><br>  
                                        @endif
                                    @endif
                                @endforeach
                                @endforeach
                                </div>
                                <div class="card-footer">
                                    <form id="Form" action="{{route('compose-doctormsg')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="input-group doctor-compose">
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
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        $('.user').click(function(){
            $("#message_box").html('');

        });
    });
</script>
@stop