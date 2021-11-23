@extends('layout.master')

@section('title')
    Compose Message
@stop

@section('content')
 
    <div class="col-md-6 offset-md-3 compose">
        <div class="compose-msg mt-5">
            <form action="{{route('compose-doctormsg')}}" method="post">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="username">Send to:</label>
                    <select name="username" class="form-control" id="">
                        <option value="">--Select--</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
                    </select>
                </div><br>
                <label for="message">Message: </label>
                <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea><br>
                <button type="submit" class="btn-success" id="btn-compose-msg">Send</button>
                <a href="/student-consultation-record" class="btn-danger" id="btn-compose-cancel">Cancel</a>
            </form>
        </div>
    </div>


@stop
