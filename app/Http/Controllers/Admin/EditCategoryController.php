<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class EditCategoryController extends Controller
{
    public function listCategories(Category $category)
    {
        $all_categories = $category->getCategories();
        return view('admin.edit.listcategories')
             ->with('all_categories', $all_categories);
    }


    public function deleteCategory(Request $request, News  $news, Category $category)
    {
        if ($request->isMethod('post')) {
            Category::where('id', $request['delete_id'])->delete();
            //Вероятно при этом все новости из этой категории надо удалять или менять на категорию БЕЗ КАТЕГОРИИ
        }
        
        $all_categories = $category->getCategories();
        return view('admin.edit.listcategories')
        ->with('all_categories', $all_categories);
    }

    public function editCategory($id, Category $category)
    {
        $onecategory = $category->getCategoryById($id);
        $all_categories = $category->getCategories();
        return view('admin.edit.editcategory')
        ->with('category', $onecategory)
            ->with('all_categories', $all_categories);
    }


    public function updateCategory(Request $request, Category $category, News $news)
    {

        if ($request->isMethod('post')) {

            $new_category_arr = array();
            $new_category_arr['id'] = $request['edit_id'];
            $new_category_arr['title'] = $request['title'];
            $new_category_arr['short_discraption'] = $request['short_discraption'];
            $new_category_arr['slug'] = $request['slug'];
            $new_category_arr['is_private'] = false;
            if ($request['is_private']) {
                $new_category_arr['is_private'] = true;
            }

            $res = $category->updateCategory($new_category_arr);

            $all_categories = $category->getCategories();
            return view('admin.edit.listcategories')
            ->with('all_categories', $all_categories);
        }
    }



}
