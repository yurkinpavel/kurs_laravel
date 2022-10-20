<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Http\Requests\Categories\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class EditCategoryController extends Controller
{
    public function index()
    {
        return view('admin.edit.listcategories')
             ->with('all_categories', Category::all());
    }


    public function destroy(Request $request, $category)
    {
        if ($request->isMethod('delete')) {
            Category::where('id', $category)->delete();
            //Вероятно при этом все новости из этой категории надо удалять или менять на категорию БЕЗ КАТЕГОРИИ
        }
        return redirect()->route('categories.index');
    }


    public function store(StoreRequest $request)
    {
        if ($request->isMethod('post')) {
        $onecategory = Category::where('id', $request['id'])->get();
        foreach ($onecategory as $item_category) {
            //#
        }
         return view('admin.edit.editcategory')
        ->with('category', $item_category)
            ->with('all_categories', Category::all());
       }
    }



    public function update(EditRequest $request)
    {
        if ($request->isMethod('put')) {
            $category_for_update = Category::find($request['id']);

            $category_for_update->title = $request['title'];
            $category_for_update->short_discraption = $request['short_discraption'];
            $category_for_update->slug = $request['slug'];
            if ($request['is_private']) {
                $category_for_update->is_private = true;
            } else {
                $category_for_update->is_private = false;
            }

             $category_for_update->save();
             return redirect()->route('categories.index');

          /*  if ($category_for_update->save()) {
                return redirect()->route('categories.index')
                ->with('success', 'Запись успешно обновлена');
            }  */ 

          //  return back()->with('error', 'Не удалось обновить запись');
        }
    }


    public function create(CreateRequest $request)
    {
        
        if ($request->isMethod('head')) {
            $request->flash();

            if (!$request['is_private']) {
                $request['is_private'] = false;
            }

            $insertid = Category::create([
                'title' => $request['title'],
                'slug' => $request['slug'],
                'short_discraption' => $request['short_discraption'],
                'is_private' => $request['is_private'],
            ])->id;
            return redirect()->route('categories.index');
        } else {
              return view('admin.createcategory')
            ->with('all_categories', Category::all());
        }
    }




}
