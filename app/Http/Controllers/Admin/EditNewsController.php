<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Services\Uploadservice;

class EditNewsController extends Controller
{
    public function index()
    {
            return view('admin.edit.listnews')
            ->with('news', News::all())
            ->with('all_categories', Category::all());
    }


    public function destroy(Request $request)
    {
        if ($request->isMethod('delete')) {
            News::where('id', $request['delete_id'])->delete();
        }

        return redirect()->route('news.index');
    }

    public function edit($news)
    {
        $onenews =  News::where('id', $news)->get();
        foreach ($onenews as $item_news) {
            $news_id =  $item_news['id'];
        }
        if (!empty($news_id)) {
            return view('admin.edit.editnews')
            ->with('news', $item_news)
                ->with('all_categories', Category::all());
        } else {
            return view('404');
        }
    }


    public function update(EditRequest $request, Uploadservice $uploadservice)
    {
        if ($request->isMethod('put')) {
            $news_for_update = News::find($request['id']);
            $news_for_update->title = $request['title'];
            $news_for_update->category_id = $request['category_id'];
            $news_for_update->short_discraption = $request['short_discraption'];
            $news_for_update->text = $request['text'];

            if ($request['is_private']) {
                $news_for_update->is_private = true;
            } else {
                $news_for_update->is_private = false;
            }

            if($request->hasFile('image')){
                $news_for_update->image = $uploadservice->uploadImage($request->file('image'));
            }

            $news_for_update->save();
            //  return redirect()->route('newsOne', [$request['id']]);
        }
        return redirect()->route('news.index');
    }


    public function create(CreateRequest $request)
    {
        if ($request->isMethod('head')) {
            $request->flash();

            $new_news_arr = array();
            $new_news_arr['is_private'] = false;
            if ($request['is_private']) {
                $new_news_arr['is_private'] = true;
            }

            $insertid = News::create([
                'title' => $request['title'],
                'category_id' => $request['category_id'],
                'short_discraption' => $request['short_discraption'],
                'text' => $request['text'],
                'is_private' => $new_news_arr['is_private'],
            ])->id;

            return redirect()->route('newsOne', [$insertid]);
        } else {
            return view('admin.create')
            ->with('all_categories', Category::all());
        }
    }


}
