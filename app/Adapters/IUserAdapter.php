<?php

namespace App\Adapters;
interface IUserAdapter
{


    /**
     * @param $email
     * @return mixed
     */
    function getUserByEmail($email);

    /**
     * @param $data
     * @return mixed
     */
    function createUser($data);

    /**
     * @param $data
     * @param $email
     * @return mixed
     */
    function updateUser($data, $email);

    /**
     * @param $email
     * @return mixed
     */
    function deleteUser($email);

}
