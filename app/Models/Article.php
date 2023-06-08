<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable =[
      'title',
      'category_id',
      'full_text',
      'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'article_tags','article_id','tag_id','id','id');
    }
}
