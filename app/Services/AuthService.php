<?php

namespace App\Services;

use App\Adapters\IUserAdapter;
use App\Helpers\MessageHandleHelper;
use Illuminate\Support\Facades\Auth;

class AuthService implements IAuthService {

    protected $adapter;

    public function __construct(IUserAdapter $adapter, MessageHandleHelper $messageHandle) {
        $this->adapter = $adapter;
        $this->messageHandler = $messageHandle;

    }


    function login($data)
    {
        $user = $this->adapter->getUserByEmail($data['email']);

        if (!$user)
            return $this->messageHandler->getJsonNotFoundErrorResponse('User Not Exist');

        if(Auth::attempt([
            'email'=>$data['email'],
            'password' =>$data['password']
        ]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return $this->messageHandler->postJsonSuccessResponse($ms='', $success);
        }else {
            return $this->messageHandler->getJsonNotFoundErrorResponse('unauthorised');
        }

    }

    function register($data)
    {
        $data["password"] = bcrypt($data["password"]);
        $user = $this->adapter->createUser($data);
        $msg  = "Register successfully";
        return $this->messageHandler->postJsonSuccessResponse($msg, ['user_id' => $user->id]);

    }
}
