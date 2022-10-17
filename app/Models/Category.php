<?php

namespace App\Models;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;
  protected $table = 'categories';
  protected $fillable = ['title', 'slug', 'image', 'short_discraption', 'is_private'];
  // protected $guarded = [];  

  public function news()
  {
    return $this->hasMany(News::class, 'category_id');
  }
}
