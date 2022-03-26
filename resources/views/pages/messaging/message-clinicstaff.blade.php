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
                                            <a href="" class="user"  name='{{$user->first()->id}}'>{{$user->first()->username}}</a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 message-doctor">
                        <div class="doctor-msg mt-5">
                            <div class="card" id="unselect-msg" >
                                <div class="card-body doctormsg_card_body">
                                    <h1>You don't have a message selected</h1>
                                    <p>Choose one from your existing messages, or start a new one.</p>
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
            window.history.pushState('', 'New Page Title', '/message-doctor/'.$user->first()->id);
        });
    });
</script>
@stop