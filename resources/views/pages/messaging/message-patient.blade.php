
<div class="message-patient">
    <div class="patient-msg mt-5">
        <div class="card">
            <div class="card-header">
                <h6>CLINIC PERSONEL</h6>
                <a href="#" id="btn-compose-cancel" style="float:right; color: red;"><i class="fas fa-times-circle"></i></a>
            </div>
            <div class="card-body msg_card_body">
                @foreach($messages as $message)
                    @if(Auth::user()->id == $message->sender)
                        <div class="d-flex justify-content-end">
                            <div class="outbox">
                                <p>{{$message->message}}</p>
                            </div>
                        </div><br>
                    @elseif(Auth::user()->id == $message->receiver)
                        <div class="d-flex justify-content-start">
                            <div class="inbox">
                                <p>{{$message->message}}</p>
                            </div>
                        </div><br>  
                    @endif
                @endforeach
            </div>
            <div class="card-footer">
                <form action="{{route('compose-patientmsg')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="input-group patient-compose">
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
            </div>
        </div>
    </div>
</div>
