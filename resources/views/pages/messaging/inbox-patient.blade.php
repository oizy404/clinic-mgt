@extends('layout.master')

@section('title')
    Inbox
@stop

@section('content')
 
    <div class="col-md-6 offset-md-3 inbox">
        <div class="inbox-patient mt-5">
            <table>
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Tittle</th>
                        <th>Messages</th>
                        <th>Received</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{$message->sender}}</td>
                        <td>tittle</td>
                        <td>{{$message->message}}</td>
                        <td>{{$message->created_at}}</td>
                        <td><a href="#">delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop
