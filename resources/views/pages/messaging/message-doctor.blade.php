@extends('layout.master')

@section('title')
    Doctor Message
@stop

@section('content')
@include('shared.doctor-header')
@include('shared.doctor-msg-sidenav')

        <div class="main-container">
            <div class="doctor-inbox" id="doctor-inbox">
                <div class="row">
                    <div class="col-md-12 message-doctor">
                        <div class="doctor-msg">
                            <div class="card" id="unselect-msg" >
                                <div class="card-body doctormsg_card_body">
                                    <h1>You don't have a message selected</h1>
                                    <p>Choose one from your existing messages, or start a new one.</p>
                                    <a href="#" class="btn btn-primary">Create New Message</a>
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
    });
</script>
@stop