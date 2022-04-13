@extends('layout.clinicstaff-master')

@section('title')
    Clinic Staff Message
@stop

@section('content')

        <div class="main-container">
            <div class="clinicstaff-inbox" id="clinicstaff-inbox">
                <div class="row">
                    <div class="col-md-12 message-clinicstaff">
                        <div class="clinicstaff-msg">
                            <div class="card" id="unselect-msg" >
                                <div class="card-body clinicstaffmsg_card_body">
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