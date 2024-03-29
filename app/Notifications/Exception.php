<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Exception extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly int $code,
        public readonly string $message,
        public readonly string $file,
        public readonly int $line,
        public readonly string $trace,
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Oops')
            ->subject('Budget: An exception has been thrown')
            ->line('An exception has been thrown on Budget, details below.')
            ->line('Code: '.$this->code)
            ->line('Message: '.$this->message)
            ->line('File: '.$this->file)
            ->line('Line: '.$this->line)
            ->line('Trace string: '.$this->trace);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toArray($notifiable): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'file' => $this->file,
            'line' => $this->line,
            'trace' => $this->trace,
        ];
    }
}
