<?php

namespace App;
use Carbon\Carbon;


class Post extends Model
{

    //To define the relationship between Posts and Comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        //1 post can have many tags
        //Any tag may be applied to a post
        return $this->belongsToMany(Tag::class);
    }

    public function addComment($body) {

        /*$this->comments will gather the comments collection
        while $this->comments() will allow you to chain methods like ->create()
        which assigns the post_id automatically through eloquent and the relationship
        we set up
        */

        //this post's comments => create a new one where 'body' is equal to what was passed in
        $this->comments()->create([
            'body' => $body,
            'user_id' => $this->user->id
        ]);
        //Long form way
//        Comment::create([
//            'post_id' => $this->id,
//            'body' => $body
//        ]);
    }

    /*Accepts the current query and any additional filters coming from
    the PostsController*/
    public function scopeFilter($query, $filters) {
        if($month = $filters['month']) { //If the request has a value for month
            //Give me the posts where the month = value in request
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

    }

    //Returns the archives based on the query you can see below
    public static function archives() {
        return static::selectRaw('year(created_at) as year, monthName(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

}
