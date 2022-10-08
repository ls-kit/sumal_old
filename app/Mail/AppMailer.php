<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class AppMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket_mail;
    // protected $fromAddress = 'support@supportticket.dev';
    // protected $fromName = 'Support Ticket';
    // public $to;
    // public $subject;
    // public $view;
    // protected $data = [];
    
    public function __construct(Ticket $ticket_mail)
    {
        $this->ticket_mail = $ticket_mail;
    }

    public function sendTicketInformation($user, Ticket $ticket)
    {
        // $this->to = $user->email;
        // $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        // $this->view = 'emails.ticket_info';
        // $this->data = compact('user', 'ticket');
        return view('emails.ticket_info');
    }

    public function build()
    {
        return $this->view('emails.ticket_info');
    }
}
