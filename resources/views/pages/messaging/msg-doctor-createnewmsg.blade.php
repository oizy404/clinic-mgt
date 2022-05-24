@extends('layout.doctor-master')

@section('title')
    Clinic Staff Message
@stop

@section('content')
        <div class="main-container">
            <div class="doctor-inbox" id="doctor-inbox">
                <div class="row">
                    <div class="col-md-9 message-doctor">
                        <div class="doctor-msg">

                            <!-- reply message -->
                            
                            <div class="card" id="doctor-msg" >
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group input-group-sm" style="padding-left: 20px;">
                                                <input type="text" class="form-control" id="search-sender" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group mt-2">
                                                <i class="fa fa-ellipsis-vertical" style="float: right;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body doctormsg_card_body">
                                   
                                </div>
                                <div class="card-footer">
                                    <form id="Form" action="" method="post" enctype="multipart/form-data">
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

                    <!-- right side column -->
                    <div class="col-md-3">
                        <div class="card usersender-info">
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->
<script>
    var doctormsg_card_body = document.querySelector('.doctormsg_card_body');
    doctormsg_card_body.scrollTop = doctormsg_card_body.scrollHeight - doctormsg_card_body.clientHeight;
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