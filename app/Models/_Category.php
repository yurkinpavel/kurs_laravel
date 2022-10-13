<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Category
{

  public function getCategories(): array
  {
    $categories = DB::select('SELECT * FROM categories');
    $categories = json_decode(json_encode($categories), true);
    return $categories;
  }

  public function getCategoryBySlug($slug): array
  {
    $category_arr = DB::select('SELECT * FROM categories WHERE slug =:slug', ['slug' => $slug]);
    $category_arr = json_decode(json_encode($category_arr), true);
  //dd($category_arr[0]);
    if (!empty($category_arr[0])) {
      return $category_arr[0];
    } else {
      return null;
    }
  }

 
}
