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
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     */
    public function __construct(string $token) {
        $this->token = $token;
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
     * TODO: Add translation
     *
     * @param  mixed $user
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user) {

        return (new MailMessage)
            ->subject(sprintf('%s - Registrierung', config('app.name')))
            ->greeting(sprintf('Hallo %s,', $user->name))
            ->line('es wurde ein Benutzer für Sie eingerichtet.')
            ->line('Über den folgenden Button können Sie Ihr Passwort setzen.')
            ->action('Passwort setzen', route('backend.password.reset', $this->token))
            ->salutation("Mit freundlichen Grüßen\n\n" . config('app.name'));
    }
}
