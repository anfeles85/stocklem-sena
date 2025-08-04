<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowStockAlert extends Notification
{
    use Queueable;

    protected $article;

    /**
     * Create a new notification instance.
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('¡Alerta de Stock mínimo!')
                    ->greeting('¡Saludos!')
                    ->line('El artículo "' . $this->article->name . '" ha alcanzado su stock mínimo.')
                    ->line('Stock actual: ' . $this->article->quantity)
                    ->line('Stock mínimo definido: ' . $this->article->min_quantity)
                    ->line('Por favor, registra el reabastecimiento correspondiente en el sistema')
                    ->action('haga clic aqui para ir al apartado de articulos', url('/article/index'))
                    ->line('Correo generado automaticamente por favor no responder!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
