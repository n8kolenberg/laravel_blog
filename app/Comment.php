<?php

namespace App;

class Comment extends Model
{
    //To define the relationship between Comments and Posts
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
