@extends('layouts.admin')

@section('content')
<h1 class="h2">Unclaimed Tickets</h1>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
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
        <form action="{{route('claim')}}" method="post">
            <input type="hidden" name="id" value="{{$ticket->id}}">
            @csrf
            <input type="submit" value="Claim" class="btn btn-success"></form>
        
        </td>
      </tr>
    @endforeach
  
    </tbody>
  </table>
@endsection