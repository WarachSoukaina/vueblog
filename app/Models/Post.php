<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // every post belongs to a user
    public function user()
    {
       return $this->belongsTo(User::class);
    }
 // every post belongs to a category
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    // every post hasMany commentes
    public function comments()
    {
       return $this->hasMany(Comment::class)->orderBy('created_at','DESC');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at','DESC');
    }

}
