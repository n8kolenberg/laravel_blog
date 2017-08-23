<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = []; //this will ensure that users can't mass assign the user_id
    /* $guarded is the opposite to $fillable. The former specifies which fields cannot be mass assigned
    The latter specifies which fields the user can mass assign when submitting a form*/
}
