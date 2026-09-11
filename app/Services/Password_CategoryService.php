<?php


namespace App\Services;

use App\Models\Category;

class Password_CategoryService{


    public function getDashboardData(){
        
     $categories = Category::with('passwords')->get();

     foreach ($categories as $category) {
        foreach ($category->passwords as $password) {

        $password->url = "/admin/password/edit/".$password->id;
            }
        }
     return $categories;

    }


}