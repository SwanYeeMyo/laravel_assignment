<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    //
    public function error($data,$message = null, $code){
        return response()->json([
            'status' => $code,
            'message' => $message ?? 'Error Occur',
            'data' => $data
        ]);
    }
    public function success($data,$message = null, $code){
        return response()->json([
            'status' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}
