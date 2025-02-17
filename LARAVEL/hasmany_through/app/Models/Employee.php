<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class Employee extends Model
{
 
    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}

