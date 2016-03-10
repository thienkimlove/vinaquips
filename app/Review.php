<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'sender',
        'content',
        'rating',
        'status',
        'vina_id',
        'type',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
