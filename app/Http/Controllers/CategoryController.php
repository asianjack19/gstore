<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getCategories()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('components.category.categoryList', $data);
    }
}
