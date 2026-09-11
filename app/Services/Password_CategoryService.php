<?php


namespace App\Services;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Support\Facades\Hash;

class Password_CategoryService
{


    public function getDashboardData()
    {

        $categories = Category::with('passwords')->get();

        foreach ($categories as $category) {
            foreach ($category->passwords as $password) {

                $password->url = "/admin/password/edit/" . $password->id;
            }
        }
        return $categories;
    }


    public function getAllCategories()
    {

        $categories = Category::all();

        return $categories;
    }


    public function createPasswordRecord(array $newPasswordData): Password
    {

        $newPasswordData['category_id'] =  $newPasswordData['category_id'] !== "0" ?  (int) $newPasswordData['category_id'] : null;
        $newPasswordData['password_hash'] = Hash::make($newPasswordData['password']);
        $user = Password::create($newPasswordData);

        return $user;
    }



    public function updatePasswordRecord(array $updatedPasswordData, int $updatedPasswordDataId): Password
    {

        $password = Password::findOrFail($updatedPasswordDataId);

        $updatedPasswordData['category_id'] =  $updatedPasswordData['category_id'] !== "0" ?  (int) $updatedPasswordData['category_id'] : null;
        $updatedPasswordData['password_hash'] = Hash::make($updatedPasswordData['password']);

        $password->update($updatedPasswordData);

        return $password->refresh();
    }


    public function createCategoryRecord(array $newCategoryData): Category
    {

        $category = Category::create($newCategoryData);

        return $category;
    }



    public function updateCategoryRecord(array $updatedCategoryData ,int $updatedCategeoryDataId)
    {



        $password = Password::findOrFail($updatedCategeoryDataId);


        $password->update($updatedCategoryData);
        return $password->refresh();
    }
}
