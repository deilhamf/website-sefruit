<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\KategoriBlog;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(KategoriProduct::class, 'category_id');
    }

    // public function comments()
    // {
    //     // return $this->belongsTo(KategoriBlog::class);
    //     return $this->hasMany(Comment::class, 'blog_id');
    // }
}
