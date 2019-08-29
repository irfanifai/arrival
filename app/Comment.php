<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_id', 'name', 'email', 'body', 'status'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
