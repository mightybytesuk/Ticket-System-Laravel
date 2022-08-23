@extends('layouts.admin')

@section('content')
<h1 class="h2">Dashboard</h1>
<div class="row">
    <div class="col">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Unclaimed Tickets</div>
            <div class="card-body">
              <h5 class="card-title">{{$unclaimedTickets}}</h5>
              <p class="card-text"></p>
            </div>
          </div>
    </div>
    <div class="col">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Your Tickets</div>
            <div class="card-body">
              <h5 class="card-title">{{$ticketCount}}</h5>
              <p class="card-text"></p>
            </div>
          </div>
    </div>
    <div class="col">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">High Priority</div>
            <div class="card-body">
              <h5 class="card-title">{{$highPriority}}</h5>
              <p class="card-text"></p>
            </div>
          </div>
    </div>
</div>
@endsection