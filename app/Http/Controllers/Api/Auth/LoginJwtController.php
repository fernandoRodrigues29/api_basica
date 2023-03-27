<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginJwtController extends Controller
{
    public function login(Request $request){
        $credentials = $request->all(['email','password']);
        if(!$token = auth('api')->attempt($credentials)){
            // $message = new ApiMessage('Não autoriazada a entrada neste endpoint');
            return response()->json('Não autoriazada a entrada neste endpoint',401);
        }
        return response()->json([
            'token'=>$token
        ]);
    }
}
