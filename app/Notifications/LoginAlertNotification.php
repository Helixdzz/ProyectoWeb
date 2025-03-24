<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginAlertNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Alerta de inicio de sesión')
            ->line('Se ha detectado un inicio de sesión en tu cuenta.')
            ->line('Si no fuiste tú, por favor cambia tu contraseña inmediatamente.')
            ->action('Ir al Dashboard', url('/dashboard'))
            ->line('¡Gracias por usar nuestra aplicación!');
    }
}