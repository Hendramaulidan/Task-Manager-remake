<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function columns()
    {
    	return $this->belongsTo('App\Column');
    }
}
