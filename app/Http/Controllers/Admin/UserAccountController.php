<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Password_CategoryService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    //

    public function edit()
    {

        $user = auth()->user();

        return view('backend.userAccount.edit', ["user" => $user,'status' => '']);
    }


    public function update(UserService $userService, UserRegisterRequest $request, string $id)
    {

       $userService->updateUserAccount($request->validated(), (int) $id);

          return redirect()->route('backend.user.edit')
                ->with('status', true)
                ->with('message', "Your details were updated");


    }
}
