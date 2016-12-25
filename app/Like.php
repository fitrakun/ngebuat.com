<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public $timestamps = false;
    public $incrementing = false;

    protected $table = "likes";
}
