<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotify extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('Reset Password Notification'))
            ->view('emails.reset-password', [
                "link" => route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()]),
            ]);
    }
}
