<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class message
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Get ticket the user is replying to 
        $ticket = DB::table('tickets')->where('id', $request->ticket_id)->first();

        //Check if user is allowed to reply to the ticket
        if ($ticket->staff_id == Auth::user()->id || $ticket->user_id == Auth::user()->id) {
            return $next($request);
        }
        return response()->json('You do not have access to this.');
    }
}
