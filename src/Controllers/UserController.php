<?php

namespace Mschlueter\Backend\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $users = User::all();

        return view('backend::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAction() {
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

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:backend_users',
        ], trans('backend::validation'), trans('backend::validation.attributes'));

        $password = str_random();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($password),
        ]);

        $user->notify(new UserCreated($password));

        return redirect()->route('backend.user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function editAction(User $user) {

        return view('backend::user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User                     $user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAction(Request $request, User $user) {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($request->input('email') !== $user->email ? '|unique:users' : ''),
        ], trans('backend::validation'), trans('backend::validation.attributes'));

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('backend.user');
    }

    /**
     * @param  User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirmAction(User $user) {

        if($user->id === Auth::id()) {
            abort(403, 'It is not allowed to delete yourself.');
        }

        return view('backend::user.destroy', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAction(User $user) {

        if($user->id === Auth::id()) {
            abort(403, 'It is not allowed to delete yourself.');
        }

        $user->delete();

        return redirect()->route('backend.user');
    }
}
