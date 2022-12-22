<?php

namespace App\Http\Controllers\API\AUTH;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\API\AUTH\LogOutRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $input = $request -> validated();
        if(!Auth::attempt($input))
        {
            return response()->json(['message' => 'Unauthorized!'], 401);
        }

        $tokenResult = Auth::user()->createToken('token')->plainTextToken;

        return response()->json(['data' => [
            'user' => new UserResource(Auth::user()),
            'token' => $tokenResult
        ]]);
    }

    public function registration(RegistrationRequest $request)
    {
        $input = $request->validated();
        $input['password'] = Hash::make($input['password']);
        $user = new User($input);
        $user->save();
        return response()->json(['message' => 'User has been created'], 201);
    }

    public function logout(LogOutRequest $request)
    {
        \auth()->user()->tokens()-> where('id', $request->token_id)->delete();
        return \response()->json(['message' => 'you are successfully logout']);
    }
}
