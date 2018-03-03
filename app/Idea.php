<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'title', 'description','name','status','user_id','topic_id'
    ];

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
