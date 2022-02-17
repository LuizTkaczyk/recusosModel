<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts(){
        return $this->belongsToMany(Post::class, Post::RELASHIONSHIP_POST_CATEGORY ,'category','post');
    }
}