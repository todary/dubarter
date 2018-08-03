<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Services\IAuthService;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @var IAuthService
     */
    protected $service;
    protected $validator;

    /**
     * AuthController constructor.
     * @param IAuthService $service
     * @param ValidationHelper $validator
     */
    public function __construct(IAuthService $service, ValidationHelper $validator) {

        $this->service = $service;
        $this->validator = $validator;

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){

        $data = $request->json()->all();
        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->json()->all(),
            [
                'email' => 'required|unique:users|email',
                'password' => 'required|string|max:10',
            ]);

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->register($data);

    }

	public function login(Request $request){


        $data = $request->json()->all();
        $validator = $this->validator->getValidationErrorsWithRequest(
            $request->json()->all(),
            [
                'email' => 'required|email',
                'password' => 'required|string|max:10',
            ]);

        if ($validator !== true)
            return $this->getJsonValidationErrorResponse("", $validator);

        return $this->service->login($data);




		if(Auth::attempt([
                'email'=>$request->email,
                'password' =>$request->password
            ]))
		{
		    $user = Auth::user();
		    $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success]);

		}else {
            return response()->json(['error' => 'unauthorised']);

        }


	}

}
