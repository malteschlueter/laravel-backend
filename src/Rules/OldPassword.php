<?php

namespace Mschlueter\Backend\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OldPassword
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function validate($attribute, $value)
    {
        $hashed_password = Auth::user()->getAuthPassword();

        $valid = Hash::check($value, $hashed_password);

        return $valid;
    }
}
