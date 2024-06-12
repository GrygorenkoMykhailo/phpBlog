<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $authedUser, User $user)
    {
        return true;
    }

    public function create(User $authedUser, User $user)
    {
        return $authedUser->id === $user->id;
    }
}
