<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Password_CategoryService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Password_CategoryService $password_CategoryService)
    {

        $passwordsByCategories = $password_CategoryService->getDashboardData();
        

        
        return view('backend.dashboard', compact('passwordsByCategories'));
    }
}
