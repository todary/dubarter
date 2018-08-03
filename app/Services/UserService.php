<?php

namespace App\Services;

use App\Adapters\IUserAdapter;
use App\Helpers\MessageHandleHelper;

class UserService implements IUserService
{

    protected $adapter;

    /**
     * UserService constructor.
     * @param IUserAdapter $adapter
     * @param MessageHandleHelper $messageHandle
     */
    public function __construct(IUserAdapter $adapter, MessageHandleHelper $messageHandle)
    {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;

    }


    /**
     * @param $email
     * @return \Illuminate\Http\JsonResponse
     */
    function getUserByEmail($email)
    {
        $user = $this->adapter->getUserByEmail($email);
        if ($user)
            return $this->messageHandler->getJsonSuccessResponse("", $user);
        else
            return $this->messageHandler->getJsonNotFoundErrorResponse('User Not Exist');

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    function getUsers()
    {
        $users = $this->adapter->getUsers();
        return $this->messageHandler->getJsonSuccessResponse("", $users);

    }


    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser($data)
    {

        $img = $data['photo'];


        $user_data = [];

        $user_data['password'] = bcrypt($data["password"]);
        $user_data['email'] = $data['email'];
        $user_data['first_name'] = $data['first_name'];
        $user_data['last_name'] = $data['last_name'];

        #region upload image
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $path_imag = md5(time() . random_bytes(10)) . ".png";
        $file_path = public_path("uploads/") . $path_imag;
        file_put_contents($file_path, $data);
        #endregion

        $user_data['photo'] = "public/uploads" . $path_imag;

        $user = $this->adapter->createUser($user_data);
        $msg = "added successfully";

        return $this->messageHandler->postJsonSuccessResponse($msg, ['user_id' => $user->id]);


    }


    /**
     * @param $data
     * @param $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser($data, $email)
    {


        $user = $this->adapter->getUserByEmail($email);
        if (!$user)
            return $this->messageHandler->getJsonNotFoundErrorResponse('User Not Exist');


        $img = $data['photo'];


        $user_data = [];

        $user_data['password'] = bcrypt($data["password"]);
        $user_data['email'] = $data['email'];
        $user_data['first_name'] = $data['first_name'];
        $user_data['last_name'] = $data['last_name'];

        #region upload image
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $path_imag = md5(time() . random_bytes(10)) . ".png";
        $file_path = public_path("uploads/") . $path_imag;
        file_put_contents($file_path, $data);
        #endregion

        $user_data['photo'] = "public/uploads" . $path_imag;

        $user = $this->adapter->updateUser($user_data, $email);
        $msg = "update successfully";

        return $this->messageHandler->postJsonSuccessResponse($msg, "user $email updated successfully");


    }


    /**
     * @param $email
     * @return \Illuminate\Http\JsonResponse
     */
    function deleteUser($email)
    {
        $user = $this->adapter->getUserByEmail($email);
        if (!$user)
            return $this->messageHandler->getJsonNotFoundErrorResponse('User Not Exist');


        $this->adapter->deleteUser($email);
        $msg = "delete successfully";
        return $this->messageHandler->postJsonSuccessResponse($msg, "user $email updated successfully");

    }


}
