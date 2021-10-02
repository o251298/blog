<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $guarded = [];
    public function marks(){
        return $this->morphTo();
    }
}
