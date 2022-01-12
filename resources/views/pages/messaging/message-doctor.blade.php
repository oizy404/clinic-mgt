@extends('layout.master')

@section('title')
    Doctor Message
@stop

@section('content')
@include('shared.admin-header')
@include('shared.doctor-sidenav')
<div class="row mt-2">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-3 doctor-sender">
        <div class="doctor-sender mt-5">
            <div class="card" style="width:94%; float:right;">
                <div class="card-header">
                    <h6>PATIENTS</h6>
                </div>
                <div class="card-body doctormsg_card_body">
                    @foreach($users as $user)
                        <div class="form-group">
                            <a href="{{$user->first()->id}}" id="username">{{$user->first()->username}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 message-doctor">
        <div class="doctor-msg mt-5">
            <div class="card">
                <div class="card-header">
                    <h6>PATIENT NAME HERE</h6>
                </div>
                <h1>You don't have a message selected</h1>
                <p>Choose one from your existing messages, or start a new one.</p>
                <!-- <div class="card-body doctormsg_card_body">
                    @foreach($messages as $message)
                        @if(Auth::user()->id == $message->receiver)
                            <div class="d-flex justify-content-start">
                                <div class="outbox">
                                    {{$message->message}}
                                </div>
                            </div><br>
                        @elseif(Auth::user()->id == $message->sender)
                            <div class="d-flex justify-content-end">
                                <div class="inbox">
                                    {{$message->message}}
                                </div>
                            </div><br>  
                        @endif
                    @endforeach
                </div>
                <div class="card-footer">
                    <form action="{{route('compose-doctormsg')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group doctor-compose">
                            <div class="input-group-append file-ups">
                                <label for="fileups">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </label>
                                <input type="file" class="input-file" id="fileups" name="file">
                            </div>
                            <textarea name="message" class="form-control type_msg" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <button type="submit" class="btn" id="btn-compose-msg"><i class="fas fa-location-arrow"></i></button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>
@include('pages.add-consultation-record')
@stop