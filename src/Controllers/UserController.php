<?php

namespace Mschlueter\Backend\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Mschlueter\Backend\Models\Role;
use Mschlueter\Backend\Models\User;
use Mschlueter\Backend\Notifications\UserCreated;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAction() {

        if(!Gate::allows('users.index')) {
            return view('backend::not-allowed');
        }

        $users = User::all();

        return view('backend::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAction() {

        if(!Gate::allows('users.create')) {
            return view('backend::not-allowed');
        }

        return view('backend::user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAction(Request $request) {

        if(!Gate::allows('users.create')) {
            return view('backend::not-allowed');
        }

        $validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:backend_users',
        ];

        if($request->input('role') === Role::SUPER_ADMIN && !Gate::allows('users.create.roles.super_admin')) {
            return view('backend::not-allowed');
        } else {
            $validation['role'] = 'required|string';
        }

        $this->validate($request, $validation, trans('backend::validation'), trans('backend::validation.attributes'));

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt(str_random()),
            'role' => $request->input('role'),
        ]);

        $token = Password::broker()->createToken($user);

        $user->notify(new UserCreated($token));

        return redirect()->route('backend.user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mschlueter\Backend\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function editAction(User $user) {

        if(!Gate::allows('users.edit', $user)) {
            return view('backend::not-allowed');
        }

        return view('backend::user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Mschlueter\Backend\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAction(Request $request, User $user) {

        if(!Gate::allows('users.edit', $user)) {
            return view('backend::not-allowed');
        }

        $validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($request->input('email') !== $user->email ? '|unique:backend_users' : ''),
            'active' => 'boolean',
        ];

        if($request->input('role') === Role::SUPER_ADMIN && !Gate::allows('users.edit.roles.super_admin', $user)) {
            return view('backend::not-allowed');
        } else {
            $validation['role'] = 'required|string';
        }

        $this->validate($request, $validation, trans('backend::validation'), trans('backend::validation.attributes'));

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->active = $request->input('active', 0);
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('backend.user');
    }

    /**
     * @param  \Mschlueter\Backend\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirmAction(User $user) {

        if(!Gate::allows('users.destroy', $user)) {
            return view('backend::not-allowed');
        }

        if($user->id === Auth::id()) {
            abort(403, 'It is not allowed to delete yourself.');
        }

        return view('backend::user.destroy', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mschlueter\Backend\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAction(User $user) {

        if(!Gate::allows('users.destroy', $user)) {
            return view('backend::not-allowed');
        }

        if($user->id === Auth::id()) {
            abort(403, 'It is not allowed to delete yourself.');
        }

        $user->delete();

        return redirect()->route('backend.user');
    }
}
