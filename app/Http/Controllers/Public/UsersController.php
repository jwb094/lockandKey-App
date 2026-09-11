<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //  
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {

        return view('front-end.index');
    }
    public function login(UserLoginRequest $request)
    {

        $loginCredentials = $request->validated();

        $authenciated = $this->userService->userAuth($loginCredentials);

        if ($authenciated) {
            return redirect()
                ->intended(route('dashboard'))
                ->with('success', "You have successfully logged in");
        }

        return  redirect(route('login'))
            ->with('message', "Login unsuccessfully");
    }


    public function register()
    {
        return view('front-end.register');
    }

    public function store(UserRegisterRequest $request)
    {


        $newUser = $this->userService->store($request->validated());

        if (!$newUser->id) {
            return  redirect(route('register'))
                ->with('status', false)->with('message', "Registration failed, try again please");;
        }
        return  redirect(route('home'))->with('status', true)
            ->with('message', "Registration successfully");;
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return  redirect(route('home'));
    }
}
