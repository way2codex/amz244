<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public $table = 'category';

    public function article()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
    public function article_custom_limit()
    {
        return $this->hasMany(Article::class, 'category_id', 'id')->limit(8);
    }
}
