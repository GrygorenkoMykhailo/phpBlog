<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct()
    {
        //
    }

    public function createUser($userData)
    {
        return User::create($userData);
    }

    public function findUserById(int $id)
    {
        return User::find($id);
    }

    public function findUser($username, $password)
    {
        $user = User::where('username', $username)->first();

        if($user)
        {
            if($user->password === $password)
            {
                return $user;
            }
        }
        return null;
    }
}
