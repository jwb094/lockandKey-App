<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['website', 'username', 'email', 'password', 'password_hash','notes', 'category_id'])]
class Password extends Model
{
    /** @use HasFactory<\Database\Factories\PasswordFactory> */
    use HasFactory;




    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
