<?php

namespace App\Models;
 

class Category
{
  private static $category = [

   [
    'id' => 1,
    'title' => 'Общество',
    'slug' => 'obshestvo',
   ],

   [
    'id' => 2,
    'title' => 'Наука',
    'slug' => 'nauka',
   ],

   [
    'id' => 3,
    'title' => 'Спорт',
    'slug' => 'sport',
   ],

   [
    'id' => 4,
    'title' => 'Экономика',
    'slug' => 'economika',
   ],

];

  public static function getCategory(): array
  {
      return static::$category;
  }


}