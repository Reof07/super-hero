<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    /**
     *
     */
    public function register(UserRequest $request)
    {

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );

        $token = $user->createToken('test')->accessToken;

        return response()->json(
            [
                'user' => $user,
                'token' => $token
            ],
            200
        );
    }

    /**
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('test')
                ->accessToken;

            return response()->json(
                [
                    'user' => $user,
                    'token' =>  $token
                ],
                200
            );
        } else
            return response()->json(
                [
                    'message' => 'Unauthorised.'
                ],
                403
            );
    }
}
