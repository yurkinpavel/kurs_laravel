<?php
namespace App\Services;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Source;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\News;

class XMLParserService
{
    public function parserLinks($source_id, $category_id)
    {
        $link = Source::find($source_id)->url_source;

        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'link' => ['uses' => 'channel.link'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,pubDate,description]'],
        ]);



        foreach ($data['news'] as $item_news) {
            $description = Str::before($item_news['description'], '. '); //обрезка описания
            $description = $description . '.';
            $item_news['text'] = $item_news['description']; // в поле для полной новости необрезанное описание
            $item_news['description'] = $description;
            $validator = Validator::make($item_news, [
                'title' => ['required', 'max:300', 'unique:news,title'],
                'link' => ['required', 'max:300', 'unique:news,link', 'url'],
                'description' => ['required', 'max:300', 'unique:news,short_discraption'],
            ]);

            if ($validator->fails()) {
                continue;
            }

            News::create([
                'title' => $item_news['title'],
                'category_id' => $category_id,
                'short_discraption' =>  $item_news['description'],
                'text' => $item_news['text'],
                'link' => $item_news['link'],
                'is_private' => false,
            ]);
        }

    }
}