@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Status</th>
            <th scope="col">Priority</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
        <tr>
            <th scope="row">{{$ticket->id}}</th>
            <td>{{$ticket->subject}}</td>
            <td>{{$ticket->status}}</td>
            <td>{{$ticket->priority}}</td>
            <td>
            <a href="{{route('view-ticket', $ticket->id)}}">View</a>
            
            </td>
          </tr>
        @endforeach
      
        </tbody>
      </table>
</div>
@endsection
