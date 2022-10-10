<?php

namespace App\Notifications;

use App\Models\PartialRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePassword extends Notification implements ShouldQueue
{
    use Queueable;

    public string $email;
    public string $token;

    public function __construct(string $email, string $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function shouldSend($notifiable, $channel)
    {
        return PartialRegistration::query()
                ->where('email', '=', $this->email)
                ->first() !== null;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Budget: Create Password')
            ->greeting('Hi Budgeteer!')
            ->line('Your account has been created, to finish, you need to create your password.')
            ->line('Chances are, you have already created your password, this email is just in case you never got a chance, you can pick up where you left off.')
            ->action('Create Password', url('/create-password') . '?token=' . urlencode($this->token) . '&email=' . urlencode($this->email))
            ->line('Thank you for using Budget, we hope it helps!');
    }

    public function toArray($notifiable)
    {
        return [
            'token' => $this->token,
            'email' => $this->email,
        ];
    }
}
