<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryArticles extends Model
{
    protected $table = 'category_articles';

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
