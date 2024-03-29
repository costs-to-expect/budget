<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPassword extends Notification implements ShouldQueue
{
    use Queueable;

    public string $email;

    public string $token;

    public function __construct(string $email, string $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Budget: Create a new Password!')
            ->greeting('Hi Budgeteer!')
            ->line('Please find below the link to create a new password for your account.')
            ->action('Create Password', url('/create-new-password').'?encrypted_token='.urlencode($this->token).'&email='.urlencode($this->email))
            ->line('If you did not start this request, please ignore it, let us know privately if it continues to happen.')
            ->line('Thank you for using Budget, we hope it helps!');
    }

    public function toArray($notifiable): array
    {
        return [
            'token' => $this->token,
            'email' => $this->email,
        ];
    }
}
