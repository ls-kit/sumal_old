<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\AppMailer;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['tickets'] = Ticket::paginate(10);

        return view('tickets.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::all();

        return view('tickets.create', $data);
    }

    // public function store(Request $request)
    public function store(Request $request, AppMailer $mail)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Open"
        ]);

        $ticket->save();
        // $mail->sendTicketInformation(Auth::user(), $ticket);
        // Mail::to($request->user())->send(new AppMailer($ticket));

        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function userTickets()
    {
        $data['tickets'] = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        
        return view('tickets.user_tickets', $data);
    }

    public function show($ticket_id)
    {
        $data['ticket'] = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        return view('tickets.show', $data);
    }

    // public function close($ticket_id)
    public function close($ticket_id, AppMailer $mail)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "Closed";
        $ticket->save();
        $ticketOwner = $ticket->user;
        // $mail->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }
}
