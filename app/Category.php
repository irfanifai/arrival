<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug', 'title'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
