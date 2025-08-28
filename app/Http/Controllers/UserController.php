<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login(LoginRequest $request): View|RedirectResponse
    {
        // TODO: create custom request and validate credentials there
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::where('email', $email)->first();

        if(!$user || !Hash::check($password, $user->password)){
            return view('login');
        }

        $token = $user->createToken($user->email.'-AuthToken')->plainTextToken;

        // TODO: Instead of JSON return redirect to shops list page
        return redirect()
            ->route('shops.index')
            ->with('success', 'Logged in successfully!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Logged out successfully!');
    }
}
