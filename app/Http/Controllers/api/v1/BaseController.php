<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result,$message) : JsonResponse  {
        $response = [
            "success"=>true,
            "data"=>$result,
            "message"=>$message
        ];

        return response()->json($response,200);
    }

    public function sendErrors($error, $errorMessage = [], $code= 400 ): JsonResponse{
        $response = [
            "success"=>false,
            "message"=>$error
        ];
        if(!empty($errorMessage)){
            $response["data"] = $errorMessage;
        }

        return reponse()->json($response,$code);
    }
}
