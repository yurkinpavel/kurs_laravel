<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class IndexController extends Controller
{
    public function index(Category $category,)
    {
        $all_categories = $category->getCategories();
        return view('admin.index')
        ->with('all_categories', $all_categories);
    }

    public function page2(News $news)
    {
        //return view('admin/page2');
        return response()->json($news->getNews())
        ->header('Content-Disposition', 'attachment; filename="json.txt"')
        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function page3()
    {
      // return response()->download('1.jpg');
         $file= public_path(). "/1.jpg";

       $headers = array(
                 'Content-Type: Content-Type: image/jpeg',
               );
   
       return response()->download($file, '1.jpg', $headers);
    }


    public function download($id, News  $news)
    { 
        $category_news =  $news->getNewsCategoryById($id);
        return response()->json($category_news)
        ->header('Content-Disposition', 'attachment; filename="json.txt"')
        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }


    public function create(Request $request, Category $category, News $news)
    {
        $all_categories = $category->getCategories();

        if ($request->isMethod('post')) {
            $request->flash();
          
            $new_news_arr = array();           
            $new_news_arr['title'] = $request['title_news'];
            $new_news_arr['category_id'] = $request['news_category'];
            $new_news_arr['short_discraption'] = $request['short_discraption'];
            $new_news_arr['text'] = $request['full_news'];
            $new_news_arr['is_private'] = false;
            if ($request['is_private']) {
                $new_news_arr['is_private'] = true;
            }
 
          $insertid = $news->saveNews($new_news_arr);
             return redirect()->route('newsOne', [$insertid]);
        } else {
            return view('admin.create')
            ->with('all_categories', $all_categories);
        }
    }


    public function createCategory(Request $request, Category $category)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            $new_category_arr = array();
            $new_category_arr['title'] = $request['title'];
            $new_category_arr['short_discraption'] = $request['short_discraption'];
            $new_category_arr['slug'] = $request['slug'];
            $new_category_arr['is_private'] = false;
            if ($request['is_private']) {
                $new_category_arr['is_private'] = true;
            }

            $res = $category->saveCategory($new_category_arr);
        }

        $all_categories = $category->getCategories();
        return view('admin.edit.listcategories')
            ->with('all_categories', $all_categories);
    }

    
}
