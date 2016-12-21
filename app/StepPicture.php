<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepPicture extends Model
{
    //
    protected $table = "stepPictures";

    public $timestamps = false;
    
    public function Step()
    {
        return $this->belongsTo('Step', 'step_id');
    }
}
