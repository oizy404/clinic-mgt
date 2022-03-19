@extends('layout.master')

@section('title')
    Doctor Message
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
                                            <a class="user"  name='{{$user->first()->id}}'>{{$user->first()->username}}</a>
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
                            <div class="card" id="sender-msg" >
                                <div class="card-header">
                                    <h6 class="receiver_name"></h6>
                                    <!-- <a href="doctor-dashboard" id="btn-compose-cancel" style="float:right; color: red;"><i class="fas fa-times-circle"></i></a> -->
                                </div>
                                <div class="card-body doctormsg_card_body" id="message_box">
                                    
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

        $("#sender-msg").hide();
        $('.user').click(function(){
            $("#sender-msg").show();
            $("#unselect-msg").hide();

            $("#message_box").html('');
            value=$(this).attr('name');
            $(".receiver_name").html($(this).html());
            $('#receiver_id').attr('value',value);
            var id=$('#receiver_id').val();
            window.history.pushState('', 'New Page Title', '/message-doctor');
            $.ajax({    
                type: 'get',
                url: "show-doctormsg/"+id,
                data:{ id: id},
            })
            .done(function(data){  
                $.each(data, function(index, value) {
                    if(value.receiver == {{Auth::user()->id}}){
                        if(!value.img_file){
                            $("#message_box").append(
                                "<div class='d-flex justify-content-start'><div class='outbox'>"+value.message+"</div></div><br>"
                            )
                        }
                        else{
                            $("#message_box").append(
                                "<div class='d-flex justify-content-start'><div class='img-msg'><img src='{{asset('imgfileMessages')}}/"+value.img_file+"' id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>"
                            )
                        }
                    }else if(value.sender == {{Auth::user()->id}}){
                        if(!value.img_file){
                            $("#message_box").append(
                                "<div class='d-flex justify-content-end'><div class='outbox bg-primary text-light'>"+value.message+"</div></div><br>"
                            )
                        }
                        else{
                            $("#message_box").append(
                                "<div class='d-flex justify-content-end'><div class='img-msg'><img src='{{asset('imgfileMessages')}}/"+value.img_file+"' id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>"
                            )
                        }
                    }
                });
                window.history.pushState('', 'New Page Title', '/message-doctor/'+id);
            });
        })
    })

    // $("#Form").on('btn-compose-msg',function(event) {
        
    //     event.preventDefault(); // avoid to execute the actual submit of the form.

    //     let fileups = $('#fileups').val();
    //     var message = $("#message").val();
    //     var receiver_id = $("#receiver_id").val();
    //     var actionUrl = form.attr('action');

    //     $.ajax({
    //         type: "post",
    //         url: actionUrl,
    //         data:{
    //             fileups:fileups,
    //             message:message,
    //             receiver_id:receiver_id,
    //         },
    //         success: function(data)
    //         {
    //             $("#message").val('');
    //             $("#message_box").append(
    //                 "<div class='d-flex justify-content-end'><div class='outbox'>"+message+"</div></div><br>"
    //             )
                
    //         }
    //     });
        
        

    // });
    $("#Form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');
        var message = $("#message").val();
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $("#message").val('');
                $("#message_box").append(
                        "<div class='d-flex justify-content-end'><div class='outbox'>"+message+"</div></div><br>"
                    )
            }
        });

    });
</script>
@stop