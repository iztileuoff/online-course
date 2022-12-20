<?php

namespace App\Http\Controllers\API\AUTH;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthAPIController extends Controller
{
    public function registration(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return response([
            'message' => "succesful registred"
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('phone', $request->input('phone'))->first();

        $pass = Hash::check($request->input('password'), $user->password);
        if (!$pass) {
            throw ValidationException::withMessages([
                'errors' => ['phone or password was invalid!']
            ]);
        }

        Auth::attempt(['phone' => $request->input('phone'), 'password' => $request->input('password')]);
        $token = $user->createToken($user->phone)->plainTextToken;
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
