<?php

namespace App;

class Tag extends Model
{
    public function posts() {
       return $this->belongsToMany(Post::class);
    }

    /**
     * @return string
     * The following method will allow the user to use the tag name in the url instead of the id
     * and that will then return the data related to that tag via the id anyway
     * Normally we query the database using the tag id, but instead,
     * this function does a where on the name
     */
    public function getRouteKeyName()
    {
        //Get the tag where the name column is equal to that which the user types
        //in the url e.g. app.dev/posts/tags/personal
        //and get me the first result
        return 'name';
    }


}
