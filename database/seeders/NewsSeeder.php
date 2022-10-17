<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table( 'news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = \Faker\Factory::create(locale: 'ru_RU');
        $data = array();
        $category_id = 1;
        for ($i = 0; $i < 50; $i++) {


            $data[] = [
                'category_id' => $category_id,
                'is_private'  => false,
                'title' => $faker->realText(30),
                'short_discraption' => $faker->realText(100),
                'text' => $faker->realText(500)
            ];
            //чтобы новости по категориям равномерно а не рандомно
            $category_id = $category_id + 1;
            if ($category_id > 5) {
                $category_id = 1;
            }
        }

        return $data;
    }
}
