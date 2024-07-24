<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function AuthLogin(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential =  $request->only('username', 'password');
        $token = Auth::attempt($credential);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            $user = Auth::user();
            return $this->respondWithToken($token);
        }
    }
    public function userDetails()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 2
        ]);
    }
}
