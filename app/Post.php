<?php

namespace App;


class Post extends Model
{
    //To define the relationship between Posts and Comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body) {

        /*$this->comments will gather the comments collection
        while $this->comments() will allow you to chain methods like ->create()
        which assigns the post_id automatically through eloquent and the relationship
        we set up
        */

        //this post's comments => create a new one where 'body' is equal to what was passed in
        $this->comments()->create(['body' => $body]);
        //Long form way
//        Comment::create([
//            'post_id' => $this->id,
//            'body' => $body
//        ]);
    }
}
