@extends('layouts.app')

@section('content')

<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
<div class="container">
<div class="card">
    <div class="card-header">
     {{$ticket->subject}}
    </div>
    <div class="card-body">
     <p>{{$ticket->message}}</p>
     <br>
     {{$ticket->created_at}}
    </div>
 </div>
 @foreach ($messages as $message)
     <div class="card mt-3">
        
        
        @if ($message->user_id == Auth::user()->id)
        <p class="text-right">{{$message->message}}</p>
        <br>
          <p class="text-right">{{$message->created_at}} - You</p>

            @else
            <p class="text-left">{{$message->message}}</p>
            <br>
            {{$message->created_at}} - Them
        @endif
     </div>
 @endforeach
<div class="card mt-3">
    <form action="{{route('reply')}}" method="post">
        <textarea name="message" class="form-control" cols="30" rows="10" required></textarea>
        <input type="submit" value="Send Message" class="btn btn-primary">
        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">

        @csrf
     </form>
</div>
</div>
@endsection