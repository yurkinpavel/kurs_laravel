<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(Category $categories)
    {
        return view('news.categories')->with('categories', $categories->getCategories());
    }


    public function categoryNewsBySlug(News  $news, Category $category, $slug)
    {
        //слаг категории может поменятся - поэтому в модели  новостей лучше слаг убрать и получить новости по айди категории
        $id_category = $category->getIdCategoryBySlug($slug);
        $title_category = $category->getTitleCategoryBySlug($slug);

        $category_news =  $news->getNewsCategoryById($id_category);
        return view('news.category_news')
            ->with('news', $category_news)
            ->with('title_category', $title_category);
    }
}
