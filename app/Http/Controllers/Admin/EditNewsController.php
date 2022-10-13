<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class EditNewsController extends Controller
{
    public function listNews(News  $news, Category $category)
    {
        $all_categories = $category->getCategories();
        return view('admin.edit.listnews')
            ->with('news', $news->getNews())
            ->with('all_categories', $all_categories);
    }


    public function deleteNews(Request $request, News  $news, Category $category)
    {
        if ($request->isMethod('post')) {
            News::where('id', $request['delete_id'])->delete();
        }

        $all_categories = $category->getCategories();
        return view('admin.edit.listnews')
        ->with('news', $news->getNews())
            ->with('all_categories', $all_categories);
    }

    public function editNews($id, News  $news, Category $category)
    {
        $onenews = $news->getNewsId($id);
        $all_categories = $category->getCategories();
        return view('admin.edit.editnews')
        ->with('news', $onenews)
            ->with('all_categories', $all_categories);
    }


    public function updateNews(Request $request, Category $category, News $news)
    {

        if ($request->isMethod('post')) {

            $new_news_arr = array();
            $new_news_arr['id'] = $request['edit_id'];
            $new_news_arr['title'] = $request['title_news'];
            $new_news_arr['category_id'] = $request['news_category'];
            $new_news_arr['short_discraption'] = $request['short_discraption'];
            $new_news_arr['text'] = $request['full_news'];
            $new_news_arr['is_private'] = false;
            if ($request['is_private']) {
                $new_news_arr['is_private'] = true;
            }

            $res = $news->updateNews($new_news_arr);
            return redirect()->route('newsOne', [$new_news_arr['id']]);
        } else {
            $all_categories = $category->getCategories();
            return view('admin.edit.listnews')
            ->with('news', $news->getNews())
                ->with('all_categories', $all_categories);
        }
    }



}
