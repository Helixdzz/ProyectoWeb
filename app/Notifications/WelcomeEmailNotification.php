<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('¡Bienvenido a nuestra aplicación!')
            ->line('Gracias por registrarte en nuestra aplicación.')
            ->line('Esperamos que disfrutes de nuestros servicios.')
            ->action('Ir al Dashboard', url('/dashboard'))
            ->line('¡Gracias por usar nuestra aplicación!');
    }
}