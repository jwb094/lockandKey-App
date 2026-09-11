<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\Category;
use App\Models\Password;
use App\Services\Password_CategoryService;
use Illuminate\Http\Request;

class PasswordController extends Controller
{

    protected Password_CategoryService $password_CategoryService;
    public function __construct(Password_CategoryService $password_CategoryService)
    {

        $this->password_CategoryService = $password_CategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();

        return view('backend.password.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PasswordRequest $request)
    {
        $newUser = $this->password_CategoryService->createPasswordRecord($request->validated());

        if (!$newUser->id) {
            return  redirect(route('backend.password.add'))
                ->with('status', false)->with('message', "New Password didn't save, try again please");;
        }
        return  redirect(route('dashboard'))
            ->with('status', true)
            ->with('message', "New Record Insert successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Password $password)
    {

        $categories = Category::all();
        return view(
            'backend.password.edit',
            [
                'password' => $password,
                'categories' => $categories
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PasswordRequest $request, Password $password)
    {
        $updatedPassword = $this->password_CategoryService->updatePasswordRecord($request->validated(), $password->id);

        if (!$updatedPassword->id) {
            return  redirect(route('backend.password.edit',$password->id))
                ->with('status', false)
                ->with('message', "Password didn't update, try again please");;
        }
        return  redirect(route('dashboard'))
            ->with('status', true)
            ->with('message', "New Record Insert successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Password $password)
    {

        $previousRecord = $password->website;
        $password->delete();

        return  redirect(route('dashboard'))->with('status', true)
            ->with('message', $previousRecord . " was deleted");
    }
}
