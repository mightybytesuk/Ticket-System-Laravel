@extends('layouts.admin')

@section('content')
<h1 class="h2">Ticket </h1>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col mb-3 text-center">
            <div class="card">
                <h4>Edit Priority</h4>
            <form action="{{route('edit-priority')}}" method="post">
                <select name="priority" class="form-control">
                    <option value="{{$ticket->priority}}">{{$ticket->priority}}</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                <input type="submit" value="Update" class="btn btn-success mt-2 center">
                @csrf
            </form>
            </div>
        </div>
        <div class="col text-center">
            <div class="card">
                <h4>Edit Status</h4>
            <form action="{{route('edit-status')}}" method="post">
                <select name="status" class="form-control">
                    <option value="{{$ticket->status}}">{{$ticket->status}}</option>
                    <option value="New">New</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                </select>
                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                <input type="submit" value="Update" class="btn btn-success mt-2 center">
                @csrf
            </form>
            </div>
        </div>
    </div>
</div>
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
        <form action="{{route('admin-reply')}}" method="post">
            <textarea name="message" class="form-control" cols="30" rows="10" required></textarea>
            <input type="submit" value="Send Message" class="btn btn-primary">
            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">

            @csrf
         </form>
    </div>
</div>

@endsection