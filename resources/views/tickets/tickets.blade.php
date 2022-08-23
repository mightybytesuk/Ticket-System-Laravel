@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($tickets as $ticket)
        <div class="card">
            <p>{{$ticket->subject}}</p>
        </div>
    @endforeach
</div>
@endsection
