<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\Messages;
use App\Policies\TicketPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Gate;


class AdminController extends Controller
{
    public function index()
    {
        $unclaimedTickets = Tickets::where('staff_id', null)->count();
        $ticketCount = Tickets::where('staff_id', Auth::user()->id)->count();
        $highPriority = Tickets::where('priority', 'High')->where('staff_id', Auth::user()->id)->count();


        return view('admin.index', [
            'unclaimedTickets' => $unclaimedTickets,
            'ticketCount' => $ticketCount,
            'highPriority' => $highPriority
        ]);
    }

    public function tickets()
    {
        $tickets = Tickets::where('staff_id', null)->get();

        return view('admin.tickets',[
            'tickets' => $tickets
        ]);
    }

    public function claimed()
    {
        $tickets = Tickets::where('staff_id', Auth::user()->id)->get();

        return view('admin.claimed', [
            'tickets' => $tickets
        ]);
    }

    public function claim(Request $request)
    {

        $ticket = Tickets::find($request->id);
        $ticket->staff_id = Auth::user()->id; 
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket has been claimed!');   
    }

    public function ticket(Request $request)
    {
        $ticket = Tickets::find($request->id);
        $messages = Messages::where('ticket_id', $ticket->id)->get();

        return view('admin.ticket', [
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

        return redirect()->back()->with('success', 'Ticket has been claimed!');   
     }

     public function editPriority(Request $request)
     {
        $ticket = Tickets::find($request->ticket_id);
        $ticket->priority = $request->priority;
        $ticket->save();
        return redirect()->back()->with('success', 'Priority has been changed.');  
     }

     public function editstatus(Request $request)
     {
        $ticket = Tickets::find($request->ticket_id);
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->back()->with('success', 'Status has been changed.');  
     }
}
