<?php

namespace App\Models;
 

class Category
{
  private array $categories = [

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
   ]

];

  public function getCategories(): array
  {
      return $this->categories;
  }


}