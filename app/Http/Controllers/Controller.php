<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


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
    public function getJsonValidationErrorResponse($msg = "Validation Errors", $data = []) {
        $response=$this->getErrorResponse($msg,$data);
        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }

}
