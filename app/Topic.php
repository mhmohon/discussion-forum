<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title', 'description','start_date','closure_date','final_date','status'
    ];

    public function idea()
    {
    	$this->hasMany(Idea::class);
    }
}
