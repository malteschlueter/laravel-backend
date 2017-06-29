<?php

namespace Mschlueter\Backend\Notifications\Auth;

use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends \Illuminate\Auth\Notifications\ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url(config('app.url').route('backend.password.reset', $this->token, false)))
            ->line('If you did not request a password reset, no further action is required.');
    }
}
