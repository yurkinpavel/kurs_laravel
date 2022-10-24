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
use Illuminate\Support\Facades\Validator;
 

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


    public function parser(Request $request)
    {
/*dump($request['source_id']);
dump($request['category_id']);*/
$link = Source::find($request['source_id'])->url_source;

     //  $link = 'https://www.kommersant.ru/RSS/section-economics.xml';
       $xml = XmlParser::load($link);

       $data= $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'description' => ['uses' => 'channel.description'],
        'link' => ['uses' => 'channel.link'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[title,link,pubDate,description]'],
    ]);
  
 
    
    foreach ($data['news'] as $item_news) {
        $description = Str::before($item_news['description'], '. '); //обрезка описания
        $description = $description.'.';
        $item_news['text'] = $item_news['description']; // в поле для полной новости необрезанное описание
        $item_news['description'] = $description;
        $validator = Validator::make($item_news, [
            'title' => ['required','max:300','unique:news,title'],
            'link' => ['required','max:300','unique:news,link','url'],
            'description' => ['required','max:300','unique:news,short_discraption'],
            ]);

            if($validator->fails()){
                continue;
            }
 
        News::create([
            'title' => $item_news['title'],
            'category_id' => $request['category_id'],
            'short_discraption' =>  $item_news['description'],
            'text' => $item_news['text'],
            'link' => $item_news['link'],
            'is_private' => false,
        ]);
    }
    return redirect()->route('news.index');
  

    }
}