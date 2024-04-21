<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnswerAdminNotify extends Notification
{
    use Queueable;

    private User $user;
    private string $answer;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, string $answer)
    {
        $this->user = $user;
        $this->answer = $answer;
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
            ->subject(__("Вам новый комментарий от тренера"))
            ->line(__("Вам новый комментарий от тренера"))
            ->line(__("Комментарий: ") . $this->answer)
            ->action(__('Перейти в Check in'), route("check-in.index"));*/

        return (new MailMessage)
            ->subject(__("Вам новый комментарий от тренера"))
            ->view('emails.answer-admin', [
                'user' => $this->user,
                'answer' => $this->answer,
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
