<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'status', 'html_lang', 'description', 'images', 'alt'];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
