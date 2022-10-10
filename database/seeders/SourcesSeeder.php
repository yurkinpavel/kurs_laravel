<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData()
    {

        $data[] = [
            'category_id' => 1,
            'title' => 'Общество',
            'short_discraption' => 'Источник новостей об общественной жизни',
            'url_source' => 'http://lenta.ru/obshestvo',
        ];

        $data[] = [
            'category_id' => 2,
            'title' => 'Наука',
            'short_discraption' => 'Источник новостей науки',
            'url_source' => 'http://lenta.ru/nauka',
        ];

        $data[] = [
            'category_id' => 3,
            'title' => 'Спорт',
            'short_discraption' => 'Источник новостей о спорте',
            'url_source' => 'http://lenta.ru/sport',
        ];


        $data[] = [
            'category_id' => 4,
            'title' => 'Экономика',
            'short_discraption' => 'Источник новостей экономики',
            'url_source' => 'http://lenta.ru/economika',
        ];


        $data[] = [
            'category_id' => 5,
            'title' => 'ЧП',
            'short_discraption' => 'Источник о чрезвычайных происшествиях',
            'url_source' => 'http://lenta.ru/chp',
        ];
 
        return $data;
    }
}
