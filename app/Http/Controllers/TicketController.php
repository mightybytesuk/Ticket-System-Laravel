<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    public function createTicket()
    {
        return view('tickets.createticket');
    }

    public function storeTicket(Request $request)
    {
        $ticket = new Tickets;
        $ticket->subject = $request->subject;
        $ticket->category = $request->category;
        $ticket->message = $request->message;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

    }

    public function tickets()
    {
        
        $tickets = Tickets::where('user_id', Auth::user()->id)
                    ->get();
        return view('tickets.tickets', [
            'tickets' => $tickets
        ]);
    }
}
