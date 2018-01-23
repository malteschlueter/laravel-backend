<?php

namespace Mschlueter\Backend\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Mschlueter\Backend\Models\Role;
use Mschlueter\Backend\Models\User;

class UserPolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     *
     * @return bool
     */
    public function index(User $user) {

        return $user->role === Role::SUPER_ADMIN || $user->role === Role::ADMIN;;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     *
     * @return bool
     */
    public function create(User $user) {

        return $user->role === Role::SUPER_ADMIN || $user->role === Role::ADMIN;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     *
     * @return bool
     */
    public function createRolesSuperAdmin(User $user) {

        if($user->role === Role::SUPER_ADMIN) {
            return true;
        }

        return false;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     * @param \Mschlueter\Backend\Models\User $edit_user
     *
     * @return bool
     */
    public function edit(User $user, User $edit_user) {

        if($user->role === Role::SUPER_ADMIN || ($user->role === Role::ADMIN && $edit_user->role !== Role::SUPER_ADMIN)) {
            return true;
        }

        if($user->id === $edit_user->id) {
            return true;
        }

        return false;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     * @param \Mschlueter\Backend\Models\User $edit_user
     *
     * @return bool
     */
    public function editActive(User $user, User $edit_user) {

        if($user->role === Role::SUPER_ADMIN || ($user->role === Role::ADMIN && $edit_user->role !== Role::SUPER_ADMIN)) {
            return true;
        }

        return false;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     * @param \Mschlueter\Backend\Models\User $edit_user
     *
     * @return bool
     */
    public function editRoles(User $user, User $edit_user) {

        if($user->role === Role::SUPER_ADMIN || ($user->role === Role::ADMIN && $edit_user->role !== Role::SUPER_ADMIN)) {
            return true;
        }

        return false;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     *
     * @return bool
     */
    public function editRolesSuperAdmin(User $user) {

        if($user->role === Role::SUPER_ADMIN) {
            return true;
        }

        return false;
    }

    /**
     * @param \Mschlueter\Backend\Models\User $user
     * @param \Mschlueter\Backend\Models\User $edit_user
     *
     * @return bool
     */
    public function destroy(User $user, User $edit_user) {

        if($user->id !== $edit_user->id && ($user->role === Role::SUPER_ADMIN || ($user->role === Role::ADMIN && $edit_user->role !== Role::SUPER_ADMIN))) {
            return true;
        }

        return false;
    }
}
