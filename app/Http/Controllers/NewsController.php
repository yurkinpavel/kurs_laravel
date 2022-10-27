<?php

namespace App\Http\Controllers;

//use App\Models\Category;
//use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', News::all());
    }

    public function newsOne($id)
    {
        $onenews =  News::where('id', $id)->get();
        foreach ($onenews as $item_news) {
            $news_id =  $item_news['id'];
        }

        if (!empty($news_id)) {
            return view('news.one')->with('news', $item_news);
        } else {
            return view('404');
        }
    }

}
