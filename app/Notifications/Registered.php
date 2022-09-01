<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Registered extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Budget: Registration Complete')
            ->greeting('Hi Budgeteer!')
            ->line('Thank you for creating an account on Budget.')
            ->line('When you sign-in to Budget you will be able to start building your budget and view our examples.')
            ->line('Budget is powered by the Costs to Expect API, your account is usable across all of our services')
            ->line('If you registered in error or want to delete your account, just access the account section of out App.')
            ->line('If you want to download your data*, you can do that in the account section as well, you have full control of your data.')
            ->action('Sign-in', url('/sign-in'))
            ->line('Again, Thank you for choosing Budget, we hope it helps!')
            ->line('* Feature coming soon(tm)');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
