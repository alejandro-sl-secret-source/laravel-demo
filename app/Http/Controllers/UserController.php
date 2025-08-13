<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login($request): JsonResponse
    {
        $email = $request->get('name');
        $password = $request->get('password');

        $user = User::where('email', $email)->first();

        if(!$user || !Hash::check($password, $user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }

        $token = $user->createToken($user->email.'-AuthToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }
}
