<?php

namespace Mschlueter\Backend\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectTo()
    {
        return '/admin';
    }
}
