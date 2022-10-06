<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class News
{

    public function getNews()
    {
        //  return $this->news;  
        return null;
    }

    public function getNewsFromFile()
    {
        $news_from_file = Storage::disk('local')->get('news.json');
        $news_arr =  json_decode($news_from_file, true);
        return $news_arr;
    }



    public  function getNewsId($id): ?array
    {
        if (array_key_exists($id - 1, $this->getNewsFromFile())) {
            return $this->getNewsFromFile()[$id - 1];
        }

        return null;
    }


    public function getNewsCategoryByid($id_category): ?array
    {
        $category_news = array();
        foreach ($this->getNewsFromFile() as $news) {
            if ($news['category_id'] == $id_category) {
                $category_news[] = $news;
            }
        }

        if (!empty($category_news)) {
            return $category_news;
        } else {
            return null;
        }
    }


    public function getNewsCategoryBySlug($slug): ?array
    {
        $category_news = array();
        foreach ($this->getNewsFromFile() as $news) {
            if ($news['slug'] == $slug) {
                $category_news[] = $news;
            }
        }

        if (!empty($category_news)) {
            return $category_news;
        } else {
            return null;
        }
    }

    public function saveNews($allnews)
    {
        Storage::disk('local')->put('news.json', $allnews);
        return true;
    }
}
