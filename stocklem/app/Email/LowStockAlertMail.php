<?php

namespace App\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LowStockAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $articles;
    public $adminName;

    /**
     * Create a new message instance.
     */
    public function __construct($articles, $adminName)
    {
        $this->articles = $articles;
        $this->adminName = $adminName;
    }

    public function build()
    {
        return $this->subject("Alerta de Stock Crítico: {$this->articles->count()} artículo(s)")
            ->markdown('email.low-stock-alert');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alerta de Stock Crítico',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.low-stock-alert',
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
