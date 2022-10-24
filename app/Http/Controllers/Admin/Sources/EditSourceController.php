<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Source;

use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;

class EditSourceController extends Controller
{
    public function index()
    {
        return view('admin.edit.listsources')
            ->with('sources', Source::all())
            ->with('all_categories', Category::all());
    }
 

    public function destroy(Request $request)
    {
        if ($request->isMethod('delete')) {
            Source::where('id', $request['delete_id'])->delete();
        }

        return view('admin.createsourсe')
        ->with('all_categories', Category::all());
    }

    public function edit($source)
    {
        $onesource =  Source::where('id', $source)->get();
        foreach ($onesource as $item_source) {
            $source_id =  $item_source['id'];
        }
        if (!empty($source_id)) {
            return view('admin.edit.editsource')
            ->with('source', $item_source)
                ->with('all_categories', Category::all());
        } else {
            return view('404');
        }
    }


    public function update(Request $request)
    {
        if ($request->isMethod('put')) {
            $source_for_update = Source::find($request['id']);
            $source_for_update->title = $request['title'];
            $source_for_update->category_id = $request['category_id'];
            $source_for_update->url_source = $request['url_source'];
            $source_for_update->save();
           }
        return redirect()->route('sources.index');
    }


    public function create(Request $request)
    {
        if ($request->isMethod('head')) {
            $request->flash();
 //dd($request);
$insertid = Source::create([
                 'title' => $request['title'],
                 'category_id' => $request['category_id'],
                 'short_discraption' => $request['title'],
             'url_source' => $request['url_source'],
            ])->id;

            return redirect()->route('sources.index');
        } else {
            return view('admin.createsourсe')
            ->with('all_categories', Category::all());
        }
    }

}
