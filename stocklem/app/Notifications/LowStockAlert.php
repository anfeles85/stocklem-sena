<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class LowStockAlert extends Notification
{
    use Queueable;

    protected $articles;

    public function __construct(Collection $articles)
    {
        $this->articles = $articles;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): \Illuminate\Notifications\Messages\MailMessage
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject("Alerta de Stock Mínimo - {$this->articles->count()} artículo(s) crítico(s)")
            ->view('emails.low_stock_alert', [
                'articles' => $this->articles,
                'adminName' => $notifiable->name,
                'notifiable' => $notifiable, // opcional, si lo necesitas
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'articles_count' => $this->articles->count(),
            'data' => $this->articles->map(fn($a) => [
                'name' => $a->name,
                'quantity' => $a->quantity,
                'min_quantity' => $a->min_quantity,
            ]),
        ];
    }
}