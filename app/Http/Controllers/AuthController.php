<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userRepository->findUser($request->request->get('username'), Hash::make($request->request->get('password')));
        if($user)
        {
            Auth::login($user);
            return redirect('/user/' . $user->id . '/posts');
        }
        else
        {
            return redirect('/login')->with('errorCode', 404);
        }
    }

    public function register(RegistrationRequest $request)
    {
        $newUser = $this->userRepository->createUser([
            'username' => $request->request->get('username'),
            'email' => $request->request->get('email'),
            'password' => Hash::make($request->request->get('password')), 
        ]);

        Auth::login($newUser);
        return redirect('/user/' . $newUser->id . '/posts');
    }
}
