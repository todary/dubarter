<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationHelper;
use App\Services\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;
    protected $validator;

    public function __construct(IUserService $service, ValidationHelper $validator)
    {

        $this->service = $service;
        $this->validator = $validator;

    }

    public function getUserByEmail(Request $request, $email)
    {

        $validator = $this->validator->getValidationErrorsWithRequest(
            [
                'email' => $email
            ],
            [
                'email' => 'required|email',
            ]);

        return $this->service->getUserByEmail($email);


    }

    public function getUsers(Request $request)
    {
        return $this->service->getUsers();

    }

    public function createUser(Request $request)
    {

        $data = $request->json()->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->json()->all(),
            [
                'email' => 'required|unique:users|email',
                'password' => 'required|string|max:10',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'photo' => 'required|string'
            ]);


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->createUser($data);


    }



    public function updateUser(Request $request,$email)
    {

        $data = $request->json()->all();

        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->json()->all(),
            [
                'email' => 'required|email|unique:users,email,'.$email.',email,deleted_at,NULL',
                'password' => 'required|string|max:10',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'photo' => 'required|string'
            ]);


        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->updateUser($data, $email);


    }




    public function deleteUser(Request $request, $email)
    {

        $validator = $this->validator->getValidationErrorsWithRequest(
            [
                'email' => $email
            ],
            [
                'email' => 'required|email',
            ]);

        return $this->service->deleteUser($email);


    }

}
