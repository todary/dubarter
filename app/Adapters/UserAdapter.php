<?php

namespace App\Adapters;

use App\Adapters\IUserAdapter;
use App\User;

class UserAdapter implements IUserAdapter {


    function getUserByEmail($email)
    {
        return User::where('email',$email)->get()->toArray();
    }

    function createUser($data)
    {
        return User::create($data);
    }
    function updateUser($data, $email)
    {
        return User::where('email',$email)->update($data);
    }

    function getUsers()
    {
        return User::get()->all();

    }

    function deleteUser($email)
    {
        return User::where('email',$email)->delete();
    }


}
