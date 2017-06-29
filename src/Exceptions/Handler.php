<?php

namespace Mschlueter\Backend\Exceptions;

use Illuminate\Auth\AuthenticationException;

class Handler extends \App\Exceptions\Handler {
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Auth\AuthenticationException $exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception) {
        if($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('backend.login'));
    }
}
