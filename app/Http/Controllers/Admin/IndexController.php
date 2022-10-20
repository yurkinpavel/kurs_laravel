<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class IndexController extends Controller
{
    public function index()
    {
        $all_categories = Category::all();
        return view('admin.index')
            ->with('all_categories', $all_categories);
    }

    public function page2()
    {
        return response()->json(News::all())
            ->header('Content-Disposition', 'attachment; filename="json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function page3()
    {
        $file = public_path() . "/1.jpg";
        $headers = array(
            'Content-Type: Content-Type: image/jpeg',
        );
        return response()->download($file, '1.jpg', $headers);
    }


    public function download($id, News  $news)
    {
        $category_news = News::select()->where('category_id', $id)->get();
        return response()->json($category_news)
            ->header('Content-Disposition', 'attachment; filename="json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

   
}
