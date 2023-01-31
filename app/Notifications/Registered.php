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
            ->line('Thank you for creating an account with Budget.')
            ->line('When you sign-in to Budget, you will be able to play with our demonstration budgets and build your own budget from scratch.')
            ->line('Budget is powered by the Costs to Expect API and your account is usable across all of our services.')
            ->line('If you registered in error or want to delete your account, just access "Your Account" within the App and click on one of the delete options.')
            ->line('If you want to download your data please reach out to us, we haven\'t yet had time to build the feature.')
            ->line('By using Budget your are agreeing to our Privacy Policy, please review the policy to ensure you are happy, short story, we don\'t share anything and we don\'t track you.')
            ->action('Sign-in', url('/sign-in'))
            ->line('Thanks again for choosing Budget, we hope it helps!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
