<?php

namespace Mschlueter\Backend\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mschlueter\Backend\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAction() {

        $user = Auth::user();

        return view('backend::auth.passwords.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAction(Request $request) {

        $user = Auth::user();

        $validation = [
            'old-password' => 'required|old_password',
            'new-password' => 'required|confirmed|min:6',
        ];

        $this->validate($request, $validation, trans('backend::validation'), trans('backend::validation.attributes'));

        $user->password = Hash::make($request->input('new-password'));

        $user->save();

        return redirect()->route('backend.user')->with('message', trans('backend::auth.passwords.change.messages.success'));
    }
}
