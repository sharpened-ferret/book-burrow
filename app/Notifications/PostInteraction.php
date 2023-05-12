<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostInteraction extends Notification implements ShouldQueue
{
    use Queueable;

    private $message_data;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $message_data)
    {
        $this->message_data = $message_data;
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
        $post = $this->message_data['post'];
        return (new MailMessage)
                    ->line('A user has '.$this->message_data['interaction'].' your post: '.$post->content)
                    ->action('View', url('/posts/'.$post->id))
                    ->line('Thank you for using our application!');
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
