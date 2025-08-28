<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAuthRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('frontend.user.login');
    }

    public function store(UserLoginRequest $request)
    {
        $userData = $request->validated();
        User::create($userData);
        return redirect()->route('login');
    }

    public function register()
    {
        return view('frontend.user.register');
    }

    public function authentication(UserAuthRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
    }
}
