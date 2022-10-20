<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {   $all_categories = Category::all();
        return view('news.categories')->with('categories', $all_categories);
    }


    public function categoryNewsBySlug($slug)
    {
        $title_category = Category::select('id','title')->where('slug', $slug)->get();
        foreach ($title_category as $item_category) {
            $title_category =  $item_category['title'];
        }
        if (empty($item_category['id'])) {
            return view('404');
        }

        $category_news = Category::where('slug', $slug)->leftJoin('news', 'categories.id', '=', 'news.category_id')
        ->select('news.*')
        ->get();

        foreach ($category_news as $item_news) {
            $id =  $item_news['id'];
        }

        if (!empty($id)) {
            return view('news.category_news')
            ->with('news', $category_news)
                ->with('title_category', $title_category);
        } else {
            return view('news.category_news')
            ->with('news', null)
                ->with('title_category', $title_category);
        }
    }
}
