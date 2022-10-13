<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class News
{

    public function getNews()
    {
        $news = DB::select('SELECT * FROM news');
        $news_arr = json_decode(json_encode($news), true);
        return $news_arr;
    }


      public  function getNewsId($id): ?array
    {
        $news = DB::select('SELECT * FROM news WHERE id =:id', ['id' => $id]);
        $news = json_decode(json_encode($news), true);
        if (!empty($news[0])) {
            return $news[0];
        } else {
            return null;
        }
    }


    public function getNewsCategoryByid($id_category): ?array
    {
        $category_news = DB::select('SELECT * FROM news WHERE category_id =:category_id', ['category_id' => $id_category]);
        $category_news = json_decode(json_encode($category_news), true);

        if (!empty($category_news)) {
            return $category_news;
        } else {
            return null;
        }
    }

    public function saveNews($new_news_arr)
    {
        //  Storage::disk('local')->put('news.json', $allnews);
        $insertid =  DB::table('news')->insertGetId([
            'title' => $new_news_arr['title'],
            'category_id' => $new_news_arr['category_id'],
            'short_discraption' => $new_news_arr['short_discraption'],
            'text' => $new_news_arr['text'],
            'is_private' => $new_news_arr['is_private'],
        ]);

        return  $insertid;
    }
}
