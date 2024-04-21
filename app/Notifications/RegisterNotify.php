<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotify extends Notification
{
    use Queueable;

    private User $user;
    private string $password;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
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
        /*return (new MailMessage)
            ->subject(__("Вы успешно зарегистрировались"))
            ->line(__("Данные для входа:"))
            ->line(__("Email: ") . $this->user->email)
            ->line(__("Пароль: ") . $this->password)
            ->action(__('Авторизоваться'), route("login"));*/
        return (new MailMessage)
            ->subject(__("Вы успешно зарегистрировались"))
            ->view('emails.register', [
                'user' => $this->user,
                'password' => $this->password,
            ]);
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
