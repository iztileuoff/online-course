<?php

namespace App\Http\Controllers\API\AUTH;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $user = User::where('phone' , $request->phone)->get();
        if(!empty($user[0]))
        {
            if(Auth::attempt($request->only('phone', 'password')))
            {
                $token = Auth::user()->createToken('token')->plainTextToken;
                return response([
                    'user' => $user,
                    'token' => $token,
                ]);
            }
        }

    }

    public function registration(RegistrationRequest $request)
    {
        $input = $request->validated();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return response([
            'message' => 'success created'
        ]);
    }
}
