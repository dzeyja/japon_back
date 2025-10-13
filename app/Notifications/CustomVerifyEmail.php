<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class CustomVerifyEmail extends VerifyEmailBase
{
    use Queueable;

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Подтверждение email')
            ->greeting('Здравствуйте!')
            ->line('Пожалуйста, нажмите кнопку ниже, чтобы подтвердить ваш email.')
            ->action('Подтвердить Email', $verificationUrl)
            ->line('Если вы не регистрировались, проигнорируйте это письмо.')
            ->salutation('С уважением, ' . config('app.name'));
    }
}