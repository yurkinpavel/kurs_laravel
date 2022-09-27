<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getNews();
        return view('news')->with('news', $news);
    }

    public function show($id)
    {
        $news = News::getNewsId($id);
        if(is_null($news)){
            return view('noNews');
        } else {
            return view('newsOne')->with('news', $news); 
        }
        
    }

    public function allCategoryNews()
    {
        $categories = Category::getCategory();
        return view('categories')->with('categories', $categories);
    }


    public function categoryNews($id) 
    {
        $category_news = News::getNewsCategoryId($id);
        if(is_null($category_news)){
            return view('404');
        } else {
            return view('news')->with('news', $category_news); 
        }
    }  


}
