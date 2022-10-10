<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', $news->getNews());
       // return view('news.index')->with('news', $news->getNewsFromFile());
    }

    public function newsOne($id, News  $news)
    {
        return view('news.one')->with('news', $news->getNewsId($id));
    }

  /*  public function categoryNews($slug, News  $news)
    {
        $category_news =  $news->getNewsCategoryBySlug($slug);
        if (is_null($category_news)) {
            return view('404');
        } else {
            return view('news.category_news')->with('news', $category_news);
        }
    }*/
}
