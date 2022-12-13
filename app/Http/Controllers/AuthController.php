<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken($request->email)->plainTextToken;
        
        return response([
            'message' => "succesful registred",
            'data' => [
                'token' => $token,
                'user_id' => $user->id
            ]
        ]);
    }

    public function login(LoginRequest $request){

        $request->validated();

        $user = User::where('email', $request->input('email'))->first();

        $pass = Hash::check($request->input('password'), $user->password);
        if(!$pass){
            throw ValidationException::withMessages([
                'errors' => ['phone or password was invalid!']
            ]);
        }
        
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        $token = $user->createToken($user->email)->plainTextToken;
        return response([
            'message' => "successful login",
            'data' => [
                'token' => $token,
                'user_id' => $user->id
            ]
        ]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => "successful logout"
        ];
    }

    public function check(Request $request)
    {
        return response([
            'message' => 'success',
            'data' => [
                'user_id' => $request->user()->id,
                'name' => $request->user()->name,
                'phone' => $request->user()->phone
            ]
        ]);
    }
}
