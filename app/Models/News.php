<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['category_id','title', 'image','short_discraption','text','is_private'];
   // protected $guarded = [];  

   public function category()
   {
    return $this->belongsTo(Category::class, 'category_id')->first();
   }

}
