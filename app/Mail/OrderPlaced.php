<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;
    public $userPhone;
    public $cartItems;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $userEmail, $userPhone, $cartItems)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userPhone = $userPhone;
        $this->cartItems = $cartItems;
    }

    public function build()
    {
        return $this->subject('New Order Placed')
                    ->view('emails.order_placed')
                    ->with([
                        'userName' => $this->userName,
                        'userEmail' => $this->userEmail,
                        'userPhone' => $this->userPhone,
                        'cartItems' => $this->cartItems,
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Placed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_placed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
