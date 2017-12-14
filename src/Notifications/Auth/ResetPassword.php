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
            ->subject(trans('backend::mails.reset-password.subject'))
            ->greeting(trans('backend::mails.reset-password.greeting'))
            ->line(trans('backend::mails.reset-password.first-line'))
            ->action(trans('backend::mails.reset-password.action'), url(config('app.url').route('backend.password.reset', $this->token, false)))
            ->line(trans('backend::mails.reset-password.last-line'))
            ->salutation(trans('backend::mails.reset-password.salutation') . "\n\r" . config('app.name'));
    }
}
