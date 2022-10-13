<?php

namespace App\Models;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

      // protected $fillable = ['title', 'id', 'short_discraption', 'slug', 'is_private'];
      protected $guarded = [];  


    public function getCategories(): array
    {
      //$categories = DB::select('SELECT * FROM categories');
      $categories = Category::all();
      $categories = json_decode(json_encode($categories), true);
      return $categories;
    }
  
    public function getCategoryBySlug($slug): array
    {
     // $category_arr = DB::select('SELECT * FROM categories WHERE slug =:slug', ['slug' => $slug]);
      $category_arr = Category::where('slug', $slug)->get();
      $category_arr = json_decode(json_encode($category_arr), true);
      if (!empty($category_arr[0])) {
        return $category_arr[0];
      } else {
        return null;
      }
    }

    public  function getCategoryById($id): ?array
    {
        $category = Category::where('id', $id)->get();
        $category = json_decode(json_encode($category), true);
        if (!empty($category[0])) {
            return $category[0];
        } else {
            return null;
        }
    }

  public function updateCategory($new_category_arr)
  {

    $category_for_update = Category::find($new_category_arr['id']);

    $category_for_update->title = $new_category_arr['title'];
    $category_for_update->short_discraption = $new_category_arr['short_discraption'];
    $category_for_update->slug = $new_category_arr['slug'];
    $category_for_update->is_private = $new_category_arr['is_private'];

    $category_for_update->save();

    return  true;
  }


  public function saveCategory($new_category_arr)
  {
        $insertid = Category::create([
          'title' => $new_category_arr['title'],
          'slug' => $new_category_arr['slug'],
          'short_discraption' => $new_category_arr['short_discraption'],
          'is_private' => $new_category_arr['is_private'],
      ])->id;
      return  $insertid;
  }


}
