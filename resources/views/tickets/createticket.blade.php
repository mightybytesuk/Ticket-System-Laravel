@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Ticket</div>

                <div class="card-body">
                    <form action="" method="post">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name='subject' placeholder="Subject" class="form-control mb-3" required> 
                        
                        <label for="category" class="form-label">Category</label>
                         <select name="category" class="form-control">
                            <option value="bug">Bug</option>
                            <option value="payment">Payment</option>
                        </select>
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control mb-3" cols="30" rows="10" required></textarea>
                        <center>
                        <input type="submit" value="Create Ticket" class="btn btn-primary">
                        </center>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
