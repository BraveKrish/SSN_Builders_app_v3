<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;

class QuoteResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quoteResponse;
    /**
     * Create a new message instance.
     */
    public function __construct($quoteResponse)
    {
        $this->quoteResponse = $quoteResponse;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Response to your quotes request from SSN Builders',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Dashboard.email.quote_response_mail',
            with: $this->quoteResponse
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => $this->quoteResponse['pdf']->output(), 'Quote.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
