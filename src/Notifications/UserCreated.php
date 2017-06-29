<?php

namespace Mschlueter\Backend\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification {

    use Queueable;

    /**
     * @var string
     */
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @param string $password
     *
     * @return void
     */
    public function __construct(string $password) {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $user
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user) {

        return (new MailMessage)
            ->subject(sprintf('%s - Registrierung', config('app.name')))
            ->greeting(sprintf('Hallo %s,', $user->name))
            ->line('es wurde ein Benutzer für Sie eingerichtet und ein Passwort automatisch generiert.')
            ->line($this->password)
            ->line('Über den folgenden Button kommen Sie zum Login.')
            ->action('Zum Login', route('backend.login'));
    }
}
