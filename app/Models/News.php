<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
   // protected $fillable = ['title', 'category_id', 'short_discraption', 'text', 'is_private'];
    protected $guarded = [];  

    public function getNews()
    {
        $news = News::all();
        $news_arr = json_decode(json_encode($news), true);
        return $news_arr;
    }

    public  function getNewsId($id): ?array
    {
        $news = News::where('id', $id)->get();
        $news = json_decode(json_encode($news), true);
        if (!empty($news[0])) {
            return $news[0];
        } else {
            return null;
        }
    }

    public function getNewsCategoryByid($id_category): ?array
    {
        $category_news = News::where('category_id', $id_category)->get();
        $category_news = json_decode(json_encode($category_news), true);

        if (!empty($category_news)) {
            return $category_news;
        } else {
            return null;
        }
    }


    public function saveNews($new_news_arr)
    {
        $insertid = News::create([
            'title' => $new_news_arr['title'],
            'category_id' => $new_news_arr['category_id'],
            'short_discraption' => $new_news_arr['short_discraption'],
            'text' => $new_news_arr['text'],
            'is_private' => $new_news_arr['is_private'],
        ])->id;
        return  $insertid;
    }

    public function updateNews($new_news_arr)
    {

        $news_for_update = News::find($new_news_arr['id']);

        $news_for_update->title = $new_news_arr['title'];
        $news_for_update->category_id = $new_news_arr['category_id'];
        $news_for_update->short_discraption = $new_news_arr['short_discraption'];
        $news_for_update->text = $new_news_arr['text'];
        $news_for_update->is_private = $new_news_arr['is_private'];

        $news_for_update->save();

        return  true;
    }



}
