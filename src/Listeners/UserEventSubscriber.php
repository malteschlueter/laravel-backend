<?php

namespace Mschlueter\Backend\Listeners;

use Carbon\Carbon;

class UserEventSubscriber {

    /**
     * Handle user login events.
     *
     * @param \Illuminate\Auth\Events\Login $event
     */
    public function onUserLogin($event) {
        $event->user->last_login = Carbon::now();
        $event->user->save();
    }

    /**
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events) {

        $events->listen(
            'Illuminate\Auth\Events\Login',
            UserEventSubscriber::class . '@onUserLogin'
        );
    }
}
