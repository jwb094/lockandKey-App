<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Password_CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

        $categories = $this->password_CategoryService->getAllCategories();


        return view('backend.passwordCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.passwordCategory.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $newCategory = $this->password_CategoryService->createCategoryRecord($request->validated());

        if (!$newCategory->id) {
            return  redirect(route('backend.category.add'))
                ->with('status', false)->with('message', "New Category didn't save, try again please");;
        }
        return  redirect(route('backend.category.index'))
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
    public function edit(Category $category)
    {

        return view('backend.passwordCategory.edit',
                    ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        $updatedCategory = $this->password_CategoryService->updateCategoryRecord($request->validated(), $category->id);

        if (!$updatedCategory->id) {
            return  redirect(route('backend.category.edit', $category->id))
                ->with('status', false)
                ->with('message', "Password didn't update, try again please");;
        }
        return  redirect(route('backend.category.index'))
            ->with('status', true)
            ->with('message', "Record was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $previousRecord = $category->title;
        $category->delete();

        return  redirect(route('backend.category.index'))->with('status', true)
            ->with('message', $previousRecord . " was deleted");
    }
}
