<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\Messages;
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

    public function ticket(Request $request)
    {
        $ticket = Tickets::find($request->id);
        $messages = Messages::where('ticket_id', $ticket->id)->get();

        return view('tickets.ticket', [
            'ticket' => $ticket,
            'messages' => $messages
        ]);
    }

    public function reply(Request $request)
    {
        $message = new Messages;
        $message->message = $request->message;
        $message->ticket_id = $request->ticket_id;
        $message->user_id = Auth::user()->id;
        $message->save();

        return redirect()->back()->with('success', 'Reply has been sent!');  
    }
}
