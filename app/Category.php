<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category has many posts = 'hasMany relationship'
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
