<?php

namespace App\Http\Controllers\Admin;
//namespace Orchestra\Parser\Xml; 
//namespace App\Providers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Support\Str;
use App\Http\Requests\News\EditRequest;
use App\Services\XMLParserService as XMLParserService;
use Illuminate\Support\Facades\Validator;
use App\Jobs\JobNewsparsingg as JobNewsparsing;
 

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.parser')
             ->with('all_sources', Source::all())
             ->with('all_categories', Category::all());
    }


    public function parser(Request $request, XMLParserService $parserService)
    {
  
       if(!$request['parsall']){ // парсится выбранный источник в выбранную категорию
          JobNewsparsing::dispatch($request['source_id'], $request['category_id']);
       }else{
             foreach (Source::all() as $item_source) {
            JobNewsparsing::dispatch($item_source['id'], $item_source['category_id']);
        }
     
       }
     
           return redirect()->route('news.index');
    }
}