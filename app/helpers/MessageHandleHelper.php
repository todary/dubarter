<?php
namespace App\Helpers;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class MessageHandleHelper  {

    const DEFAULT_LIMIT_PER_PAGE = 15;
    public function getErrorResponse($msg,$data)
    {
        $response=[
            'Status' => 'Error',
            'Message' => $msg];
        if($data)
        {
            $response['Errors']=$data;
        }
        return $response;
    }
    public function getJsonSuccessResponse($msg = "", $data = []) {
        return response()->json([
                    'Status' => 'Success',
                    'Message' => $msg,
                    'Data' => $data], Response::HTTP_OK);
    }

    public function getJsonNotAuthorizedResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_FORBIDDEN);
    }

    public function postJsonSuccessResponse($msg = "", $data = []) {
        return response()->json([
                    'Status' => 'Success',
                    'Message' => $msg,
                    'Data' => $data], Response::HTTP_CREATED);
    }

    public function getJsonLogicalErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_CONFLICT);
    }

    public function getJsonBlackListedErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_GONE);
    }

    public function getJsonNotFoundErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_NOT_FOUND);
    }

    public function getJsonValidationErrorResponse($msg = "Validation Errors", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }

    public function getJsonSessionTimOutResponse($msg = "Validation Errors", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_REQUEST_TIMEOUT);
    }
    
    public function getJsonSessionExpiredErrorResponse($msg = "", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }

    public function getStringLength($str) {
        return strlen($str);
    }

}
