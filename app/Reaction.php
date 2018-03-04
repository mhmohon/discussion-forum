<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{

    public function idea()
    {
    	return $this->belongsTo(Idea::class);
    }
}
