<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(Category $categories)
    {
        return view('categories')->with('categories', $categories->getCategories());
    }
}
