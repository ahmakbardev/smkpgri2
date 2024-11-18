<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'status', 'html_lang', 'description', 'images', 'alt', 'user_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // Sesuaikan nama kolom jika berbeda
    }


    public function category()
    {
        return $this->belongsTo(CategoryArticle::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
