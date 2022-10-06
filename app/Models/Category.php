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

  public function getIdCategoryBySlug($slug): string
  {
    $category_id = null;
    foreach ($this->getCategories() as $category_item) {
      if ($category_item['slug'] == $slug) {
        $category_id = $category_item['id'];
      }
    }
    return $category_id;
  }


  public function getTitleCategoryBySlug($slug): string
  {
    $category_title = null;
    foreach ($this->getCategories() as $category_item) {
      if ($category_item['slug'] == $slug) {
        $category_title = $category_item['title'];
      }
    }
    return $category_title;
  }
}
