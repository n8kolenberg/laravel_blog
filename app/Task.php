<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*The following is called a query scope. In this example, it would
    allow you to then use the full model instance with this function
    in order to return all the incomplete tasks from the database. It would
    allow you to do Task::incomplete();
    In addition, it also allows you to chain methods => this is why we are passing $query. You could
    then do for instance: Task::incomplete()->where('id','>', 1)->get(); */
    public function scopeIncomplete($query) { //You could also pass additional data next to $query if you needed to do Task::incomplete($val)
        return $query->where('completed', 0);
    }
}
