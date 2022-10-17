<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'categories')->insert($this->getData());
    }
 
    public function getData()
    {

        $data[] = [
            'title' => 'Общество',
            'short_discraption' => 'События общественной жизни',
            'slug' => 'obshestvo',
            'is_private'  => false,
        ];

        $data[] = [
            'title' => 'Наука',
            'short_discraption' => 'Новости науки',
            'slug' => 'nauka',
            'is_private'  => false,
        ];

        $data[] = [
            'title' => 'Спорт',
            'short_discraption' => 'Новости спорта',
            'slug' => 'sport',
            'is_private'  => false,
        ];


        $data[] = [
            'title' => 'Экономика',
            'short_discraption' => 'Новости экономики',
            'slug' => 'economika',
            'is_private'  => false,
        ];


        $data[] = [
            'title' => 'ЧП',
            'short_discraption' => 'Чрезвычайные происшествия',
            'slug' => 'chp',
            'is_private'  => false,
        ];
 
        return $data;
    }
}
