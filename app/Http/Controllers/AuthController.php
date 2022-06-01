<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function  __construct(){
        //check if user is logged in except at login
        $this->middleware('auth:api',['except'=>['login']]);
    }

    public function login(){
        $credentials = request(['email','password']);
        //do pw and email exist in users table
        if(! $token=auth()->attempt($credentials)){
            return response()->json(['error'=>'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    //find out which user is logged in
    public function me(){
        return response()->json(\auth()->user());
    }

    //log out
    public function logout(){
        \auth()->logout();
        return response()->json(['message'=>'Sie sind jetzt ausgeloggt!']);
    }

    //create JSON -Token
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => \auth()->factory()->getTTL()*60
        ]);
    }
}
